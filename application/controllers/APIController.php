<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->model('APIModel','APIM');
		$this->load->model('PostModel','POST');
		$this->load->model('FriendsModel','FRND');
	}
	//compredddss Image
	public function resizeImage($filename)
	{
	   	// echo $_SERVER['DOCUMENT_ROOT'];
	      $source_path = $_SERVER['DOCUMENT_ROOT'] . '/BrainT/laneCrowd/assets/uploads/images/' . $filename;//
	      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/BrainT/laneCrowd/assets/uploads/images/';
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
   	//To Add Timeline Post
   	public function addTimeLinePost(){
   		$user_id=$_SESSION['logged_in'][0]->user_id;
   		
   		$owner_id=$_POST['u_id'];
		$post_type=$_POST['post_type'];
		$post_text=$_POST['post'];
		$timenow = date('Y-m-d H:i:s');
		// print_r($_POST);
		// die;
		// `post`, `post_files`, `post_type`, `posted_by`, `initially_posted_by`, `posted_o
		if(isset($_POST['imgageData']))
		{
			$imgageData = $_POST['imgageData'];
			list($type, $imgageData) = explode(';', $imgageData);
			list(, $imgageData)      = explode(',', $imgageData);
			$imgageData = base64_decode($imgageData);
			$filename="post-images-".date("Y-m-d-H-i-s")."."."png";
			file_put_contents('assets/uploads/images/'.$filename, $imgageData);
			//$imgageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgageData));
			// print_r($imgageData);
			// $data=array('story_type' =>$story_type ,'posted_by'=>$user_id,'story'=>$story_text,'posted_on'=>$posted_on,'story_status'=>1);
			  $data = array('post_files'=>$filename,'post_type'=>1,'owner_id'=>$owner_id,'posted_by'=>$user_id,'initially_posted_by'=>$user_id,'posted_on'=>$timenow
		                );
			  $result=$this->APIM->insert_post_two($data);
				if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'Post screen Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif($post_type==0 && !isset($_POST['imgageData']))
		{
			$data=array('post_type' =>$post_type ,'posted_by'=>$user_id,'owner_id'=>$owner_id,'post'=>$post_text,'initially_posted_by'=>$user_id,'posted_on'=>$timenow);
			$result=$this->APIM->insert_post_two($data);
			if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'Post Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif ($post_type==1 && !isset($_POST['imgageData']))
		{
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Post-image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/uploads/images/';
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
		                	'post'=>$post_text,
		                	'post_files'=>$pics,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>1,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post_two($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post images Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			elseif ($post_type==2 && !isset($_POST['imgageData']))
			{
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Post-video-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/uploads/videos/';
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
		                $data = array(
		                	'post'=>$post_text,
		                	'post_files'=>$pics,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>2,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post_two($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post videos Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			else{
				$configVideo['upload_path'] = 'assets/uploads/videos'; # check path is correct
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
		                	'post'=>$post_text,
		                	'post_files'=>$name,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>2,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post_two($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post only video Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}
				}
			}
   	}
   	
   	// To send Notification
   	
   	public function sendNotification($to, $message,$by){
   	    $table="notifications_";
   	    $condition=array("notification_"=>$message,"notify_by"=>$by,"notify_to"=>$to);
   	    $this->db->where($condition);
   	    if(count($this->db->get($table)->result())==0){
   	        if($this->db->insert($table,$condition)){
   	            return true;
   	        }else{
   	            // die(json_encode(array("code"=>1)));
   	            return false;
   	        }
   	    }else{
   	        return false;
   	    }
   	}
	//To Add Post
	public function addPost()
	{
		$user_id=$_SESSION['logged_in'][0]->user_id;
		if(isset($_POST['u_id'])){
			$owner_id=$_POST['u_id'];
		}else{
			$owner_id=$user_id;
		}
		
		$post_type=$_POST['post_type'];
		$post_text=$_POST['post'];
		$timenow = date('Y-m-d H:i:s');
		// `post`, `post_files`, `post_type`, `posted_by`, `initially_posted_by`, `posted_o
		if(isset($_POST['imgageData']))
		{
			$imgageData = $_POST['imgageData'];
			list($type, $imgageData) = explode(';', $imgageData);
			list(, $imgageData)      = explode(',', $imgageData);
			$imgageData = base64_decode($imgageData);
			$filename="post-images-".date("Y-m-d-H-i-s")."."."png";
			file_put_contents('assets/uploads/images/'.$filename, $imgageData);
			//$imgageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgageData));
			// print_r($imgageData);
			// $data=array('story_type' =>$story_type ,'posted_by'=>$user_id,'story'=>$story_text,'posted_on'=>$posted_on,'story_status'=>1);
			  $data = array('post_files'=>$filename,'post_type'=>1,'owner_id'=>$owner_id,'posted_by'=>$user_id,'initially_posted_by'=>$user_id,'posted_on'=>$timenow
		                );
			  $result=$this->APIM->insert_post($data);
				if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'Post screen Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif($post_type==0 && !isset($_POST['imgageData']))
		{
			$data=array('post_type' =>$post_type ,'posted_by'=>$user_id,'owner_id'=>$owner_id,'post'=>$post_text,'initially_posted_by'=>$user_id,'posted_on'=>$timenow);
			$result=$this->APIM->insert_post($data);
			if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'Post Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif ($post_type==1 && !isset($_POST['imgageData']))
		{
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Post-image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/uploads/images/';
		                $config['upload_path'] = $uploadPath;
		                $config['max_size'] = '*';
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
		                	'post'=>$post_text,
		                	'post_files'=>$pics,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>1,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post images Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			elseif ($post_type==2 && !isset($_POST['imgageData']))
			{
				
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Post-video-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/uploads/videos/';
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
		                $data = array(
		                	'post'=>$post_text,
		                	'post_files'=>$pics,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>2,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post videos Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			else{
				$configVideo['upload_path'] = 'assets/uploads/videos'; # check path is correct
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
		                	'post'=>$post_text,
		                	'post_files'=>$name,
		                	'owner_id'=>$owner_id,
		                	'post_type'=>2,
		                	'posted_by'=>$user_id,
		                	'initially_posted_by'=>$user_id,
		                	'posted_on'=>$timenow
		                );
		                $result=$this->APIM->insert_post($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post only video Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}
				}
			}
	}
	//To Get All Post
	public function getAllMyPost(){
		if(!isset($_POST['android'])){
			$condition=array("posted_by"=>$this->input->post('user_id'));
		}else{
			$condition=array("posted_by"=>$this->input->post('user_id'));
		}
		$offset=$this->input->post('offset');
		/*if(count($data=$this->APIM->getAllPostDetails($condition,$offset))>0){*/
			if($data=$this->APIM->getAllPostDetails($condition)){
			foreach ($data as $key => $value) {
				//  n print_r($value);
				// print_r($value);
				// if($value->initially_posted_by!=$value->posted_by){
				// 	$p_Data['shared_by']=
				// }
				$p_Data['post_id']=$value->post_id;
				$p_Data['user_id']=$value->user_id;
				$p_Data['post']=$value->post;
				$p_Data['post_files']=$value->post_files;
				$p_Data['post_type']=$value->post_type;
				$p_Data['posted_by']=$value->full_name;
				$p_Data['profile_pic']=$value->profile_picture;
				$p_Data['initially_posted_by']=$value->initially_posted_by;
				$p_Data['posted_on']=$value->posted_on;
				$p_Data['total_likes']=$this->getLikeCount($value->post_id);
				$p_Data['total_dislikes']=$this->getDislikeCount($value->post_id);
				$p_Data['total_comments']=$this->getComment($value->post_id);
				$p_Data['total_share']=$this->getShareCount($value->post_id);
				$posts[]=$p_Data;
			}	
			die(json_encode(array("code"=>1,"data"=>$posts)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
		
	}

	//To Get Friends
	public function getAllMyFriends(){
		if(!isset($_POST['android'])){
			$condition=array("friend_id"=>1);
		}else{
			$condition=array("friend_id"=>$this->input->post('user_id'));
		}
		if(count($data=$this->APIM->getAllDetails('friends_',$condition))>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	} 
	//To Send Request
	public function sendRequest(){
		if(!isset($_POST['android'])){
			$condition=array("sent_by"=>$this->input->post('sent_by'),"sent_to"=>$this->input->post('sent_to'));
		}else{
			$condition=array("sent_by"=>$this->input->post('sent_by'),"sent_to"=>$this->input->post('sent_to'));
		}
		$data=array(
					"sent_by"=>$this->input->post('sent_by'),
					"sent_to"=>$this->input->post('sent_to')
					);
		if(count($this->APIM->getAllDetails('friend_request',$condition))==0){
			if($this->APIM->addData('friend_request',$data)){
			    //send notification
			    if($this->sendNotification($this->input->post('sent_by'),"Sent Friend Request",$this->input->post('sent_by'))){
			        die(json_encode(array("code"=>1,"data"=>"Request Sent.")));    
			    }else{
			        die(json_encode(array("code"=>0,"data"=>"Failed to Send Notification")));
			    }
			    
				
			}else{
				die(json_encode(array("code"=>0,"data"=>"Failed To Send Request.")));
			}
			
		}else{
			die(json_encode(array("code"=>0,"data"=>"Failed Request Already Sent.")));
		}
	}
	// To Update LikeCount

	public function updateLike($post_id, $action){
		// echo ' Post Id: '.$post_id.' : '.$action;
		if($action==1){
			$this->db->where('post_id',$post_id);
			if(count($data=$this->db->get('post_')->result())>0){
				$toUpdate=array("total_likes"=>$data[0]->total_likes + 1);
				$this->db->where('post_id',$post_id);
				if($this->db->update('post_',$toUpdate)){
					return true;
				}else{
					return false;
				}
			}
			
		}else{
			$this->db->where('post_id',$post_id);
			if(count($data=$this->db->get('post_')->result())>0){
				$toUpdate=array("total_likes"=>$data[0]->total_likes - 1);
				$this->db->where('post_id',$post_id);
				if($this->db->update('post_',$toUpdate)){
					return true;
				}else{
					return false;
				}
			}
		}
	}
	//To Cancel Request
	public function actionRequest(){
		$req_Id=$this->input->post('reqId');
		$condition=array("req_id"=>$req_Id);
		$my_Id=$this->input->post('myid');
		$toAct=$this->input->post('toAct');
    	if($toAct==1){
    		$action=1;
    		$toUpdate=array("request_status"=>1);
    		if($this->APIM->updateRequestStatus($toUpdate,$condition)){
    			$friendDetail=$this->getRequestDetail($condition);
    			$toInsert=array("friend_id"=>$friendDetail[0]->sent_by,"user_id"=>$my_Id);
    			// print_r($toInsert);
    			if($this->APIM->makeItMyFriend($toInsert)){
    				die(json_encode(array("code"=>1,"data"=>"Request Accepted.")));
    			}
    			
    		}else{
    			die(json_encode(array("code"=>0,"data"=>"Request Sent.")));
    		}
    	}else{
    		//Now Delete Request
    		$action=3;
    		if($this->APIM->deleteRequest($condition)){
    			die(json_encode(array("code"=>1,"data"=>"Request Deleted.")));
    		}else{
    			die(json_encode(array("code"=>0,"data"=>"Failed To Delete Request.")));
    		}
    	}
		
		// if(count($this->APIM->getAllDetails('friend_request',$condition))==0){
		// 	if($this->APIM->addData('friend_request',$data)){
		// 		die(json_encode(array("code"=>1,"data"=>"Request Sent.")));
		// 	}else{
		// 		die(json_encode(array("code"=>0,"data"=>"Failed To Send Request.")));
		// 	}
			
		// }else{
		// 	die(json_encode(array("code"=>0,"data"=>"Failed Request Already Sent.")));
		// }
	}
	//To Like Or Dislike Post
	// `like_or_dislike`(`id`, `post_id`, `user_id`, `post_slug`, `like_or_dislike`)
	public function getRequestDetail($condition){
		// print_r($condition);
		return $res=$this->APIM->getAllDetails('friend_request',$condition);

	}
	public function deleteRequest(){
		$req=$this->input->post('req');
			$this->db->where('req_id',$req);
			if($this->db->delete('friend_request')){
    			die(json_encode(array("code"=>1,"data"=>"Request Deleted.")));
    		}else{
    			die(json_encode(array("code"=>0,"data"=>"Failed To Delete Request.")));
    		}
	}
public function getPostLikes($post_id){
	return $this->APIM->getPostLikeDetails($post_id);

}


	public function likeOrdislike(){
		$post_id=$this->input->post('post_id');
		$toDo=$this->input->post('to_do');
		if(isset($_POST['android'])){
			$user_id=$this->input->post('user_id');
		}else{
			$user_id=$_SESSION['logged_in'][0]->user_id;
		}

		if(($data=$this->checkForPost_in_Like_Dislike_Table($post_id, $user_id))!=false){
			// print_r($data);
			// echo 'user like or dislike krta h';
			

			if($data[0]->like_or_dislike==1){
				// echo 'user like krta h';
				$likedata = $this->getPostLikes($post_id);
				if($this->dislikePost($post_id, $user_id)){
					if ($this->updateLike($post_id, 2)) {
						
						die(json_encode(array("code"=>1,"msg"=>"Post Disliked.","likedata"=>$likedata)));
					}
					
				}else{
					die(json_encode(array("code"=>0,"msg"=>"Failed To dislike Post.")));
				}
				
			}
		
		}else{
			// echo 'user like or dislike nhi krta';

			if($resp=$this->likePost($post_id, $user_id)){
					$likedata = $this->getPostLikes($post_id);
					// print_r(expression)
					switch ($resp) {
						case 1:
							if ($this->updateLike($post_id, 1)) {
								die(json_encode(array("code"=>1,"msg"=>"Post Liked.","likedata"=>$likedata)));
							}
							break;
						case 0:die(json_encode(array("code"=>0,"msg"=>"Failed to Like It.")));
							break;
						case 2:
							if ($this->updateLike($post_id, 2)) {
								die(json_encode(array("code"=>2,"msg"=>"You already liked it.")));
							}
							break;
						default:
							# code...
							break;
					}
				
				}
		}

		// if($toDo=='like'){
		// 	if($resp=$this->likePost($post_id, $user_id)){
		// 		switch ($resp) {
		// 			case 1:
		// 				if ($this->updateLike($post_id, 1)) {
		// 					die(json_encode(array("code"=>1,"msg"=>"Post Liked.")));
		// 				}
		// 				break;
		// 			case 0:die(json_encode(array("code"=>0,"msg"=>"Failed to Like It.")));
		// 				break;
		// 			case 2:
		// 				if ($this->updateLike($post_id, 2)) {
		// 					die(json_encode(array("code"=>2,"msg"=>"You already liked it.")));
		// 				}
		// 				break;
		// 			default:
		// 				# code...
		// 				break;
		// 		}
				
		// 	}else{
		// 		die(json_encode(array("code"=>0,"msg"=>"Failed To Like Post.")));
		// 	}
		// }else{
		// 	if($this->dislikePost($post_id, $user_id)){
		// 		if ($this->updateLike($post_id, 2)) {
		// 			die(json_encode(array("code"=>1,"msg"=>"Post Disliked.")));
		// 		}
				
		// 	}else{
		// 		die(json_encode(array("code"=>0,"msg"=>"Failed To dislike Post.")));
		// 	}
		// }
	}
	//Check whether post exists in like_or_dislike table
	public function checkForPost_in_Like_Dislike_Table($post_id, $user_id){
		$condition=array("post_id"=>$post_id,"user_id"=>$user_id);
		// print_r($condition);
		if(count($data=$this->APIM->getAllDetails('like_or_dislike',$condition))>0){
			return $data;
		}else{
			return false;
		}
	}
	//Check Whether i like this post or not
	public function likePost($post_id, $user_id){
		if(($data=$this->checkForPost_in_Like_Dislike_Table($post_id, $user_id))!=false){
			// print_r($data);
			if($data[0]->like_or_dislike==0||$data[0]->like_or_dislike==2){
				$toUpdate=array("like_or_dislike"=>1);
				$condition=array("post_id"=>$post_id,"user_id"=>$user_id);
				if($this->APIM->updateData('like_or_dislike',$toUpdate,$condition)){
					// echo 'Like the Post';
					return 1;
				}else{
					// echo 'Failed to Like It.';
					return 0;
				}
			}else{
				// echo 'I Like it already.';
				return 2;
			}
		}else{
			// echo 'Post Insert Krni h with like';
			$toInsert=array("post_id"=>$post_id,"user_id"=>$user_id,"like_or_dislike"=>1);
			if($this->APIM->addData('like_or_dislike',$toInsert)){
				// echo 'Like Post Inserted';
				return true;
			}else{
				// echo 'Failed to Insert Like.';
				return false;
			}
		}
	}
	//Check Whether i dislike this post or not
	public function dislikePost($post_id, $user_id){
			$condition=array("post_id"=>$post_id,"user_id"=>$user_id);
			if($this->db->delete('like_or_dislike',$condition)){
				// echo 'disLike the Post';
				return true;
			}else{
				// echo 'Failed to Like It.';
				return false;
			}
	}
	//Create SLUG for POSTs.
	public function createSlugForPost(){
		return random_string('alnum',10);
	}
	//Delete Post
	public function deletePost(){
		
		$data=array("post_id"=>$this->input->post('post_id'));
		if($this->APIM->deleteData('post_',$data)){
			$this->APIM->deleteData('like_or_dislike',$data);
			$this->APIM->deleteData('post_comments_',$data);
			die(json_encode(array("code"=>1,"data"=>"Post Deleted Successfully.")));
		}else{
			die(json_encode(array("code"=>0,"data"=>"Failed To Delete Post.")));
		}
	}

	//
	public function deleteComment(){
		
		$data=array("id"=>$this->input->post('c_id'));
		if($this->APIM->deleteData('post_comments_',$data)){
		
			die(json_encode(array("code"=>1,"data"=>"Comment Deleted Successfully.")));
		}else{
			die(json_encode(array("code"=>0,"data"=>"Failed To Delete Comment.")));
		}
	}



	//To Comment On Post
	public function addComment(){
		
		if(isset($_POST['android'])){
			$data=array("post_id"=>$this->input->post('post_id'),"commented_by_"=>$this->input->post('commented_by_'),"comment"=>$this->input->post('comment'),"commented_on"=>date('Y-m-d'));
		}else{
			$data=array("post_id"=>$this->input->post('post_id'),"commented_by_"=>$user_id=$_SESSION['logged_in'][0]->user_id,"comment"=>$this->input->post('comment'),"commented_on"=>date('d-m-Y h:i:s'));
		}
		if(!empty($this->input->post('comment')) && !empty($this->input->post('post_id'))){
			if($this->APIM->addData('post_comments_',$data)){
				die(json_encode(array("code"=>1,"data"=>"Comment Added Successfully.")));
			}else{
				die(json_encode(array("code"=>0,"data"=>"Failed To Post Comment.")));
			}
		}else{
			die(json_encode(array("code"=>0,"data"=>"Comment or Post Id Cannot be null.")));
		}
		
	}
	//To get Comments
	public function getComment($post_id){
		return $this->APIM->getAllDetails('post_comments_', $condition=array("post_id"=>$post_id));
	}//
	public function getModifyComment($post_id){
		$this->db->select('post_comments_.comment as comment, post_comments_.commented_on as commented_on, users.full_name as full_name,  post_comments_.id as comment_id');
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->where('post_comments_.post_id',$post_id)->get('post_comments_')->result();
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
	//To share post
	public function sharePost(){
		$post_id=$this->input->post('post_id');
		if(isset($_POST['android'])){
			$user_id=$this->input->post('user_id');
		}else{
			$user_id=$_SESSION['logged_in'][0]->user_id;
		}
		$condition=array("post_id"=>$post_id);
		$postDetail=$this->APIM->getAllDetails('post_', $condition);
		if($postDetail[0]->initial_post_id!=0){
			$initial_post_id=$postDetail[0]->initial_post_id;
		}else{
			$initial_post_id=$postDetail[0]->post_id;
		}
		$data=array("post_shared_id"=>$postDetail[0]->post_id,"initial_post_id"=>$initial_post_id,"post"=>$postDetail[0]->post,"post_type"=>$postDetail[0]->post_type,"posted_by"=>$user_id,"initially_posted_by"=>$postDetail[0]->initially_posted_by,"post_files"=>$postDetail[0]->post_files,"posted_on"=>date('Y-m-d h:i:s'));
		if($this->APIM->addData('post_',$data)){
			die(json_encode(array("code"=>1,"data"=>"Post Shared Successfully.")));
		}else{
			die(json_encode(array("code"=>0,"data"=>"Failed To Share.")));
		}
	}
	//get total Share
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
	}
	//Update Dislike Count
	public function updateDislikeCount(){

	}
	//Create SLUG For User.
	public function createSlugForUser(){
		// echo random_string('alnum',11);
		return random_string('alnum',11);
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
	public function createalbum()
	{

		if(isset($_POST['android'])){
			$user_id=$this->input->post('user_id');
		}else{
			$user_id=$_SESSION['logged_in'][0]->user_id;
		}
		//$user_id=2;
		$album_title=$this->input->post('alb_title');
		$album_desc=$this->input->post('alb_desc');
		$data = array();
		// If file upload form submitted
		if(!empty($_FILES['files']['name'])){
		    $filesCount = count($_FILES['files']['name']);
		    for($i = 0; $i < $filesCount; $i++){
		        $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		        $_FILES['file']['name']     = "Album-image-".date("Y-m-d-H-i-s").$i.".".$ext;
		        $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		        $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		        $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		        
		        // File upload configuration
		        $uploadPath = 'assets/uploads/album/';
		        $config['upload_path'] = $uploadPath;
		        $config['allowed_types'] = 'jpg|jpeg|png|gif';
		
		        
		        // Upload file to server
		        // if($this->upload->do_upload('file')){
		        //     // Uploaded file data
		        //     $fileData = $this->upload->data();
		        //     //$this->resizeImage($_FILES['file']['name'] );
		        //     $uploadData[$i]['file_name'] = $fileData['file_name'];
		        //     $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		        // }
		        //$this->resizeImage($_FILES['file']['name'] );
		       // $this->compressImage();
    	      	// $target_path = $_SERVER['DOCUMENT_ROOT'] . '/BrainT/laneCrowd/assets/uploads/album/';
    	      	$uploadData['file_name'] = $_FILES['file']['name'];
		        $uploadDate=date('d-m-Y H:i:s');
    	      	$target_path='assets/uploads/album/'.$_FILES['file']['name'];
    	      	if($status_=$this->compressImage($_FILES['file']['tmp_name'], $target_path, 60)){
    	      		$images[]=$status_;
    	      	}else{
    	      		echo 'Failed';
    	      	}
		        
		        // $images[]=$_FILES['file']['name'];

		    }
		    $pics=implode(",",$images);
		    if(!empty($uploadData)){
		        // Insert files data into the database
				
		        $data = array(
		        	'user_id'=>$user_id,
		        	'images_path'=>$pics,
		        	'added_on'=>$uploadDate,
		        	'album_title'=>$album_title,
		        	'album_desc'=>$album_desc,
		        	'tag_with'=>'1'
		        );
		        $tablename='album_';
		        $result=$this->APIM->addData($tablename,$data);
				if($result)
				{
					die(json_encode(array('status' =>'1' ,'msg'=>'Album uploaded Successfully')));
				}
				else
				{
					die(json_encode(array('status' =>'0' ,'msg'=>'Error while uploading')));
				}

		    }
		}
	}
	public function deletealbum(){
		$album_id=$this->input->post('album_id');
			$this->db->where('album_id',$album_id);
			if($this->db->delete('album_')){
    			die(json_encode(array("code"=>1,"msg"=>"Album Deleted Successfully.")));
    		}else{
    			die(json_encode(array("code"=>0,"msg"=>"Failed To Delete Album.")));
    		}
	}
	public function insertvideo()
	{
		// $user_id=$this->input->post('user_id');
		$user_id=2;
		$data = array();
		// If file upload form submitted
		if(!empty($_FILES['videos_name']['name'])){
		    $filesCount = count($_FILES['videos_name']['name']);
	        $ext = pathinfo($_FILES['videos_name']['name'], PATHINFO_EXTENSION);
	        $_FILES['file']['name']     = "videos-".date("Y-m-d-H-i-s").".".$ext;
	        $_FILES['file']['type']     = $_FILES['videos_name']['type'];
	        $_FILES['file']['tmp_name'] = $_FILES['videos_name']['tmp_name'];
	        $_FILES['file']['error']     = $_FILES['videos_name']['error'];
	        $_FILES['file']['size']     = $_FILES['videos_name']['size'];
	                // File upload configuration
            $uploadPath = 'assets/uploads/videos/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'mp4|wmv|avi';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
                $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
            }  
            $videos=$_FILES['file']['name'];		    
		    // $videos=implode(",",$images);
		    if(!empty($uploadData)){
		        // Insert files data into the database
				$uploadDate=date("Y-m-d H:i:s");
		        $data = array(
		        	'user_id'=>$user_id,
		        	'video_path'=>$videos,
		        	'uploaded_on'=>$uploadDate,
		        );
		        $tablename='videos_';
		        $result=$this->APIM->addData($tablename,$data);
				if($result)
				{
					die(json_encode(array('status' =>'1' ,'msg'=>'Video uploaded Successfully')));
				}
				else
				{
					die(json_encode(array('status' =>'0' ,'msg'=>'Error while uploading')));
				}

		    }
		}
	}
		public function changecoverpic()
		{
		 	if(!empty($_FILES['files']['name']))
		 	{    
		 		$user_id=$_SESSION['logged_in'][0]->user_id;
		        $ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
		        $_FILES['file']['name']     = "cover-image-".date("Y-m-d-H-i-s").".".$ext;
		        $_FILES['file']['type']     = $_FILES['files']['type'];
		        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
		        $_FILES['file']['error']     = $_FILES['files']['error'];
		        $_FILES['file']['size']     = $_FILES['files']['size'];
	          	$uploadPath = 'assets/img/Cover_Photo/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
                }
                $images=$_FILES['file']['name'];     	
		        $toUpdate = array(	
		        	'cover_photo'=>$images
		        );
		        $condition= array(	
		        	'user_id'=>$user_id	
		        );
    			$result=$this->APIM->updatecoverpic($toUpdate,$condition);
				if($result)
				{
					die(json_encode(array('status' =>'1' ,'msg'=>'Cover pic uploaded Successfully')));
				}
				else
				{
					die(json_encode(array('status' =>'0' ,'msg'=>'Error while uploading')));
				}
			}
		}
		public function changeprofilepic()
		{
		 	if(!empty($_FILES['files']['name']))
		 	{    
		 		$user_id=$_SESSION['logged_in'][0]->user_id;
		        $ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
		        $_FILES['file']['name']     = "profile-image-".date("Y-m-d-H-i-s").".".$ext;
		        $_FILES['file']['type']     = $_FILES['files']['type'];
		        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
		        $_FILES['file']['error']     = $_FILES['files']['error'];
		        $_FILES['file']['size']     = $_FILES['files']['size'];
	          	$uploadPath = 'assets/img/Profile_Pic/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
                }
                $images=$_FILES['file']['name'];     	
		        $toUpdate = array(	
		        	'profile_picture'=>$images
		        );
		        $condition= array(	
		        	'user_id'=>$user_id	
		        );
    			$result=$this->APIM->updatecoverpic($toUpdate,$condition);
				if($result)
				{
					die(json_encode(array('status' =>'1' ,'msg'=>'profile pic uploaded Successfully')));
				}
				else
				{
					die(json_encode(array('status' =>'0' ,'msg'=>'Error while uploading')));
				}
			}
		}
		public function scrollfetchpost(){

		$offset=$this->input->post('offset');
		$limit=$this->input->post('limit');
		$user_id=$_SESSION['logged_in'][0]->user_id;
		$my_friends=$this->FRND->getMyFriends($user_id);	
		// if(!isset($_POST['android']))
		// {
		// 	$condition=array("posted_by"=>$user_id);
		// }
		// else
		// {
		// 	$condition=array("posted_by"=>$user_id);
		// }
		if($data=$this->POST->getAllPost($my_friends,$user_id,$offset,$limit))
		{
			foreach ($data as $key => $value) {
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
				$p_Data['total_comments']=$this->getModifyComment($value->post_id);
				// print_r($p_Data['total_comments']);
				$p_Data['total_share']=$this->getShareCount($value->post_id);
				$posts[]=$p_Data;
			}	
			die(json_encode(array("code"=>1,"data"=>$posts)));
		}
		else
		{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
		
		
	}
	
	
}
