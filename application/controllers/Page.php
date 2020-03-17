<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('PostModel','POST');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('APIModel','APIM');
		$this->load->model('FriendsModel','FRND');
		$this->load->model('AdvertisementModel','ADS');
		$this->load->model('PostModel','POST');
	}
    public function actPage(){
        $my_Id_=$_SESSION['logged_in'][0]->user_id;
        // print_r($_POST);
         // `user_page_like_dislike`(`id`, ``, ``, ``, ``) 
        // user_page_like_dislike
        if($this->input->post('todo')==1){
            //Like
            //insert into table
             $data=array(
                        "page_id"=>$this->input->post('page'),
                        "liked_by"=>$my_Id_,
                        "like_or_dislike"=>1,
                    );
             if(count($this->db->where($data)->get('user_page_like_dislike')->result())==0){
                if($this->db->insert('user_page_like_dislike',$data)){
                    die(json_encode(array("code"=>1)));
                }else{
                    die(json_encode(array("code"=>0,"msg"=>"Failed To Like")));
                }
             }
             // else{
             //    die(json_encode(array("code"=>2,"msg"=>"Already Exists.")));
             // }
        }else{
            //Dislike
            //remove from table
            $data=array(
                        "page_id"=>$this->input->post('page'),
                        "liked_by"=>$my_Id_
                    );
            if($this->db->delete('user_page_like_dislike',$data)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0,"msg"=>"Failed To Dislike")));
            }
        }
       
    }

}
?>