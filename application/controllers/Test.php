<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Test extends MY_Controller {
// 	function __construct(){
// 		parent::__construct();
// 		$this->load->model('TestModel','Test');
// 				$this->load->model('FriendsModel','FRND');
// 	}

// 	public function index(){
// 		$this->checkFunction();
// 	}

// 	public function changeProfilePic(){
// 		if(isset($_POST['android'])){
// 			$user_id=$this->input->post('user_id');
// 		}else{
// 			$user_id=$this->input->post('user_id');
// 		}
// 		$imgDetails=pathinfo($_FILES['picture']['name']);
// 		$imgName="User-Profile-Pic-".$user_id.'-'.date('H-i-s').'.'.$imgDetails['extension'];
// 		$target_path='./assets/img/Profile_Pic/'.$imgName;
// 		$source_url=$_FILES['picture']['tmp_name'];
// 		$st=$this->compressImage($source_url, $target_path, 60);
// 		if($st){
// 			$condition=array("user_id"=>$user_id);
// 			$toUpdate=array("profile_picture"=>$imgName);
// 			if($this->Test->updateMyProfilePic($condition,$toUpdate)){
// 				die(json_encode(array("code"=>1,"msg"=>"Profile pic Updated Successfully.","newPic"=>$imgName)));
// 			}else{
// 				die(json_encode(array("code"=>0,"msg"=>"Failed To Update Profile pic.")));
// 			}
// 		}
// 	}

// 	public function changeCoverPhoto(){
// 		if(isset($_POST['android'])){
// 			$user_id=$this->input->post('user_id');
// 		}else{
// 			$user_id=$this->input->post('user_id');
// 		}
// 		$imgDetails=pathinfo($_FILES['picture']['name']);
// 		$imgName="Cover-Photo-".$user_id.'-'.date('H-i-s').'.'.$imgDetails['extension'];
// 		$target_path='./assets/img/Cover_Photo/'.$imgName;
// 		$source_url=$_FILES['picture']['tmp_name'];
// 		$st=$this->compressImage($source_url, $target_path, 60);
// 		if($st){
// 			// $newProfilePhoto="*** / / / ***";
// 			$condition=array("user_id"=>$user_id);
// 			$toUpdate=array("cover_photo"=>$imgName);
// 			if($this->Test->updateMyProfilePic($condition,$toUpdate)){
// 				die(json_encode(array("code"=>1,"msg"=>"Cover Photo Updated Successfully.","newCover"=>$imgName)));
// 			}else{
// 				die(json_encode(array("code"=>0,"msg"=>"Failed To Update Cover Photo.")));
// 			}
// 		}
// 	}
// 	public function compressImage($source_url, $destination_url, $quality) {

// 		$info = getimagesize($source_url);
  
// 		if ($info['mime'] == 'image/jpeg') 
// 		  $image= imagecreatefromjpeg($source_url);
// 		elseif ($info['mime'] == 'image/gif')
// 		  $image = imagecreatefromgif($source_url);
// 		elseif ($info['mime'] == 'image/png')
// 		  $image = imagecreatefrompng($source_url);
  
// 		//save file
// 		imagejpeg($image, $destination_url, $quality);
  
// 		//return destination file
// 		return $destination_url;
// 	}
// 	public function notifyUser(){
// 		$data=array(
// 					"notify_by"=>$this->input->post('notify_by'),
// 					"notification_"=>$this->input->post('notification_'),
// 					"notify_to"=>$this->input->post('notify_to')	
// 				);
// 		if($this->Test->postNotification($data)){
// 			die(json_encode(array("code"=>1,"data"=>"Notification sent Successfully.")));
// 		}else{
// 			die(json_encode(array("code"=>1,"data"=>"Failed to send notification.")));
// 		}
// 	}
// 	public function notifications(){
// 		$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		// Get MY Notifications
// 		$notif=array("notify_to"=>$user_Id);
// 		$this->db->where($notif);
// 		$this->db->join('users','users.user_id=notifications_.notify_by');
// 		$data['myNotifications']=$this->db->get('notifications_')->result();
// 		$this->load->view('web/template/header');
// 		// $this->load->view('web/template/sideSection');
// 		$this->load->view('web/notification',$data);
// 		$this->load->view('web/template/footer');
// 	}
// 	public function updateNotificationStatus(){
// 		$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$this->db->update('notifications_',array("notify_to"=>$user_Id,"status_"=>1));
// 	}
// 	public function updateMessageStatus(){
// 		$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$this->db->where('sent_to',$user_id);
// 		$this->db->update('messages_',array("read_status"=>1));
// 	}
// 	public function searchFriend(){
// 		$search_key=$this->input->post('key');
// 		$this->db->like('full_name',$search_key,'after');
// 		$data=$this->db->get('users')->result();
// 		if(count($data)>0){
// 			die(json_encode(array("code"=>1,"data"=>$data)));
// 		}else{
// 			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
// 		}
// 	}
// 	public function People(){
// 		$session=$this->session->userdata('logged_in');
// 		$id=$session[0]->user_id;
// 		$data['People']=$this->Test->getRandomUser($id);
// 		$this->load->view('web/template/header');
// 		$this->load->view('web/people',$data);
// 		$this->load->view('web/template/footer');
// 	}

// 	public function SuggestionFriends(){

// 		$this->load->view('web/template/header');
// 		$this->load->view('web/suggestionFriends');
// 		$this->load->view('web/template/footer');
// 	}

// 	public function searchResults(){
// 		$tag=$_POST['search-tag'];
// 				$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
// 		$data['search_friends'] = $this->Test->search_friends($tag);
// 		$this->load->view('web/template/header');
// 		$this->load->view('web/searchFriends',$data);
// 		$this->load->view('web/template/footer');
// 	}

// 	public function ActivityLogs(){
// 		$this->db->join('users','users.user_id=recent_activity.user_id');
// 		$data['myNotifications']=$this->db->get('recent_activity')->result();
// 		$this->load->view('web/template/header',$data);
// 		$this->load->view('web/activityLogs');
// 		$this->load->view('web/template/footer');
// 	}

// 	public function group(){
// 		$this->load->view('web/template/header');
// 		$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
// 		$data['allGroups']=$this->db->get('user_groups')->result();
// 		$this->load->view('web/groupPage',$data);
// 		$this->load->view('web/template/footer');
// 	}
// 	public function favourite(){
// 		$this->load->view('web/template/header');
// 		$data['allGroups']=$this->db->get('user_groups')->result();
// 		$this->load->view('web/fav',$data);
// 		$this->load->view('web/template/footer');
// 	}
// 	public function page(){
// 		$this->load->view('web/template/header');
// 			$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
// 		$this->load->view('web/createPage',$data);
// 		$this->load->view('web/template/footer');
// 	}
// 	public function createPage(){
// 		// print_r($_POST);
// 		$session=$this->session->userdata('logged_in');
// 		$user_Id=$session[0]->user_id;
// 		$data=array(
// 				'page_name'=>$this->input->post('page_name'),
// 				'category'=>$this->input->post('category'),
// 				'user_id'=>$user_Id
// 		);
// 		$this->db->where($data);
// 		if(count($this->db->get('user_page')->result())==0){
// 			if($this->db->insert('user_page',$data)){
// 				die(json_encode(array("code"=>1)));
// 			}else{
// 				die(json_encode(array("code"=>0)));
// 			}
			
// 		}else{
// 			die(json_encode(array("code"=>0)));
// 		}
// 	}
// 		public function get_States()
//     {
//         $data=$this->Test->fetchState_Byid($this->input->post('countryid'));
        
//         // print_r($data);
//         if(count($data)>0)
//         {
//             die(json_encode(array('code'=>1,"data"=>$data)));
//         }
//         else
//         {
//              die(json_encode(array('code'=>0,"data"=>"No data Found ")));
//         }
//     }
//      public function get_Cities()
//     {
//         $data=$this->Test->fetchCities_Byid($this->input->post('stateId'));
        
//         // print_r($data);
//         if(count($data)>0)
//         {
//             die(json_encode(array('code'=>1,"data"=>$data)));
//         }
//         else
//         {
//              die(json_encode(array('code'=>0,"data"=>"No data Found ")));
//         }
//     }
	
// 	public function AddJobPost()
// 	{
// 	    if(!empty($_FILES['userfile']['name']))
// 	    	{   
// 	       // 	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
// 	       // 	$_FILES['file']['name'] = "country_image-".date("Y-m-d-H-i-s").$ext;
//                 $configg['upload_path'] = 'assets/jobpost/';
//                 $configg['allowed_types'] = 'jpg|jpeg|png|gif';
//                 $configg['file_name'] = $_FILES['userfile']['name'];
                
//                 //Load upload library and initialize configuration
//                 $this->load->library('upload',$configg);
//                 $this->upload->initialize($configg);
                
//                     if($this->upload->do_upload('userfile'))
//                     {
//                         $uploadData = $this->upload->data();
//                         $jobpostpicture =$uploadData['file_name'];
//                     }
//                     else
//                     {
//                         $jobpostpicture = '';
//                     }
//                 }
//                 else{
//                 	echo"single error";
//                 }
//                     if(!empty($uploadData))
// 		         {
     	 	 	 	 	 	 	 	 
// 	             $data=array("jobpost_title"=>$this->input->post('jobpost_title'),
// 	             			"jobpost_description"=>$this->input->post('jobpost_description'),
// 	             			"jobpost_countries"=>$this->input->post('country'),
// 	             			"jobpost_states"=>$this->input->post('state'),
// 				 		    "jobpost_cities"=>$this->input->post('city'),
// 				 		    "jobpost_salary"=>$this->input->post('jobpost_salary'),
// 				 		    "jobpost_salarytype"=>$this->input->post('jobpost_salarytype'),
// 				 		    "jobpost_jobtype"=>$this->input->post('jobpost_jobtype'),
// 				 		    "jobpost_image"=>$jobpostpicture,);

//         	    $results=$this->Test->insert_JobPostData($data);
        	  
//                 if($results==1)
//                 {
//                     die(json_encode(array("status"=>1,'message'=>"Post Add Successfully")));
                    
//     	        }
//     	        elseif($result==2)
//     	        {
//     	            die(json_encode(array("status"=>2,'message'=>"Already Exist"))); 
//     	        }
//     	        else
//     	        {
//     	           die(json_encode(array("status"=>0,'message'=>"Try Again Server Error")));  
//     	        }
                
//             }
         	  
//              else
// 		        {
// 		         die(json_encode(array("status"=>0,'message'=>"Try Again Server Error")));  
// 		        }
    
// 	}
	
// }
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('TestModel','Test');
				$this->load->model('FriendsModel','FRND');
	}

	public function index(){
		$this->checkFunction();
	}

	public function changeProfilePic(){
		if(isset($_POST['android'])){
			$user_id=$this->input->post('user_id');
		}else{
			$user_id=$this->input->post('user_id');
		}
		$imgDetails=pathinfo($_FILES['picture']['name']);
		$imgName="User-Profile-Pic-".$user_id.'-'.date('H-i-s').'.'.$imgDetails['extension'];
		$target_path='./assets/img/Profile_Pic/'.$imgName;
		$source_url=$_FILES['picture']['tmp_name'];
		$st=$this->compressImage($source_url, $target_path, 60);
		if($st){
			$condition=array("user_id"=>$user_id);
			$toUpdate=array("profile_picture"=>$imgName);
			if($this->Test->updateMyProfilePic($condition,$toUpdate)){
				die(json_encode(array("code"=>1,"msg"=>"Profile pic Updated Successfully.","newPic"=>$imgName)));
			}else{
				die(json_encode(array("code"=>0,"msg"=>"Failed To Update Profile pic.")));
			}
		}
	}
