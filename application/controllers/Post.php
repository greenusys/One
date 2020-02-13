<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('PostModel','POST');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('APIModel','APIM');
		$this->load->model('FriendsModel','FRND');
		// $this->load->model('APIModel','APIM');
		$this->load->model('PostModel','POST');
	}

	public function index()
	{
		$this->load->view('web/template/header');
		$this->load->view('web/home');
		$this->load->view('web/template/footer');
	}
	// public function __construct(){	
	// 	parent::__construct();
	// 	$this->load->model('HomeModel','Home');
	// 	$this->load->model('ProfileModel','Profile');
	// 	$this->load->model('FriendsModel','FRND');
	// 	$this->load->model('APIModel','APIM');
	// 	$this->load->model('PostModel','POST');
	// }
	public function getAllMyPost(){
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
		$condition=array("posted_by"=>$my_Id_);
		
		return $my_friends=$this->FRND->getMyFriends($my_Id_);	
	}
	public function getPostLikes($post_id){
		return $this->APIM->getPostLikeDetails($post_id);

	}
	public function viewPost($post_id){
		$value=$this->POST->getPostDetail($post_id);
		//print_r($value);
		$p_Data['post_id']=$value[0]->post_id;
		$p_Data['user_id']=$value[0]->user_id;
		$p_Data['post']=$value[0]->post;
		$p_Data['post_files']=$value[0]->post_files;
		$p_Data['post_type']=$value[0]->post_type;
		$p_Data['posted_by']=$value[0]->full_name;
		$p_Data['profile_pic']=$value[0]->profile_picture;
		$p_Data['initially_posted_by']=$value[0]->initially_posted_by;
		$p_Data['posted_on']=$value[0]->posted_on;
		if(($likes_data= $this->getPostLikes($value[0]->post_id))!=false){
				$p_Data['likes_data']=$likes_data;
		}else{
				$p_Data['likes_data']=array();
		}
		// // $p_Data['']=;
		$p_Data['total_likes']=$this->getLikeCount($value[0]->post_id);
		$p_Data['total_dislikes']=$this->getDislikeCount($value[0]->post_id);
		$p_Data['total_comments']=$this->getComment($value[0]->post_id);
		$p_Data['total_share']=$this->getShareCount($value[0]->post_id);
		$post[]=$p_Data;
		$data['Detail']=$post;
		$this->load->view('web/template/header');
		$this->load->view('web/post',$data);
		$this->load->view('web/template/footer');
	}
	public function getComment($post_id){
		$this->db->where($condition=array("post_id"=>$post_id));
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->get('post_comments_')->result();
	}
	// Like Count
	public function getLikeCount($post_id){
		$condition=array("post_id"=>$post_id,"like_or_dislike"=>1);
		// print_r($condition);
		$this->db->where($condition);
		$this->db->join('users','users.user_id=like_or_dislike.user_id');
		return $this->db->get('like_or_dislike')->result();
			
		
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
	//get total Share
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
	}
	public function trenDingPosts(){
		
		// $this->db->join('users','users.user_id=post_.posted_by');
		if(count($pstDoat=$this->POST->getTrending())>0){
			// print_r($pstDoat);
			// die; 
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
			$data['Trending']=$post;
		}
		else{
			$data['Trending']=array();
		}
		// $data['user_id']=$id;
		// $data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		// $data['RandomPeople']=$this->FRND->getRandomUser($id);
		// $data['FriendsStatus']=$this->FRND->getMyFreStatus($id);
		// $data['myStatus']=$this->FRND->getMyStatus($id);
		// $data['MyPosts']=$this->POST->getMyPosts($id);
		// $data['MyFriends']=$this->FRND->getMyFriends($id);
		// $data['Trending']=$this->POST->getTrending();
		$data['MyDetails']=$this->Profile->getMyDetails($_SESSION['logged_in'][0]->user_id);
		// $data['notify']=$this->Home->fetchnofication($id);
		$this->load->view('web/template/header');
		// $data['Trending']=$this->POST->getTrending();
		// $data['Trending']=$this->db->get('post_')->result();
		$this->load->view('web/trendingPost',$data);
		$this->load->view('web/template/footer');
	}





	// public function getComment($post_id){
	// 	$this->db->where($condition=array("post_id"=>$post_id));
	// 	$this->db->join('users','users.user_id=post_comments_.commented_by_');
	// 	return $this->db->get('post_comments_')->result();
	// }
	// Like Count
	// public function getLikeCount($post_id){
	// 	$condition=array("post_id"=>$post_id,"like_or_dislike"=>1);
	// 	// print_r($condition);
	// 	if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
	// 		return $data;
	// 	}else{ 
	// 		return 0;
	// 	}
	// }
	// Dislike Count
	// public function getDislikeCount($post_id){
	// 	$condition=array("post_id"=>$post_id,"like_or_dislike"=>2);
	// 	// print_r($condition);
	// 	if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
	// 		return $data;
	// 	}else{
	// 		return 0;
	// 	}
	// }
	public function getStatusFor(){
		$condition=array("posted_by"=>$this->input->post('profile_'));
		// print_r($condition);
		if(count($data=$this->APIM->getAllDetails('stories_', $condition))>0){
			die(json_encode(array('code'=>1,'data'=>$data)));
		}else{
			die(json_encode(array('code'=>0,'data'=>'No Data Found')));
		}
	}
	//get total Share
	// public function getShareCount($post_id){
	// 	$condition=array("initial_post_id"=>$post_id);
	// 	return count($this->APIM->getAllDetails('post_', $condition));
		
	// }
	
}
?>