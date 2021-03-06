<?php
	class APIModel extends CI_Model{

		public function deleteData($table_name, $condition){
			
			if($condition){
				$this->db->where($condition);	
			}
			return $this->db->delete($table_name);
		}


		public function getAllDetails($table_name, $condition=""){
			if($condition!=""){
				$this->db->where($condition);	
			}
			return $this->db->get($table_name)->result();
		}


		// public function getAllPostDetails( $condition="",$offset){
			public function getAllPostDetails( $condition=""){
			$this->db->order_by('post_id','Desc');
			if($condition!=""){
				$this->db->join('users','users.user_id=post_.posted_by');
				$this->db->where($condition);	
			}
			// $this->db->limit(1, $offset);
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
		public function insert_post($data){
			$this->db->insert('post_', $data);
			if ($this->db->affected_rows() > 0) 
			{
			    return true;
			}else {
			    return false;
			}
		}
		public function insert_post_two($data){
			$this->db->insert('timeline_post_', $data);
			if ($this->db->affected_rows() > 0) 
			{
			    return true;
			}else {
			    return false;
			}
		}
		public function updateRequestStatus($toUpdate,$condition ){
			$this->db->where($condition);
			if($this->db->update('friend_request',$toUpdate)){
				return true;
			}else{
				return false;
			}
		}
		public function makeItMyFriend($toInsert){
			if($this->db->insert('friends_',$toInsert)){
				return true;
			}else{
				return false;
			}
		}
		public function deleteRequest($condition){
			$this->db->where($condition);
			if($this->db->delete('friend_request')){
				return true;
			}else{
				return false;
			}
		}
		public function getPostLikeDetails($post_id){
			$this->db->where('like_or_dislike.post_id',$post_id);
			$this->db->join('users','users.user_id=like_or_dislike.user_id');
			if(count($res = $this->db->get('like_or_dislike')->result()) >0 ){
				return $res;

			}else{
				return false;
			}

		}
		public function updatecoverpic($toUpdate,$condition )
		{
			$this->db->where($condition);
			if($this->db->update('users',$toUpdate)){
				return true;
			}else{
				return false;
			}
		}
		// public function scrollfetchpost($table_name,$condition,$limit=null,$offset=null)
		// {
			
		//  	$this->db->order_by('post_id','Desc');
  //           if($condition!=""){
  //               $this->db->join('users','users.user_id=post_.posted_by');
  //               $this->db->where($condition);   
  //               if($limit!='' && $offset!='')
		// 	    {
		// 	       $this->db->limit($limit, $offset);
		// 	    }
  //           }
		//     $query  = $this->db->get($table_name)->result();
		//     $post = array();
		//     foreach ($query as $row)
		//         array_push($post, $row);
		//    return $post;
		//     //print_r($post);
		// 	}
	}
?>