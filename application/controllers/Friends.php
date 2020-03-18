<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends MY_Controller {


	public function __construct(){	
		parent::__construct();
		$this->load->model('FriendsModel','FRND');
		$this->load->model('APIModel','APIM');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('PostModel','POST');
		$this->load->model('TestModel','Test');
		
	}
	public function getComment($post_id){
		$this->db->where($condition=array("post_id"=>$post_id));
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->get('post_comments_')->result();
	}
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
	}
	public function getAllMyPost(){
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
		$condition=array("posted_by"=>$my_Id_);
		
		return $my_friends=$this->FRND->getMyFriends($my_Id_);	
	}
	public function getPostLikes($post_id){
		return $this->APIM->getPostLikeDetails($post_id);

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
	public function index($uId=""){
		$user_id=$_SESSION['logged_in'][0]->user_id;
		if($uId!=""){
			$id=$uId;
		}else{
			$id=$user_id;
		}
		if($id!=$_SESSION['logged_in'][0]->user_id){
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
		if(count($pstDoat=$this->POST->getAllPost($this->getAllMyPost(),$id))>0){
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
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['Mycoverpic']=$this->Profile->getcoverphoto($id);
		$data['Myprofilepic']=$this->Profile->getprofilephoto($id);
		$data['FriendRequests']=$this->FRND->getFriendRequests($id);
		
		$data['MyPosts']=$this->POST->getMyPosts($id);
	 	$data['Trending']=$this->POST->getTrending();
        $data['WorkDetails']=$this->getMyWorkDetails($id);
        $data['SkillDetails']=$this->getMySkillsDetails($id);
        $data['UniversityDetails']=$this->getMyUniversityDetails($id);
        $data['SchoolDetails']=$this->getMySchoolDetails($id);
        $data['MyFollowers']=$this->FRND->getFollowers($id);
		$data['MyFollowings']=$this->FRND->getFollowings($id);
		$data['checkFollowings']=$this->FRND->getMyFollowings($user_id);
		$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		$this->load->view('web/template/sideSection');
		$this->load->view('web/profile/friends');
		$this->load->view('web/template/footer');
	}
	public function getFrnd(){
		//echo 'Bla Bla;';
		 $id=$_SESSION['logged_in'][0]->user_id;
		if($id!=$_SESSION['logged_in'][0]->user_id){
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
		
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->Test->getRandomUser($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);

	
		$data['FriendRequests']=$this->Test->getRandomUser($id);
		$data['MyFollowers']=$this->Test->getRandomUser($id);
		$data['MyPosts']=$this->POST->getMyPosts($id);
	
		
		$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		// $this->load->view('web/template/sideSection');
		$this->load->view('web/profile/fron_frnd');
		$this->load->view('web/template/footer');
	}

    public function getMyWorkDetails($id){
        $this->db->where('user_id',$id);
        return $this->db->get('user_work_details')->result();
    }
    public function getMySchoolDetails($id){
        $this->db->where('user_id',$id);
        return $this->db->get('user_school_details')->result();
    }
    public function getMySkillsDetails($id){
        $this->db->where('user_id',$id);
        return $this->db->get('user_skills')->result();
    }

    public function getMyUniversityDetails($id){
        $this->db->where('user_id',$id);
        return $this->db->get('user_university_details')->result();
    }

}