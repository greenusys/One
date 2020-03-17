<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller 
{

	public function __construct(){	
		parent::__construct();
		$this->load->model('ProfileModel','Profile');
		$this->load->model('FriendsModel','FRND');
		$this->load->model('APIModel','APIM');
		$this->load->model('PostModel','POST');
        $this->load->model('AboutModel','About');
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
                $p_Data['total_likes']=$this->getLikeCount($value->post_id);
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
        $data['user_id']=$id;
        $data['ReqStatus']=$this->FRND->checkFriendRequestStatus($id);
        $data['RandomPeople']=$this->FRND->getRandomUser($id);
        $data['MyFriends']=$this->FRND->getMyFriends($id);
        $data['MyDetails']=$this->Profile->getMyDetails($id);
        $data['Mycoverpic']=$this->Profile->getcoverphoto($id);
        $data['Myprofilepic']=$this->Profile->getprofilephoto($id);
        $data['FriendsActivity']=$this->FRND->getMyFreActivities($id);
        $data['FriendRequests']=$this->FRND->getFriendRequests($id);
        $data['MyFollowers']=$this->FRND->getMyFollowers($id);
        $data['MyPosts']=$this->POST->getMyPosts($id);
        $data['Trending']=$this->POST->getTrending();
        $data['WorkDetails']=$this->getMyWorkDetails($id);
        $data['SkillDetails']=$this->getMySkillsDetails($id);
        $data['UniversityDetails']=$this->getMyUniversityDetails($id);
        $data['SchoolDetails']=$this->getMySchoolDetails($id);

        $data['phoneNumbers']=$this->fetchPhoneNumbers($id);
        $data['address']=$this->fetchAddress($id);
       // $data['address']=$this->fetchInterestedIn($id);
       

        $this->load->view('web/template/header',$data);
        $this->load->view('web/template/profileCover');
        $this->load->view('web/template/sideSection');
        $this->load->view('web/profile/about');
        $this->load->view('web/template/footer');

    }

// public function fetchInterestedIn($id){
//      $this->db->where("user_id",$id);
//         $res = $this->db->get('user_details')->row();
//       if(count($res)>0){
//        $usd = $res->usd_interested_in;
//        return $usd_phone = explode(",", $usd);
//         }else{
//             return $usd_phone=array();
//         }    
// }
    public function fetchAddress($id){
        
        $this->db->where("user_id",$id);
        $res = $this->db->get('user_details')->result_array();
        if(count($res)>0){
        $usd = $res[0]['usd_address'];
        return $usd_phone=array('usd_address'=> explode("///", $usd),'usd_address_privacy'=>$res[0]['usd_address_privacy']);
    
        }else{
            return $usd_phone=array();
        }    
    }


    public function fetchPhoneNumbers($id){
        $this->db->where("user_id",$id);
        $res = $this->db->get('user_details')->result_array();
      if(count($res)>0){
       $usd = $res[0]['usd_phone'];
       return $usd_phone = explode(",", $usd);
        }else{
            return $usd_phone=array();
        }    
    }

    public function addSchool(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "school"=>$this->input->post('school'),
            "from_"=>$this->input->post('from_'),
            "to_"=>$this->input->post('to_'),
            "description"=>$this->input->post('description'),
        );    
        $this->db->where($data);
        if(count($this->db->get('user_school_details')->result())==0){
            if($this->db->insert('user_school_details',$data)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0,"msg"=>"Failed To Add Details.")));
            }
        }else{
            die(json_encode(array("code"=>0,"msg"=>"Details Already Exists.")));
        }  
    }
    public function getAllMyPost(){
        $my_Id_=$_SESSION['logged_in'][0]->user_id;
        $condition=array("posted_by"=>$my_Id_);
        
        return $my_friends=$this->FRND->getMyFriends($my_Id_);  
    }
    public function getPostLikes($post_id){
        return $this->APIM->getPostLikeDetails($post_id);

    }
    public function addWorkDetails(){
        $data=array(
                    "user_id"=>$_SESSION['logged_in'][0]->user_id,
                    "company_name"=>$this->input->post('company'),
                    "position"=>$this->input->post('position'),
                    "country"=>$this->input->post('country'),
                    "state"=>$this->input->post('state'),
                    "city"=>$this->input->post('city'),
                    "description"=>$this->input->post('description'),
                    "workedFrom"=>$this->input->post('workedFrom'),
                    "workedTo"=>$this->input->post('workedTo'),
                );    
        $this->db->where($data);
        if(count($this->db->get('user_work_details')->result())==0){
            if($this->db->insert('user_work_details',$data)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0,"msg"=>"Failed To Add Details.")));
            }
        }else{
            die(json_encode(array("code"=>0,"msg"=>"Details Already Exists.")));
        }
    }
    public function addSkills(){
        $data=array("user_skill"=>$this->input->post('professionSkills'),"user_id "=>$_SESSION['logged_in'][0]->user_id);
        $this->db->where($data);
        if(count($this->db->get('user_skills')->result())==0){
            if($this->db->insert('user_skills',$data)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0,"msg"=>"Failed To Add Details.")));
            }
        }else{
            die(json_encode(array("code"=>0,"msg"=>"Details Already Exists.")));
        }
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
                $p_Data['total_likes']=$this->getLikeCount($value->post_id);
                $p_Data['total_dislikes']=$this->getDislikeCount($value->post_id);
                $p_Data['total_comments']=count($this->getComment($value->post_id));
                $p_Data['total_share']=$this->getShareCount($value->post_id);
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
        if($data=count($this->APIM->getAllDetails('like_or_dislike', $condition))){
            return $data;
        }else{
            return false;
        }
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
        return $this->APIM->getAllDetails('post_comments_', $condition=array("post_id"=>$post_id));
        
    }
    public function getShareCount($post_id){
        $condition=array("initial_post_id"=>$post_id);
        return count($this->APIM->getAllDetails('post_', $condition));
        
    }

    public function addPhone(){
          $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "usd_phone"=>$this->input->post('country_code').'-'.$this->input->post('usd_phone'),
            "usd_phone_privacy"=>$this->input->post('usd_phone_privacy')
        ); 
        if($this->About->addPhoneNo($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }

    public function addAddress(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "usd_address"=>$this->input->post('address').'///'.$this->input->post('town').'///'.$this->input->post('zip').'///'.$this->input->post('ntbr'),
            "usd_address_privacy"=>$this->input->post('usd_address_privacy')
        ); 
        if($this->About->addUserAddress($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }
    public function addWebsites(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "usd_website"=>implode('///', $this->input->post('usd_website')),
            "usd_website_privacy"=>$this->input->post('usd_website_privacy')
        ); 

        if($this->About->addUserWebsite($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }
     public function addSocial(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "us_social_link"=>$this->input->post('social_links'),
            "us_social_type"=>$this->input->post('social_type'),
            "us_social_privacy"=>$this->input->post('usd_social_privacy')
        ); 
        // print_r($data);
        // die();
        if($this->About->addUserSocial($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }

       public function addDateOfBirth(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "date_of_birth"=>$this->input->post('day').'-'.$this->input->post('month').'-'.$this->input->post('year'),
            "date_of_birth_privacy"=>$this->input->post('dob_privacy')
        ); 
        if($this->About->updateUserdob($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }


    public function addGender(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,

            "gender"=>$this->input->post('gender')
        ); 
        if($this->About->updateUserGender($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }

    public function addLanguages(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "usd_languages"=> $this->input->post('languages')
          
        ); 
        
        if($this->About->addUserLanguages($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }
     public function addInterested(){
        $data=array(
            "user_id"=>$_SESSION['logged_in'][0]->user_id,
            "usd_interested_in"=> implode('///', $this->input->post('interested'))
          
        ); 
        print_r($data);
        die();
        
        if($this->About->addUserInterested($data)){
                die(json_encode(array('code' =>'1' ,'msg'=>' Added Successfully')));
            }
            else{
                die(json_encode(array('code' =>'0' ,'msg'=>'Error')));
            }
    }
}