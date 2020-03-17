<?php
	class PostModel extends CI_Model {
		public function getMyPosts($myId){
			$this->db->where('posted_by',$myId);
			return $this->db->get('post_')->result();
		}
		public function getPostDetail($post_id){
			$this->db->where('post_id',$post_id);
			$this->db->join('users','users.user_id=post_.posted_by');
			return $this->db->get('post_')->result();
		}
		public function getAllPost($friendList,$myId,$offset="",$limit=""){
			//print_r($friendList);
			 if(($limit=="") && ($offset=="")){
			 	$offset =0;
			 	$limit = 5;
			 }
			
				if(count($friendList)>0) 
				{
					foreach ($friendList as $each) {
						$friends[]=$each->user_id;
					}
					array_push($friends,$myId);
					$ids = join("','",$friends);
					$sql = "SELECT * FROM post_ join users on users.user_id=post_.posted_by WHERE posted_by  IN ('$ids')  order by post_.post_id desc limit $offset,$limit ";
				}else{
					$sql = "SELECT * FROM post_  join users on users.user_id=post_.posted_by WHERE posted_by  IN ('$myId') order by post_.post_id desc limit $offset,$limit";
				}
				/*$this->db->where('post_id',$post_id);
				return $this->db->get('post_')->result();*/
				return $this->db->query($sql)->result();
		
		}
		
		public function getAlltimelinePost($myId,$offset="",$limit="")
		{

			 if(($limit=="") && ($offset=="")){
			 	$offset =0;
			 	$limit = 5;
			 }
			$sql = "SELECT * FROM post_  join users on users.user_id=post_.posted_by WHERE posted_by  IN ('$myId') OR tagged_friends IN ('$myId') order by post_.post_id desc limit $offset,$limit";
				
				/*$this->db->where('post_id',$post_id);
				return $this->db->get('post_')->result();*/
			return $this->db->query($sql)->result();
		
		}
		
		public function getMyTimeLinePost($id){
			// echo $id;
			$where = "owner_id=$id OR tagged_friends=$id";
			$this->db->where($where);
			$this->db->join('users','users.user_id=post_.posted_by');
			$this->db->order_by('post_.post_id','desc');
			return $this->db->get('post_')->result();
		}
		public function getTrending()
		{
			$sql="SELECT DISTINCT(a.post_id) ,a.*, u.*, p.*, SUM(a.like_or_dislike) as most FROM like_or_dislike as a JOIN post_ as p ON p.post_id=a.post_id JOIN users as u ON p.posted_by=u.user_id WHERE a.like_or_dislike=1 && p.post_type=0 GROUP BY a.post_id ORDER BY most DESC LIMIT 10";
			return $this->db->query($sql)->result();
		}
	}
?>