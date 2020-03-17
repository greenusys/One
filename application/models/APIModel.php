<?php
	class APIModel extends CI_Model{

		public function deleteData($table_name, $condition){
			
			if($condition){
				$this->db->where($condition);	
			}
			return $this->db->delete($table_name);
		}

function unfriend($frnd_id,$my_id){
	if($this->db->query("delete from friend_request where (sent_by='$my_id' and sent_to='$frnd_id') OR (sent_by='$frnd_id' and sent_to='$my_id')")){
		return $this->db->query("delete from friends_ where (friend_id='$my_id' and user_id='$frnd_id') OR (friend_id='$frnd_id' and user_id='$my_id')");
	}
	
}
function deleteNotification($frnd_id,$my_id){
	return $this->db->query("delete from notifications_ where (notify_by='$my_id' and notify_to='$frnd_id') OR (notify_to='$frnd_id' and notify_to='$my_id')");
	
}
		public function getAllDetails($table_name, $condition=""){
			if($condition!=""){
				$this->db->where($condition);	
			}
			return $this->db->get($table_name)->result();
		}

		public function fetch_post_by_id($post_id){
				$condition=array('post_id'=>$post_id);
             	$this->db->select("*");
				$this->db->join('users','users.user_id=post_.posted_by');
				$this->db->where($condition);	
				return $this->db->get('post_')->result();
		}

		public function update_post_text($data){
			$condition = array('post_id'=>$data['post_id']);
			$this->db->where($condition);
			if($this->db->update('post_',array('post'=>$data['post']))){
				return true;
			}else{
				return false;
			}
		}

		public function getAllPostDetails( $condition=""){
                $this->db->select("users.user_id,users.full_name,users.profile_picture,post_.*");
                $this->db->order_by('post_id','Desc');
                if($condition!=""){
				$this->db->join('users','users.user_id=post_.posted_by');
				$this->db->where($condition);	
			}
			return $this->db->get('post_')->result();
		}
		public function addData($table_name,$data){
			if($this->db->insert($table_name,$data)){
				$insert_id = $this->db->insert_id();
   				return  $insert_id;
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
			if ($insert=$this->db->insert_id()) 
			{
				$tags=explode(",",$data['tagged_friends']);
				foreach ($tags as $tag) {
					$string="<a href=".base_url()."Post/viewPost/".$insert.">You Were Tagged in a post</a>";
					$notify=array('notification_'=>$string,
								  'notify_by'=>$data['posted_by'],
								  'notify_to'=>$tag,
								  'status_'=>'0');
					$this->db->insert('notifications_',$notify);
				}
			    return $insert;
<<<<<<< HEAD

=======
>>>>>>> 7e710001b872cafcbccf1cad898cabd05d9c689b
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


		public function updateAlbumPost($tablename,$data){
			$this->db->where('post_id',$data['post_id']);
			if($this->db->update($tablename,$data)){
				return true;
			}else{
				return false;
			}
		}
	}
?>