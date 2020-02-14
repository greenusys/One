<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){	
		parent::__construct();
		$this->load->model('HomeModel','Home');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('FriendsModel','FRND');
		$this->load->model('APIModel','APIM');
		$this->load->model('PostModel','POST');
			$this->load->model('TestModel','Test');
	}
	public function getAllMyPost(){
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
		$condition=array("posted_by"=>$my_Id_);
		
		return $my_friends=$this->FRND->getMyFriends($my_Id_);	
	}
	public function getPostLikes($post_id){
		return $this->APIM->getPostLikeDetails($post_id);

	}
	public function index()
	{	

		//$this->getAllPostLikes();
       
		$id=$_SESSION['logged_in'][0]->user_id;
		$offset=0;
		$limit=5;
		if(count($pstDoat=$this->POST->getAllPost($this->getAllMyPost(),$id,$offset,$limit))>0){
			foreach ($pstDoat as $key => $value) {
				$p_Data['post_id']=$value->post_id;
				$p_Data['user_id']=$value->user_id;
				$p_Data['post']=$value->post;
				$p_Data['post_files']=$value->post_files;
				$p_Data['post_type']=$value->post_type;
				$p_Data['posted_by']=$value->full_name;
				$p_Data['profile_pic']=$value->profile_picture;
				$p_Data['initially_posted_by']=$value->initially_posted_by;
				$p_Data['posted_on']=$value->posted_on;
				if(($likes_data= $this->getPostLikes($value->post_id))!=false){
					 $p_Data['likes_data']=$likes_data;
				}else{
					 $p_Data['likes_data']=array();
				}
				// $p_Data['']=;
				$p_Data['total_likes']=$this->getLikeCount($value->post_id);
				$p_Data['total_dislikes']=$this->getDislikeCount($value->post_id);
				$p_Data['total_comments']=$this->getComment($value->post_id);
				$p_Data['total_share']=$this->getShareCount($value->post_id);
				$post[]=$p_Data;
				//$data['AllPosts']=$p_Data;
			}
			$data['AllPosts']=$post;
		}else{
			$data['AllPosts']=array();
		}
		 $data['fetchCountries']=$this->Test->fetchCountries();
		 $data['fetchjobpost']=$this->Test->fetchJobPostData();
		$data['user_id']=$id;
		$data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['FriendsStatus']=$this->FRND->getMyFreStatus($id);
		$data['myStatus']=$this->FRND->getMyStatus($id);
		$data['MyPosts']=$this->POST->getMyPosts($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['Trending']=$this->POST->getTrending();
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['notify']=$this->Home->fetchnofication($id);
		$this->load->view('web/template/header');
		$this->load->view('web/home',$data);
		$this->load->view('web/template/footer');
	}
	public function getComment($post_id){
		$this->db->where($condition=array("post_id"=>$post_id));
		$this->db->order_by('id','DESC');
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->get('post_comments_')->result();
	}
	// Like Count
	public function getLikeCount($post_id){
		$condition=array("post_id"=>$post_id,"like_or_dislike"=>1);
		// print_r($condition);
		if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
			return $data;
		}else{ 
			return 0;
		}
	}
	// Dislike Count
	public function getDislikeCount($post_id){
		$condition=array("post_id"=>$post_id,"like_or_dislike"=>2);
		// print_r($condition);
		if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
			return $data;
		}else{
			return 0;
		}
	}
	public function getStatusFor(){
		$posted_by=$this->input->post('profile_');
		$sql = "SELECT * FROM stories_ join users on users.user_id=stories_.posted_by WHERE posted_by ='$posted_by' group by stories_.posted_by ";
		// print_r($condition);
		if(count($data=$this->db->query($sql)->result())>0){
			die(json_encode(array('code'=>1,'data'=>$data)));
		}else{
			die(json_encode(array('code'=>0,'data'=>'No Data Found')));
		}
	}
	//get total Share
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
	}
	public function resizeImage($filename)
	{
	   	// echo $_SERVER['DOCUMENT_ROOT'];
	      $source_path = $_SERVER['DOCUMENT_ROOT'] . '/BrainT/laneCrowd/assets/stories/images/' . $filename;//
	      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/BrainT/laneCrowd/assets/stories/images/';
	      $config_manip = array(
	          'image_library' => 'gd2',
	          'source_image' => $source_path,
	          'new_image' => $target_path,
	          'maintain_ratio' => TRUE,
	          'width' => 500,
	      );
	   
	      $this->load->library('image_lib');
		  $this->image_lib->initialize($config_manip);
	      if (!$this->image_lib->resize()) {
	          $this->image_lib->display_errors();
	      }
	   
	      $this->image_lib->clear();
   	}
	public function addstories()
	{
		$user_id=$_SESSION['logged_in'][0]->user_id;
		$story_type=$_POST['post_type'];
		$story_text=$_POST['post'];
		//echo $sa=$_POST['image'];
		$table_name='stories_';
		$posted_on=date('d-M-Y H:i:s');
		if(isset($_POST['imgageData']))
		{
			$imgageData = $_POST['imgageData'];
			list($type, $imgageData) = explode(';', $imgageData);
			list(, $imgageData)      = explode(',', $imgageData);
			$imgageData = base64_decode($imgageData);
			$filename="stories-images-".date("Y-m-d-H-i-s")."."."png";
			file_put_contents('assets/stories/images/'.$filename, $imgageData);
			//$imgageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgageData));
			// print_r($imgageData);
			// $data=array('story_type' =>$story_type ,'posted_by'=>$user_id,'story'=>$story_text,'posted_on'=>$posted_on,'story_status'=>1);
			  $data = array('story_files'=>$filename,'story_type'=>1,'posted_by'=>$user_id,'posted_on'=>$posted_on,'story_status'=>1
	                );
			  $result=$this->Home->addData($table_name,$data);
			  if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'story screen Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif($story_type==0 && !isset($_POST['imgageData']))
		{
			$data=array('story_type' =>$story_type ,'posted_by'=>$user_id,'story'=>$story_text,'posted_on'=>$posted_on,'story_status'=>1);
			$result=$this->Home->addData($table_name,$data);
			if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'story text Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif ($story_type==1 && !isset($_POST['imgageData']))
		{
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "story-image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/stories/images/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    //$this->resizeImage($_FILES['file']['name'] );
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                $this->resizeImage($_FILES['file']['name'] );
		                $images[]=$_FILES['file']['name'];

		            }
		            $pics=implode(",",$images);
		            if(!empty($uploadData)){
		                // Insert files data into the database
		                $data = array(
		                	'story'=>$story_text,'story_files'=>$pics,'story_type'=>1,'posted_by'=>$user_id,'posted_on'=>$posted_on,'story_status'=>1
		                );

		                $result=$this->Home->addData($table_name,$data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'story pic Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			elseif ($story_type==2 && !isset($_POST['imgageData'])) {
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "stories-video-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/stories/videos/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'mp4';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    //$this->resizeImage($_FILES['file']['name'] );
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                //$this->resizeImage($_FILES['file']['name'] );
		                $images[]=$_FILES['file']['name'];

		            }
		            $pics=implode(",",$images);
		            if(!empty($uploadData)){
		                // Insert files data into the database
		                $data = array('story'=>$story_text,'story_files'=>$pics,'story_type'=>2,'posted_by'=>$user_id,'posted_on'=>$posted_on,'story_status'=>1
		                );
		                 $result=$this->Home->addData($table_name,$data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Story video Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			else{ 
				$configVideo['upload_path'] = 'assets/stories/videos'; # check path is correct
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = random_string('numeric', 5);
				$configVideo['file_name'] = $video_name;

				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);

				if (!$this->upload->do_upload('files')) # form input field attribute
				{
					$this->upload->display_errors();
				    die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
				}
				else
				{
				    # Upload Successfull
				    $name = $video_name.".mp4";
				    $data = array(
		                	'story'=>$story_text,'story_files'=>$name,'story_type'=>2,'posted_by'=>$user_id,'posted_on'=>$posted_on,'story_status'=>1
		                );
		                $result=$this->Home->addData($table_name,$data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'story only video Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}
				}
			}
	}

public function weatherDetails(){



$getdata = http_build_query(
array(
    'app_id' => '84vAQ9EjzfMfNKouKeB1',
    'app_code' => '6xRmnAWLRtmjmhDusj6Mbw',
  'product'=>'forecast_hourly',
// 'name'=>$_POST['get_city'],
'latitude'=>$_POST['lat'],
'longitude'=>$_POST['long']

    // 'jsoncallback'=>'myCallbackFunction'
 )
);



// https://weather.cit.api.here.com/weather/1.0/report.json?product=forecast_astronomy&=30.3165&longitude=78.0322&app_id=devportal-demo-20180625&app_code=9v2BkviRwi9Ot26kp2IysQ
$opts = array('http' =>
 array(
  'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($getdata)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
    'method'  => 'GET',
    'content' => $getdata
)
);

$context  = stream_context_create($opts);    
 $result = file_get_contents('https://weather.api.here.com/weather/1.0/report.json?'.$getdata, false, $context);
 $response=json_decode($result);
 
    foreach($response as $res){
        // ->forecastLocation
      //  print_r($res);
        $forecastArray=$res->forecastLocation->forecast;
        $state=$res->forecastLocation->state;
        $city=$res->forecastLocation->city;
        foreach($forecastArray as $forecast){
           //print_r($forecast);
           // die();
            $today=date('d');
            $nowHour=date('H');
            $localTime=$forecast->localTime;
            // echo '|| Real localtime: '.$localTime='1102112020';
            $utcTime=$forecast->utcTime;
            $daylight=$forecast->daylight;
            $temperature=$forecast->temperature;
            // if($daylight=='D'){
                $skyInfo=$forecast->skyInfo;
                $description=$forecast->description;
                $skyDescription=$forecast->skyDescription;
                $temperatureDesc=$forecast->temperatureDesc;
                $comfort=$forecast->comfort;
                $humidity=$forecast->humidity;
                $dewPoint=$forecast->dewPoint;
                $precipitationProbability=$forecast->precipitationProbability;
                $rainFall=$forecast->rainFall;
                $snowFall=$forecast->snowFall;
                $airInfo=$forecast->airInfo;
                $windSpeed=$forecast->windSpeed;
                $windDirection=$forecast->windDirection;
                $windDesc=$forecast->windDesc;
                $windDescShort=$forecast->windDescShort;
                $visibility=$forecast->visibility;
                $icon=$forecast->icon;
                $iconName=$forecast->iconName;
                $iconLink=$forecast->iconLink;
                $dayOfWeek=$forecast->dayOfWeek;
                $weekday=$forecast->weekday;
                $utc=$forecast->utcTime;
                $hour=(int)($localTime/100000000);
                $ho_temp=$localTime%100000000;
                $minutes=(int)(($ho_temp)/1000000);
                $min_temp=$ho_temp%1000000;
                $day=(int)(($min_temp)/10000);
                $min_temp%10000;
                $time = strtotime($localTime);
                $dateInLocal = date("Y-m-d", $time);
                // echo ' Hour : '.$hour=$localTime%10000000000;
                // echo ', Minute : '.$minute=$localTime%100000000;
                // echo ', Day : '.$day=$localTime%1000000;
                // echo ',Year : '.$year=$localTime%10000;
                // echo $time."<br>";
                $localTimes=explode('-',$utc);
                $localTimes=$localTimes[2];
                $days=substr($localTimes,0,2);
                if($days == $today){
                   
                        $data[]=array(
                            "daylight"=>$daylight,
                            "utc"=>$utc,
                            "time"=>$hour.'.'.$minutes,
                            "skyInfo"=>$skyInfo,
                            "description"=>$description,
                            "skyDescription"=>$skyDescription,
                            "temperature"=>(int)$temperature,
                            "temperatureDesc"=>(int)$temperatureDesc,
                            "comfort"=>$comfort,
                            "humidity"=>$humidity,
                            "dewPoint"=>$dewPoint,
                            "precipitationProbability"=>$precipitationProbability,
                            "rainFall"=>$rainFall,
                            "snowFall"=>$snowFall,
                            "airInfo"=>$airInfo,
                            "windSpeed"=>$windSpeed,
                            "visibility"=>$visibility,
                            "icon"=>$icon,
                            "iconLink"=>$iconLink,
                            "state"=>$state,
                            "city"=>$city,
                            "weekday"=>$weekday
                    //         // ""=>,
                            );
                    
                    
                            
                    // echo 'Value Of Day: '.$day_.' Value Of Today : '.$today;
                    // echo ' Date : '.$day.'-'.$min_temp.', Hour : '.$hour.', Minute: '.$minutes.' Temperature: '.$temperature.'</br>';
                }else{
                    // echo 'Other Day';
                    // die( json_encode(array("code"=>0,'data'=>'A')));
                }
                // print_r($data);
                // die( json_encode(array("code"=>0,'data'=>'A')));
                
            // }else{
            //     // die( json_encode(array("code"=>0,'data'=>'B')));
            // }
            
        }
 die( json_encode($data));
    }
//  foreach(){
     
//  }


}



}
?>