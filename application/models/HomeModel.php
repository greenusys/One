<?php
    class HomeModel extends CI_Model
    {
        public function getAllDetails($table_name, $condition=""){
            if($condition!=""){
                $this->db->where($condition);   
            }
            return $this->db->get($table_name)->result();
        }
        public function getAllPostDetails( $condition=""){
            $this->db->order_by('post_id','Desc');
            if($condition!=""){
                $this->db->join('users','users.user_id=post_.posted_by');
                $this->db->where($condition);   
            }
            return $this->db->get('post_')->result();
        }
        public function addData($table_name,$data){
            if($this->db->insert($table_name,$data)){
                return true;
            }else{
                return false;
            }
        }
        public function updateData($table_name,$data,$condition){
            $this->db->where($condition);
            if($this->db->update($table_name,$data)){
                return true;
            }else{
                return false;
            }
        }
        public function fetchnofication($userId){
            $result=$this->db->query("select * from notifications_ join users on users.user_id=notifications_.notify_by where notifications_.notify_to='$userId'")->result(); 
            return $result;
        }
    }
?>