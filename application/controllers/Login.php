<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('web/login');
	}

	function checkEmail($email) {
	   $find1 = strpos($email, '@');
	   $find2 = strpos($email, '.');
	   return ($find1 !== false && $find2 !== false && $find2 > $find1);
	}
	function setCookie($arr){
		if(setcookie('log_data', serialize($arr), time() + (86400 * 1), "/")){
			return true;
		}else{
			return false;
		}
	}
	function signin(){
		$email_phone=$_POST['email'];
		$password=$_POST['password'];
		if ($this->checkEmail($email_phone)) {//check via email
			$data = array('email'=>$email_phone);
	   		$result=$this->Login_model->check_user($data);
	   		if($result){
	   			$user_data=$this->Login_model->read_user_information($type="email",$email_phone="$email_phone");
	   			$db_password=$user_data[0]->password;
				$parts = explode('$', $db_password);
				$test_hash = crypt($password, sprintf('$%s$%s$%s$', $parts[1], $parts[2], $parts[3]));
				if($db_password === $test_hash){
					// Add user data in session
					$this->session->set_userdata('logged_in', $user_data);
					$emptyAr=array();
					if(isset($_COOKIE['log_data'])){
						$co_Data=unserialize($_COOKIE['log_data']);
						$emptyAr=array_merge($co_Data,$user_data);
						$temp=1;
						$cookie_data=unserialize($_COOKIE['log_data']);
						foreach($cookie_data as $data_){
							if($data_->email==$email_phone){
							$temp=0;
							}
						}
						if($temp==0){
							if($this->updateMyStatus($user_data[0]->user_id)){
								die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
							}
						}else{
							if($this->setCookie($emptyAr)){
								if($this->updateMyStatus($user_data[0]->user_id)){
									die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
								}
							}
						}
					}else{
						$emptyAr=$user_data;
						if($this->setCookie($emptyAr)){
							if($this->updateMyStatus($user_data[0]->user_id)){
								die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
							}
						}
					}
					// die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
				}
				else{
				    die(json_encode(array('status' => '0' , 'msg'=>'The Password You Entered Is Not Correct')));
				}
	   		}
	   		else{
	   			die(json_encode(array('status' => '0' , 'msg'=>'User With this email does not exist' )));
	   		}
		}
		else{// check via phone
			$data = array('phone'=>$email_phone);
	   		$result=$this->Login_model->check_user_phone($data);
	   		if($result){
	   			$user_data=$this->Login_model->read_user_information($type="phone",$email_phone="$email_phone");
	   			$db_password=$user_data[0]->password;
				$parts = explode('$', $db_password);
				$test_hash = crypt($password, sprintf('$%s$%s$%s$', $parts[1], $parts[2], $parts[3]));
				if($db_password === $test_hash){
					// Add user data in session
					$this->session->set_userdata('logged_in', $user_data);
					$emptyAr=array();
					if(isset($_COOKIE['log_data'])){
						$co_Data=unserialize($_COOKIE['log_data']);
						$emptyAr=array_merge($co_Data,$user_data);
						$temp=1;
						$cookie_data=unserialize($_COOKIE['log_data']);
						foreach($cookie_data as $data_){
							if($data_->email==$email_phone){
							$temp=0;
							}
						}
						if($temp==0){
							if($this->updateMyStatus($user_data[0]->user_id)){
								die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
							}
						}else{
							if($this->setCookie($emptyAr)){
								if($this->updateMyStatus($user_data[0]->user_id)){
									die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
								}
							}
						}
					}else{
						$emptyAr=$user_data;
						if($this->setCookie($emptyAr)){
							if($this->updateMyStatus($user_data[0]->user_id)){
								die(json_encode(array('status'=>'1','msg'=>'log in Successfull')));
							}
						}
					}
				}
				else{
				    die(json_encode(array('status' => '0' , 'msg'=>'The Password You Entered Is Not Correct')));
				}
	   		}
	   		else{
	   			die(json_encode(array('status' => '0' , 'msg'=>'User With this phone number does not exist' )));
	   		}
		}
	}
	public function updateMyStatus($id){
		$this->db->where('user_id',$id);
		if($this->db->update("users",array("login_Status"=>1))){
			return true;
		}else{
			return false;
		}
	}
	public function logout() {
		// Removing session data
		$sess_array = array();
		$this->db->where('user_id',$_SESSION['logged_in'][0]->user_id);
		if($this->db->update('users',array('login_Status'=>0))){
			$this->session->unset_userdata('logged_in', $sess_array);
			$this->session->set_flashdata('message_display','Successfully Logout');
			redirect(base_url());
		}	
	}

	function hashing($value){
		$salt = substr(str_replace('+','.',base64_encode(md5(mt_rand(), true))),0,16);
		// how many times the string will be hashed
		$rounds = 10000;
		// pass in the password, the number of rounds, and the salt
		// $5$ specifies SHA256-CRYPT, use $6$ if you really want SHA512
		return crypt($value, sprintf('$5$rounds=%d$%s$', $rounds, $salt));
	}

	public function signup_otp(){
		$name=$_POST['name'];
		$email_phone=$_POST['email_phone'];
		$password=$_POST['password'];
		//$otp=mt_rand(000000,999999);
		$otp=1234;//to be randomized later
	   	$otp_hashed=$this->hashing($otp);
	   	$hashed_password=$this->hashing($password);
		if ($this->checkEmail($email_phone)) 
		{
	   		$email=$email_phone;
	   		$data = array('email'=>$email);
	   		$result=$this->Login_model->check_user($data);
	   		if($result){
	   			die(json_encode(array('status' =>'0','msg'=>'User Already Exists' )));
	   		}
	   		else{
				die(json_encode(array('status' =>'1','name'=>$name,'email_phone'=>$email,'password'=>$hashed_password,'otp'=>$otp_hashed,'gender'=>$gender,'date_of_birth'=>$dob)));
			}
		}
		else{
			$phone=$email_phone;
	   		$data = array('phone'=>$phone);
	   		$result=$this->Login_model->check_user_phone($data);
	   		if($result){
	   			die(json_encode(array('status' =>'0','msg'=>'User Already Exists' )));
	   		}
	   		else{
				die(json_encode(array('status' =>'1','name'=>$name,'email_phone'=>$phone,'password'=>$hashed_password,'otp'=>$otp_hashed,'gender'=>$gender,'date_of_birth'=>$dob)));
			}
		}
	}

	public function signup(){
		$verify_otp=$_POST['verify_otp'];
		$given_hash=$_POST['otp'];
		$dod=$_POST['dob-day'];
		$dom=$_POST['dob-month'];
		$doy=$_POST['dob-year'];
		$newdob='$dod'-'$dom'-'$doy';
		$gender=$_POST['gender'];
		$parts = explode('$', $given_hash);
		$test_hash = crypt($verify_otp, sprintf('$%s$%s$%s$', $parts[1], $parts[2], $parts[3]));
			if($given_hash === $test_hash)
		{
	    	if ($this->checkEmail($_POST['email_phone'])) 
		    {
    			$data=array('email' =>$_POST['email_phone'], 
    						'password' =>$_POST['password'],
    						'full_name'=>$_POST['name'],'gender'=>$gender,'date_of_birth'=>$newdob);
    			$result=$this->Login_model->insert_user($data);
    			if($result)
    			{
    				die(json_encode(array('status' =>'1' ,'msg'=>'User Registered Successfully' )));
    			}
    			else
    			{
    				die(json_encode(array('status' =>'0' ,'msg'=>'Error' )));
    			}
		    }
		    else
		    {
		        $data=array('phone' =>$_POST['email_phone'], 
    						'password' =>$_POST['password'],
    						'full_name'=>$_POST['name'],'gender'=>$gender,'date_of_birth'=>$newdob);
    			$result=$this->Login_model->insert_user($data);
    			if($result)
    			{
    				die(json_encode(array('status' =>'1' ,'msg'=>'User Registered Successfully' )));
    			}
    			else
    			{
    				die(json_encode(array('status' =>'0' ,'msg'=>'Error' )));
    			}
		    }
		}
		else{
			die(json_encode(array('status' =>'0' ,'msg'=>'Error' )));
		}
	}

	public function resizeImage($filename)
	   {
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
	          echo $this->image_lib->display_errors();
	      }
	   
	      $this->image_lib->clear();
   }

	public function post(){
		$user_id=$_POST['user_id'];
		$post_type=$_POST['post_type'];
		$post_text=$_POST['post'];
		if($post_type==0){// post text
			$data=array('post_type' =>'1' ,'posted_by'=>$user_id,'post'=>$post_text);
			$result=$this->Login_model->insert_post($data);
			if($result){
				die(json_encode(array('status' =>'1' ,'msg'=>'Post Inserted Successfully')));
			}
			else{
				die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
			}
		}
		elseif ($post_type==1) {//post image
				$data = array();
		        // If file upload form submitted
		        if($this->input->post() && !empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "post-image-".date("Y-m-d-H-i-s").$i.".".$ext;
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
		                	'post_type'=>'1',
		                	'posted_by'=>$user_id,
		                );
		                $result=$this->Login_model->insert_post($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}

		            }
		        }
			}
			else{//post video
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
		                	'post_type'=>'2',
		                	'posted_by'=>$user_id,
		                );
		                $result=$this->Login_model->insert_post($data);
						if($result){
							die(json_encode(array('status' =>'1' ,'msg'=>'Post Inserted Successfully')));
						}
						else{
							die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
						}
				}
			}
	}
}
