<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller 
{
	public function __construct(){	
		parent::__construct();
		$this->load->model('ProfileModel','Profile');
		$this->load->model('FriendsModel','FRND');
		$this->load->model('APIModel','APIM');
		$this->load->model('PostModel','POST');
	}
	public function index($uId="")	{	
		$user_id=$_SESSION['logged_in'][0]->user_id;
		if($uId!=""){
			$id=$uId;
		}else{
			$id=$user_id;
		}
		if($id!=$user_id){
			$res=$this->FRND->checkForExistingFriendship($uId,$user_id);
			// print_r($res);
			if(count($res)>0){
				$data['cancelFriend']=1;
			}else{
				$data['cancelFriend']=0;
			}
			$data['myId']=0;
		}else{
			$data['myId']=1;
		}


		if(count($pstDoat=$this->POST->getMyTimeLinePost($id))>0){
			foreach ($pstDoat as $key => $value) {
				$p_Data['post_id']=$value->post_id;
				$p_Data['user_id']=$value->user_id;
				$p_Data['post']=$value->post;
				$p_Data['post_head']=$value->post_head;
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
				$p_Data['total_likes']=count($this->getLikeCount($value->post_id));
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
		$data['user_id']=$id;
		$data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		$data['SchoolDetails']=$this->getSchoolDetails($id);
		$data['WorkDetails']=$this->getWorkDetails($id);
		$data['UniversityDetails']=$this->getUniversityDetails($id);
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['FriendRequests']=$this->FRND->getFriendRequests($id);
		$data['MyFollowers']=$this->FRND->getMyFollowers($id);
		// $data['AllPosts']=$this->POST->getMyPosts($id);
		$data['Trending']=$this->POST->getTrending();
		$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		$this->load->view('web/template/sideSection');
		$this->load->view('web/profile/profile');
		$this->load->view('web/template/footer');
	}
	
	public function getUniversityDetails($id){
		$this->db->where('user_id',$id);
		return $this->db->get('user_university_details')->result();
	}
	public function getSchoolDetails($id){
		$this->db->where('user_id',$id);
		return $this->db->get('user_school_details')->result();
	}
	public function getWorkDetails($id){
		$this->db->where('user_id',$id);
		return $this->db->get('user_work_details')->result();
	}
	public function getAllMyFriend(){
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
		$condition=array("posted_by"=>$my_Id_);
		
		return $my_friends=$this->FRND->getMyFriends($my_Id_);	
	}
	public function getPostLikes($post_id){
		return $this->APIM->getPostLikeDetails($post_id);

	}
	public function getMyPosts($my_id){
		$condition=array("posted_by"=>$my_id);
		if(count($data=$this->APIM->getAllDetails('post_',$condition))>0){

			foreach ($data as $key => $value) {
				$p_Data['post_id']=$value->post_id;
				$p_Data['post']=$value->post;
				$p_Data['post_files']=$value->post_files;
				$p_Data['post_type']=$value->post_type;
				$p_Data['posted_by']=$value->posted_by;
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
				$posts[]=$p_Data;
			}	
			return $posts;
		}else{
			return false;
		}
	}
	public function getLikeCount($post_id){
		$condition=array("post_id"=>$post_id,"like_or_dislike"=>1);
		// print_r($condition);
		return $this->APIM->getAllDetails('like_or_dislike', $condition);
	
	}
	public function getDislikeCount($post_id){
		$condition=array("post_id"=>$post_id,"like_or_dislike"=>2);
		// print_r($condition);
		if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
			return $data;
		}else{
			return false;
		}
	}
	public function getComment($post_id){
		$this->db->where($condition=array("post_id"=>$post_id));
		$this->db->order_by('id','DESC');
		$this->db->limit(3);
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->get('post_comments_')->result();
	}
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
	}
	public function addBio(){
		$this->db->where('user_id',$_SESSION['logged_in'][0]->user_id);
		if($this->db->update('users',array("bio_graphy"=>$this->input->post('bio_graphy')))){
			die(json_encode(array("code"=>1,"msg"=>"User Bio Added Successfully.")));
		}else{
			die(json_encode(array("code"=>0,"msg"=>"Failed To Add Bio.")));
		}
	}

}