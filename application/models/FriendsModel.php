<?php
	class FriendsModel extends CI_Model{
		public $randomArray=array();
		public function getRandomUser($id){
			// $this->db->order_by('rand()');
   //  		$this->db->limit(3);
   //  		$res=$this->db->get('users')->result();
    		// 
    		// foreach ($res as $k) {
    			
    		// 	$arr=$this->db->query("select * from friends_ where (user_id='$myId' and friend_id='$k->user_id') or (user_id='$k->user_id' and friend_id='$myId')")->result();
    		// 	print_r($arr);
    		// 	// echo ' Count: '.count($arr);
    		// 	// if(!$arr){
    		// 	// 	array_push($randomArray,$arr);
    		// 	// }
    		// 	if(count($arr)==0){
    		// 		$randomArray[]=$arr;
    		// 		// array_push($randomArray,$arr);
    		// 	}
    		// }
    		// print_r($randomArray);
    		$FrdsArr=$this->getMyFriends($id);
			// print_r($FrdsArr);
			
			// $sql="SELECT friend_id FROM friends_ WHERE user_id='$id'";
			// $query=mysqli_query($db,$sql);
			// while($row=mysqli_fetch_assoc($query)){
			// 	$friends[]=$row['friend_id'];
			// }

			  
			if(count($FrdsArr)>0) {
				foreach ($FrdsArr as $each) {
					$friends[]=$each->user_id;
				}
				array_push($friends,$id);
				$ids = join("','",$friends);
				$sql = "SELECT * FROM users  WHERE user_id NOT IN ('$ids') order by rand() limit 3";
			}else{
				$sql = "SELECT * FROM users  WHERE user_id NOT IN ('$id') order by rand() limit 3";
			}
			
			return $this->db->query($sql)->result();
    		// return $res;
		}
		public function getUser(){
			$this->db->order_by('rand()');
    		$this->db->limit(3);
    		$res=$this->db->get('users')->result();
			// $this->checkForExistingFriendship($uId,$myId);
		}
		public function getMyFriends($myId){
			$result=$this->db->query("select * from friends_ join users on users.user_id=friends_.user_id where friends_.friend_id='$myId'")->result(); 
    		$result_=$this->db->query("select * from friends_ join users on users.user_id=friends_.friend_id where friends_.user_id='$myId'")->result();
    		$myFriends=array_merge($result_,$result);
			return $myFriends;
		}
		
		public function getMyFriendsByName($myId,$key){
			$this->db->like('users.full_name', $key, 'after'); 
			$this->db->join('users','users.user_id=friends_.user_id');
			$this->db->where('friends_.friend_id',$myId);
			$result=$this->db->get('friends_')->result();


			$this->db->like('users.full_name', $key, 'after'); 
			$this->db->join('users','users.user_id=friends_.user_id');
			$this->db->where('friends_.user_id',$myId);
			$result_=$this->db->get('friends_')->result();
			// $result=$this->db->query("select * from friends_ join users on users.user_id=friends_.user_id where friends_.friend_id='$myId'")->result(); 
    		// $result_=$this->db->query("select * from friends_ join users on users.user_id=friends_.friend_id where friends_.user_id='$myId'")->result();
    		$myFriends=array_merge($result_,$result);
			return $myFriends;
		}
		public function getFriendRequests($myId){
			$this->db->order_by('rand()');
			$this->db->where('sent_to',$myId);
			$this->db->where('request_status',2);
			$this->db->join('users','users.user_id=friend_request.sent_by');
			return $this->db->get('friend_request')->result();
		}
		public function getMyFollowers($myId){
			// $this->db->where('follow_status',1);
			$result=$this->db->query("select * from friends_ join users on users.user_id=friends_.user_id where friends_.friend_id='$myId' and friends_.follow_status=1")->result(); 
    		$result_=$this->db->query("select * from friends_ join users on users.user_id=friends_.friend_id where friends_.user_id='$myId' and friends_.follow_status=1")->result();
    		$myFollowers=array_merge($result_,$result);
			// $this->db->join('users','users.user_id=friends_.sent_by');
			return $myFollowers;
		}
		public function checkForExistingFriendship($uId,$myId){
			return $this->db->query("select * from friends_ where (user_id='$uId' and friend_id='$myId') or (user_id='$myId' and friend_id='$uId')")->result();
		}
		public function getMyFreStatus($id){
			$FrdsArr=$this->getMyFriends($id);
			// print_r($FrdsArr);
			if(count($FrdsArr)>0){
				foreach ($FrdsArr as $each) {
					$friends[]=$each->user_id;
				}
				$ids = join("','",$friends);   
				$sql = "SELECT * FROM stories_ join users on users.user_id=stories_.posted_by WHERE posted_by IN ('$ids') group by stories_.posted_by ";
				return $this->db->query($sql)->result();
			}else{
				return false;
			}
			
			// $sql="SELECT friend_id FROM friends_ WHERE user_id='$id'";
			// $query=mysqli_query($db,$sql);
			// while($row=mysqli_fetch_assoc($query)){
			// 	$friends[]=$row['friend_id'];
			// }

			
			
		}
		public function getMyStatus(){
			$id=$_SESSION['logged_in'][0]->user_id ;
			$date=date('d-M-Y H:i:s') ;
			$day_before = date( 'd-M-Y H:i:s', strtotime( $date . ' -1 day' ) );
			// $FrdsArr=$this->getMyFriends($);
			// print_r($FrdsArr);
			// if(count($FrdsArr)>0){
				// foreach ($FrdsArr as $each) {
				// 	$friends[]=$each->user_id;
				// }
				// $ids = join("','",$friends);  
				// 
				$sql = "SELECT * FROM stories_ join users on users.user_id=stories_.posted_by WHERE posted_by='$id' and posted_on >= '".$day_before."' ";
				return $this->db->query($sql)->result();
			// }else{
			// 	return false;
			// }
			
			// $sql="SELECT friend_id FROM friends_ WHERE user_id='$id'";
			// $query=mysqli_query($db,$sql);
			// while($row=mysqli_fetch_assoc($query)){
			// 	$friends[]=$row['friend_id'];
			// }

			
			
		}
		public function getMyFreActivities($id){
			$FrdsArr=$this->getMyFriends($id);
			// print_r($FrdsArr);
			
			if(count($FrdsArr)>0){
				foreach ($FrdsArr as $each) {
					$friends[]=$each->user_id;
				}
				$ids = join("','",$friends);   
				$sql = "SELECT * FROM recent_activity join users on users.user_id=recent_activity.user_id WHERE recent_activity.user_id IN ('$ids')";
			}else{
				$sql = "SELECT * FROM recent_activity join users on users.user_id=recent_activity.user_id ";
				// else{
			}
			// 	$sql = "SELECT * FROM recent_activity join users on users.user_id=recent_activity.user_id WHERE recent_activity.user_id IN ('$ids')";
			// }
			// $sql="SELECT friend_id FROM friends_ WHERE user_id='$id'";
			// $query=mysqli_query($db,$sql);
			// while($row=mysqli_fetch_assoc($query)){
			// 	$friends[]=$row['friend_id'];
			// }

			
			return $this->db->query($sql)->result();
		}
		public function checkFriendRequestStatus($user_id){
			$this->db->where(array('sent_to'=>$user_id,'sent_by'=>$_SESSION['logged_in'][0]->user_id,'request_status'=>2));
			return $this->db->get('friend_request')->result_array();
		}
	}
?>
