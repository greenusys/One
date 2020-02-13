<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('TestModel','Test');
				$this->load->model('FriendsModel','FRND');
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
		$this->load->view('web/template/header');
		$session=$this->session->userdata('logged_in');
		$user_Id=$session[0]->user_id;
		$data['MyFriends']=$this->FRND->getMyFriends($user_Id);
		$data['allGroups']=$this->db->get('user_groups')->result();
		$this->load->view('web/groupPage',$data);
		$this->load->view('web/template/footer');
	}
	public function favourite(){
		$this->load->view('web/template/header');
		$data['allGroups']=$this->db->get('user_groups')->result();
		$this->load->view('web/fav',$data);
		$this->load->view('web/template/footer');
	}
	public function page(){
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
	
}
?>
