<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {


	public function __construct(){	
		parent::__construct();
		$this->load->model('FriendsModel','FRND');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('PostModel','POST');
		$this->load->model('APIModel','APIM');
		// $this->load->model('PostModel','POST');
	}

	public function index($uId="")
	{	
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
		}
		else{
			$data['AllPosts']=array();
		}
		// $data['user_id']=$id;
		$data['user_id']=$id;
		$data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['Mycoverpic']=$this->Profile->getcoverphoto($id);
		$data['Myprofilepic']=$this->Profile->getprofilephoto($id);
		$data['FriendRequests']=$this->FRND->getFriendRequests($id);
		$data['MyFollowers']=$this->FRND->getFollowers($id);
		$data['MyFollowings']=$this->FRND->getFollowings($id);
		$data['checkFollowings']=$this->FRND->getMyFollowings($id,$user_id);
		$data['MyPosts']=$this->POST->getMyPosts($id);
		$data['MyAlbum']=$this->Profile->getMyAlbum($id);
        $data['Trending']=$this->POST->getTrending();
        $data['WorkDetails']=$this->getMyWorkDetails($id);
        $data['SkillDetails']=$this->getMySkillsDetails($id);
        $data['UniversityDetails']=$this->getMyUniversityDetails($id);
        $data['SchoolDetails']=$this->getMySchoolDetails($id);
        $data['ProfileImgs']=$this->profileImageAlbum('profile',$id);
        $data['CoverImgs']=$this->profileImageAlbum('cover',$id);
        $data['relationshp']=$this->fetchRelationshipStatus($id);

		$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		$this->load->view('web/template/sideSection');
		$this->load->view('web/profile/gallery');
		$this->load->view('web/template/footer');
	}


	    public function fetchRelationshipStatus($id){
        $this->db->where("user_id",$id);
        $res = $this->db->get('user_details')->result_array();
        if(count($res)>0){
        return $usd_phone=array('rel_status'=>$res[0]['relationship_status']);
    
        }else{
            return $usd_phone=array();
        }    
    }
    
	public function showAlbum(){
		$user_id=$_SESSION['logged_in'][0]->user_id;
		// if($uId!=""){
		// 	$id=$uId;
		// }else{
			$id=$user_id;
		// }
		$data['MyAlbum']=$this->Profile->getMyAlbum($id);
		// print_r($data['MyAlbum']);
		$this->load->view('web/profile/lightBox',$data);
	}
	public function getAlbum(){
		$this->db->where('album_id',$this->input->post('album_id'));
		$img=$this->db->get('album_')->result();
		$imgArr=explode(',',$img[0]->images_path);;
	
		die(json_encode(array("album"=>$imgArr)));
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
	public function getComment($post_id){
		$this->db->where($condition=array("post_id"=>$post_id));
		$this->db->join('users','users.user_id=post_comments_.commented_by_');
		return $this->db->get('post_comments_')->result();
	}
	public function getShareCount($post_id){
		$condition=array("initial_post_id"=>$post_id);
		return count($this->APIM->getAllDetails('post_', $condition));
		
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
    public function addUniversity(){
        // print_r($_POST);
        if($this->input->post('graduated')=='on'){
            $graduated=1;
        }else{
            $graduated=0;
        }
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "university"=>$this->input->post('university'),
            "from_"=>$this->input->post('from_'),
            "to_"=>$this->input->post('to_'),
            "graduated"=>$graduated,
            "course"=>$this->input->post('course'),
            "description"=>$this->input->post('description'),
            
            "degree"=>$this->input->post('degree')
        );    
        $this->db->where($data);
        if(count($this->db->get('user_university_details')->result())==0){
            if($this->db->insert('user_university_details',$data)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0,"msg"=>"Failed To Add Details.")));
            }
        }else{
            die(json_encode(array("code"=>0,"msg"=>"Details Already Exists.")));
        } 
    }
    public function getMyUniversityDetails($id){
        $this->db->where('user_id',$id);
        return $this->db->get('user_university_details')->result();
    }

    public function fetchAlbum($albumid,$uId=null){

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
		}
		else{
			$data['AllPosts']=array();
		}
		// $data['user_id']=$id;
		$data['user_id']=$id;
		$data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['FriendRequests']=$this->FRND->getFriendRequests($id);
		$data['MyFollowers']=$this->FRND->getMyFollowers($id);
		$data['MyPosts']=$this->POST->getMyPosts($id);
		//$data['MyAlbum']=$this->Profile->getMyAlbum($id);
        $data['Trending']=$this->POST->getTrending();
        $data['WorkDetails']=$this->getMyWorkDetails($id);
        $data['SkillDetails']=$this->getMySkillsDetails($id);
        $data['UniversityDetails']=$this->getMyUniversityDetails($id);
        $data['SchoolDetails']=$this->getMySchoolDetails($id);

    	$res['MyAlbum']= $this->imageAlbum($albumid);
    	$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		$this->load->view('web/template/sideSection');
		$this->load->view('web/profile/album_view',$res);
		$this->load->view('web/template/footer');

    }

    public function imageAlbum($id){
	  	// $this->db->where('album_id',$id);
   	// 	 return $this->db->get('album_')->result();
    	return $this->db->query("select * from album_ join post_ on album_.post_id=post_.post_id where album_.album_id='$id'")->result();
    }

      public function ProfileAlbum($type,$userId,$uId=null){

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
		}
		else{
			$data['AllPosts']=array();
		}
		// $data['user_id']=$id;
		$data['user_id']=$id;
		$data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
		$data['RandomPeople']=$this->FRND->getRandomUser($id);
		$data['MyFriends']=$this->FRND->getMyFriends($id);
		$data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
		$data['MyDetails']=$this->Profile->getMyDetails($id);
		$data['FriendRequests']=$this->FRND->getFriendRequests($id);
		$data['MyFollowers']=$this->FRND->getMyFollowers($id);
		$data['MyPosts']=$this->POST->getMyPosts($id);
	//	$data['MyAlbum']=$this->Profile->getMyAlbum($id);
        $data['Trending']=$this->POST->getTrending();
        $data['WorkDetails']=$this->getMyWorkDetails($id);
        $data['SkillDetails']=$this->getMySkillsDetails($id);
        $data['UniversityDetails']=$this->getMyUniversityDetails($id);
        $data['SchoolDetails']=$this->getMySchoolDetails($id);

    	$data['ProfileImages']= $this->profileImageAlbum($type,$userId);

    	$this->load->view('web/template/header',$data);
		$this->load->view('web/template/profileCover');
		$this->load->view('web/template/sideSection');
		$this->load->view('web/profile/profile_images');
		$this->load->view('web/template/footer');

    }

    public function profileImageAlbum($type,$u_id){	
    	if ($type=='cover') {
    		$res= $this->db->query("SELECT user_profile_cover.*,post_.* from user_profile_cover JOIN post_ on post_.post_id=user_profile_cover.post_id where user_profile_cover.user_id='$u_id' and user_profile_cover.status=2 ")->result();
    		
    		for($i=0;$i<count($res);$i++){
    			echo $post_id = $res[$i]->post_id;
    			$coments = $this->db->query("select * from post_comments_ where post_id='$post_id'")->result();
    			$res[$i]->total_comments=count($coments);	
    		}
    		return $res;
    	}else{
    		$res= $this->db->query("SELECT user_profile_cover.*,post_.* from user_profile_cover JOIN post_ on post_.post_id=user_profile_cover.post_id where user_profile_cover.user_id='$u_id'and user_profile_cover.status=1 ")->result();

    		for($i=0;$i<count($res);$i++){
    			$post_id = $res[$i]->post_id;
    			$coments = $this->db->query("select * from post_comments_ where post_id='$post_id'")->result();
    			$res[$i]->total_comments=count($coments);	
    		}
    		return $res;

    	}
    	
	  		
    }
}