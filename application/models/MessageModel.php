<?php
	class MessageModel extends CI_Model{
		public function getAllMyMessages($myId){
			$this->db->where('sent_to',$myId);
			$this->db->order_by('msg_id','Desc');
			// $this->db->select('users.*,messages_.*,DISTINCT(messages_.sent_by)'); 
			$this->db->distinct();
			$this->db->group_by('messages_.sent_by');
			$this->db->join('users','users.user_id=messages_.sent_by');
			return $this->db->get('messages_')->result();
			// $res1=$this->db->query("SELECT DISTINCT ('messages_.sent_by'), messages_.*,users.* FROM `messages_` JOIN `users` ON `users`.`user_id`=`messages_`.`sent_by` WHERE `sent_to` = '$myId' GROUP BY `messages_`.`sent_by` ORDER BY `msg_id` DESC")->result();
			// $res=$this->db->query("SELECT DISTINCT('messages_.sent_to'),messages_.*,users.* FROM `messages_` JOIN `users` ON `users`.`user_id`=`messages_`.`sent_to` WHERE `sent_by` = '$myId' GROUP BY `messages_`.`sent_to` ORDER BY `msg_id` DESC")->result();
			// $t=array_merge($res1,$res);
			// print_r(json_encode($res1)) ;
		}
		public function getConversationDetails($con_id){
			$this->db->where('msg_id',$con_id);
			$res=$this->db->get('messages_')->result();
			$sent_by=$res[0]->sent_by;
			$sent_to=$res[0]->sent_to;
			$conOne=$this->db->query("select * from messages_ join users on users.user_id=messages_.sent_by where (messages_.sent_by='$sent_by' and messages_.sent_to='$sent_to' ) or (messages_.sent_by='$sent_to' and messages_.sent_to='$sent_by' )  order by messages_.msg_id asc")->result();
			$conTwo=$this->db->query("select * from messages_ join users on users.user_id=messages_.sent_to where (messages_.sent_by='$sent_to' and messages_.sent_to='$sent_by' ) order by messages_.msg_id asc")->result();
			// $allMsgs=array_merge($conOne,$conTwo);
			return $conOne;
			// print_r($res);
		}
		public function getMyConver($myId,$friend){
			$conOne=$this->db->query("select * from messages_ join users on users.user_id=messages_.sent_by where (messages_.sent_by='$myId' and messages_.sent_to='$friend' ) or (messages_.sent_by='$friend' and messages_.sent_to='$myId' )  order by messages_.msg_id asc")->result();
			
			return $conOne;
		}
		public function sendMessage($data){
			if($this->db->insert('messages_',$data)){
				return true;
			}else{
				return false;
			}
		}
	}
	
?>