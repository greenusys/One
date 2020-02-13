<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MessageModel','Message');
		$this->load->model('FriendsModel','FRND');
	}
	public function index()
	{
		$myId=$_SESSION['logged_in'][0]->user_id;
		$data['MyMessages']=$this->Message->getAllMyMessages($myId);
		// $data['']
		$image_array = get_clickable_smileys(base_url('assets/smileys'), 'message-to-send');
		$col_array = $this->table->make_columns($image_array, 40);
        $data['smiley_table'] = $this->table->generate($col_array);
        $data['MyFriends']=$this->FRND->getMyFriends($myId);
      $this->load->view('web/template/header');
		$this->load->view('web/message',$data);
		$this->load->view('web/template/footer');
	}
	public function smilyImage(){
		$str = $this->input->post('smiley');
		$str = parse_smileys($str, base_url('assets/smileys'));
		die(json_encode(array("code"=>1,"img"=>$str)));
	}
	public function getMyMessages(){
		$con_id=$this->input->post('conv_id');
		$Conversation=$this->Message->getConversationDetails($con_id);
		die(json_encode(array("code"=>1,"msgs"=>$Conversation)));
	}

	public function sendFile(){
		$config['upload_path'] = './assets/uploads/chats/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            die(json_encode(array("status"=>"0","msg"=>"File exceeds upload limit")));

            //$this->load->view('files/upload_form', $error);
        } else {
        	$file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        	if($file_ext=="gif" || $file_ext=="png" || $file_ext=="jpg" || $file_ext=="jpeg" || $file_ext=="GIF" || $file_ext=="PNG" || $file_ext=="JPG" || $file_ext=="JPEG"){
        		$type="1";
        	}
        	else{
        		$type="2";
        	}
        	$myId=$_SESSION['logged_in'][0]->user_id;
        	$friend_id=$_POST['friend_id'];
			$uploaded=$this->upload->data();
			$url=base_url()."assets/uploads/chats/".$uploaded['file_name'];
			$data=array(
					"sent_by"=>$myId,
					"sent_to"=>$friend_id,
					"message_"=>$url,
					"sent_on"=>date('D M d Y H:i:s O'),
					"message_type"=>$type
					// "sent_on"=>date('d/m/Y H:i:s'),
					);
		if($this->Message->sendMessage($data)){
			die(json_encode(array("code"=>1,"data"=>"Message Sent.")));
			}else{
				die(json_encode(array("code"=>0,"data"=>"Failed To Send Message.")));
			}
            //$this->load->view('files/upload_result', $data);
        }
	}

	public function sendMyMessages(){
		// print_r($_POST);
		$myId=$_SESSION['logged_in'][0]->user_id;
		$message=$this->input->post('message');
		$friend=$this->input->post('friend');
		// 16/04/2017 21:09:57
		$data=array(
					"sent_by"=>$myId,
					"sent_to"=>$friend,
					"message_"=>$message,
					// "sent_on"=>date('D M d Y H:i:s O')
					// "sent_on"=>date('d/m/Y H:i:s'),
					);
		print_r($data);
		if($this->Message->sendMessage($data)){
			die(json_encode(array("code"=>1,"data"=>"Message Sent.")));
		}else{
			die(json_encode(array("code"=>0,"data"=>"Failed To Send Message.")));
		}
		
	}
	public function getMyConversation(){
		$myId=$_SESSION['logged_in'][0]->user_id;
		$friend=$this->input->post('friend');
		if($msgs=$this->Message->getMyConver($myId,$friend)){
			die(json_encode(array("code"=>1,"msgs"=>$msgs)));
		}else{
			die(json_encode(array("code"=>0,"msgs"=>"Failed To Send Message.")));
		}
	}
	public function getMyFriendList(){
		$myId=$_SESSION['logged_in'][0]->user_id;
		$key=$this->input->post('key');

		if(count($data=$this->FRND->getMyFriendsByName($myId, $key))>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	
}
