<?php
    class ProfileModel extends CI_Model{
        public function getMyDetails($id){
            // print_r($condition);
            $this->db->where('user_id',$id);
            return $this->db->get('users')->result();
        }
        public function getcoverphoto($id){
            $this->db->select("*");
            $this->db->join('user_profile_cover','users.user_id=user_profile_cover.user_id');
            $this->db->where('users.user_id',$id);
            $this->db->where('user_profile_cover.status',2);
            $this->db->limit(1);
            return $this->db->get('users')->result();
        }
        public function getprofilephoto($id){
            $this->db->select("*");
            $this->db->join('user_profile_cover','users.user_id=user_profile_cover.user_id');
            $this->db->where('users.user_id',$id);
            $this->db->where('user_profile_cover.status',1);
            $this->db->order_by('user_profile_cover.post_id','DESC');
            $this->db->limit(1);  
            return $this->db->get('users')->result();
        }
        public function getMyAlbum($id){
            $this->db->where('user_id',$id);
            return $this->db->get('album_')->result();
        }

        public function GetRecentActivity()
        {          
            $this->db->select('*');
            $this->db->from('recent_activity');
            $this->db->where('done_on >DATE_SUB(CURDATE(),INTERVAL 1 DAY)');
            return $this->db->get()->result();  
        }
        
    }