public function get_States()
    {
        $data=$this->Test->fetchState_Byid($this->input->post('countryid'));
        
        // print_r($data);
        if(count($data)>0)
        {
            die(json_encode(array('code'=>1,"data"=>$data)));
        }
        else
        {
             die(json_encode(array('code'=>0,"data"=>"No data Found ")));
        }
    }
     public function get_Cities()
    {
        $data=$this->Test->fetchCities_Byid($this->input->post('stateId'));
        
        // print_r($data);
        if(count($data)>0)
        {
            die(json_encode(array('code'=>1,"data"=>$data)));
        }
        else
        {
             die(json_encode(array('code'=>0,"data"=>"No data Found ")));
        }
    }
	public function changeCoverPhoto(){
		if(isset($_POST['android'])){
			$user_id=$this->input->post('user_id');
		}else{
			$user_id=$this->input->post('user_id');
		}
		$imgDetails=pathinfo($_FILES['picture']['name']);
		$imgName="Cover-Photo-".$user_id.'-'.date('H-i-s').'.'.$imgDetails['extension'];
		$target_path='./assets/img/Cover_Photo/'.$imgName;
		$source_url=$_FILES['picture']['tmp_name'];
		$st=$this->compressImage($source_url, $target_path, 60);
		if($st){
			// $newProfilePhoto="*** / / / ***";
			$condition=array("user_id"=>$user_id);
			$toUpdate=array("cover_photo"=>$imgName);
			if($this->Test->updateMyProfilePic($condition,$toUpdate)){
				die(json_encode(array("code"=>1,"msg"=>"Cover Photo Updated Successfully.","newCover"=>$imgName)));
			}else{
				die(json_encode(array("code"=>0,"msg"=>"Failed To Update Cover Photo.")));
			}
		}
	}
	public function compressImage($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);
  
		if ($info['mime'] == 'image/jpeg') 
		  $image= imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif')
		  $image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png')
		  $image = imagecreatefrompng($source_url);
  
		//save file
		imagejpeg($image, $destination_url, $quality);
  
		//return destination file
		return $destination_url;
	}
	public function notifyUser(){
		$data=array(
					"notify_by"=>$this->input->post('notify_by'),
					"notification_"=>$this->input->post('notification_'),
					"notify_to"=>$this->input->post('notify_to')	
				);
		if($this->Test->postNotification($data)){
			die(json_encode(array("code"=>1,"data"=>"Notification sent Successfully.")));
		}else{
			die(json_encode(array("code"=>1,"data"=>"Failed to send notification.")));
		}
	}
	public function notifications(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		// Get MY Notifications
		$notif=array("notify_to"=>$user_Id);
		$this->db->where($notif);
		$this->db->join('users','users.user_id=notifications_.notify_by');
		$data['myNotifications']=$this->db->get('notifications_')->result();
		$this->load->view('web/template/header');
		// $this->load->view('web/template/sideSection');
		$this->load->view('web/notification',$data);
		$this->load->view('web/template/footer');
	}
	public function updateNotificationStatus(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$this->db->update('notifications_',array("notify_to"=>$user_Id,"status_"=>1));
	}
	public function updateMessageStatus(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$this->db->where('sent_to',$user_id);
		$this->db->update('messages_',array("read_status"=>1));
	}
	public function searchFriend(){
		$search_key=$this->input->post('key');
		$this->db->like('full_name',$search_key,'after');
		$data=$this->db->get('users')->result();
		if(count($data)>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function People(){
		$session=$this->session->userdata('logged_in');
		$id=$session[0]->user_id;
		$data['People']=$this->Test->getRandomUser($id);
		$this->load->view('web/template/header');
		$this->load->view('web/people',$data);
		$this->load->view('web/template/footer');
	}

	public function SuggestionFriends(){

		$this->load->view('web/template/header');
		$this->load->view('web/suggestionFriends');
		$this->load->view('web/template/footer');
	}

	public function searchResults(){
		$tag=$_POST['search-tag'];
				$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$data['search_friends'] = $this->Test->search_friends($tag);
		$this->load->view('web/template/header');
		$this->load->view('web/searchFriends',$data);
		$this->load->view('web/template/footer');
	}

	public function ActivityLogs(){
		$this->db->join('users','users.user_id=recent_activity.user_id');
		$data['myNotifications']=$this->db->get('recent_activity')->result();
		$this->load->view('web/template/header',$data);
		$this->load->view('web/activityLogs');
		$this->load->view('web/template/footer');
	}

	public function group(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$this->load->view('web/groupPage',$data);
		$this->load->view('web/template/footer');
	}
	public function favourite(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$this->db->join('users','users.user_id=user_fav_section.fav_user_id');
		$this->db->join('post_','post_.post_id=user_fav_section.post_id');
		$this->db->where('user_fav_section.user_id',$user_Id);
		$data['favpost']=$this->db->get('user_fav_section')->result();
		$data['favphoto']=$this->Test->favphoto();
		$data['favchat']=$this->Test->favchat();
		$this->load->view('web/fav',$data);
		$this->load->view('web/template/footer');
	}
	public function favposts(){
    	$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$this->db->join('users','users.user_id=user_fav_section.fav_user_id');
		$this->db->join('post_','post_.post_id=user_fav_section.post_id');
		$this->db->where('user_fav_section.user_id',$user_Id);
		$data['favpost']=$this->db->get('user_fav_section')->result();
		$this->load->view('web/favpost',$data);
		$this->load->view('web/template/footer');
	}
	public function favphotos(){
    	$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$data['favphoto']=$this->Test->favphoto();
		$this->load->view('web/favphoto',$data);
		$this->load->view('web/template/footer');
	}
	public function favchat(){
    	$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$data['favchat']=$this->Test->favchat();
		$this->load->view('web/favchats',$data);
		$this->load->view('web/template/footer');
	}
	
	public function page(){
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$this->load->view('web/template/header');
		$this->load->view('web/createPage');
		$this->load->view('web/template/footer');
	}
	public function createPage(){
		// print_r($_POST);
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data=array(
				'page_name'=>$this->input->post('page_name'),
				'category'=>$this->input->post('category'),
				'user_id'=>$user_Id
		);
		$this->db->where($data);
		if(count($this->db->get('user_page')->result())==0){
			if($this->db->insert('user_page',$data)){
				die(json_encode(array("code"=>1)));
			}else{
				die(json_encode(array("code"=>0)));
			}
			
		}else{
			die(json_encode(array("code"=>0)));
		}
	}
	public function AddJobPost()
	{
	    if(!empty($_FILES['userfile']['name']))
	    	{   
	       // 	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       // 	$_FILES['file']['name'] = "country_image-".date("Y-m-d-H-i-s").$ext;
                $configg['upload_path'] = 'assets/jobpost/';
                $configg['allowed_types'] = 'jpg|jpeg|png|gif';
                $configg['file_name'] = $_FILES['userfile']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$configg);
                $this->upload->initialize($configg);
                
                    if($this->upload->do_upload('userfile'))
                    {
                        $uploadData = $this->upload->data();
                        $jobpostpicture =$uploadData['file_name'];
                    }
                    else
                    {
                        $jobpostpicture = '';
                    }
                }
                else{
                	echo"single error";
                }
                    if(!empty($uploadData))
		         {
     	 	 	 	 	 	 	 	 
	             $data=array("jobpost_title"=>$this->input->post('jobpost_title'),
	             			"jobpost_description"=>$this->input->post('jobpost_description'),
	             			"jobpost_countries"=>$this->input->post('jobpost_countries'),
	             			"jobpost_states"=>$this->input->post('jobpost_states'),
				 		    "jobpost_cities"=>$this->input->post('jobpost_cities'),
				 		    "jobpost_salary"=>$this->input->post('jobpost_salary'),
				 		    "jobpost_salarytype"=>$this->input->post('jobpost_salarytype'),
				 		    "jobpost_jobtype"=>$this->input->post('jobpost_jobtype'),
				 		    "jobpost_company"=>$this->input->post('jobpost_company'),
				 		    "jobpost_time"=>date('d-m-Y h:i:s'),
				 		    "jobpost_image"=>$jobpostpicture,);

        	    $results=$this->Test->insert_JobPostData($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Post Add Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error Try again');
						break;
				}

				//  redirect('Country/CountrySection');

		        }

		        else
		        {
		        	echo"error";
		        }
                
	    
	    
	    
	}

		 public function makefavrt()
        {
			$session=$this->session->userdata('logged_in');
			$user_Id=$session[0]->user_id;
			$fav_user_id=$this->input->post('fav_id');
           	if(isset($_POST['fvrt'])==1)
			{
				$post=1;
			}
			else
			{
				$post=0;
			}
			if(isset($_POST['fvrt'])==2)
			{
				$photos=2;
			}
			else
			{
				$photos=0;
			}
			if(isset($_POST['fvrt'])==3)
			{
				$chat=3;
			}
			else
			{
				$chat=0;
			}
			if($post==1)
			{
			     $data=array('post_id'=>$this->input->post('post_id'),
		            'user_id'=>$user_Id,'fav_user_id'=>$fav_user_id,
		            'contentType'=>$post);
		      $results=$this->Test->makefvrtData($data);
		      switch($results) 
				{
					case 0:die(json_encode(array('status'=>'0','msg'=>'Error')));
						break;
					case 1:die(json_encode(array('status'=>'1','msg'=>'add To fvrt Post')));
						break;
					case 2:die(json_encode(array('status'=>'2','msg'=>'Already exist')));
						break;
					default:die(json_encode(array('status'=>'3','msg'=>'Error')));
						break;
				}
			    
			}
			elseif($photos==2)
			{
			     $data=array('album_id'=>$this->input->post('album_id'),
		                     'user_id'=>$this->input->post('user_id'),'fav_user_id'=>$fav_user_id,
		                      'contentType'=>$photos);
		      $results=$this->Test->makefvrtData($data);
		      switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','add photos as fvrt');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}
			}
			else
			{
			     $data=array('conversation_id'=>$this->input->post('conversation_id'),
		                     'user_id'=>$this->input->post('user_id'),'fav_user_id'=>$fav_user_id,
		                      'contentType'=>$chat);
		      $results=$this->Test->makefvrtData($data);
		      switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','add Chat as fvrt');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}
			}
	    
        }
       
	
}
?>