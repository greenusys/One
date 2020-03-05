<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('PostModel','POST');
		$this->load->model('ProfileModel','Profile');
		$this->load->model('APIModel','APIM');
		$this->load->model('FriendsModel','FRND');
		$this->load->model('AdvertisementModel','ADS');
		$this->load->model('PostModel','POST');
	}

	public function AddAds(){
		// print_r($_FILES);
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
		if($this->input->post() && !empty($_FILES['adImage']['name'])){
            // $filesCount = count($_FILES['adImage']['name']);
            // for($i = 0; $i < $filesCount; $i++){
                $ext = pathinfo($_FILES['adImage']['name'], PATHINFO_EXTENSION);
                $_FILES['file']['name']     = "Ads-Image-".date("Y-m-d-H-i").".".$ext;
                $_FILES['file']['type']     = $_FILES['adImage']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['adImage']['tmp_name'];
                $_FILES['file']['error']     = $_FILES['adImage']['error'];
                $_FILES['file']['size']     = $_FILES['adImage']['size'];
                
                // File upload configuration
                $uploadPath = 'assets/Ads/';
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
                    $uploadData['file_name'] = $fileData['file_name'];
                    $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
                }
                // $this->resizeImage($_FILES['file']['name'] );
                $images=$_FILES['file']['name'];

            // }
            // $pics=implode(",",$images);
            if(!empty($uploadData)){
                // Insert files data into the database
                // (`ads_id`, ``, ``, ``, ``, ``
                $condition=array(
                	'ad_image'=>$images,
                	'ad_url'=>$this->input->post('ad_url'),
                	'added_by'=>$my_Id_,
                	'adsCate'=>$this->input->post('adsCate')
                	
                );
                $data = array(
                	'ad_image'=>$images,
                	'ad_url'=>$this->input->post('ad_url'),
                	'added_by'=>$my_Id_,
                	'adsCate'=>$this->input->post('adsCate'),
                	'added_on'=>date('Y-m-d H-i-s')
                );
                $result=$this->ADS->insert_new_ad($data,$condition);
                switch ($result) {
                	case 0:die(json_encode(array('status' =>'0' ,'msg'=>'Error')));
                		break;
                	case 1:die(json_encode(array('status' =>'1' ,'msg'=>'Ad Posted Successfully.')));
                		break;
            		case 1:die(json_encode(array('status' =>'2' ,'msg'=>'Ad Already Exists.')));
            		break;
                	
                	default:die(json_encode(array('status' =>'3' ,'msg'=>'Server Error')));
                		# code...
                		break;
                }
				

            }else{
            	die(json_encode(array('status' =>'4' ,'msg'=>'Server Error')));
            }
        }else{die(json_encode(array('status' =>'5' ,'msg'=>'Server Error')));
        }
		
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
}
?>