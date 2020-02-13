<?php

Class Login_model extends CI_Model {

		public function check_user($data) {

			// Query to check whether username already exist or not
			$condition = "email =" . "'" . $data['email'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				return false;
			} else {
				return true;
			}
		}

		public function check_user_phone($data) {

			// Query to check whether username already exist or not
			$condition = "phone =" . "'" . $data['phone'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				return false;
			} else {
				return true;
			}
		}

		public function read_user_information($type="",$email_phone="") {
			$condition = "".$type." =" . "'" . $email_phone . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
			return $query->result();
			} else {
			return false;
			}
		}

		public function insert_user($data){

			$condition = "email =" . "'" . $data['email'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				$this->db->insert('users', $data);
				if ($this->db->affected_rows() > 0) 
				{
				    return true;
				}else {
				    return false;
				}
			} else {
				return true;
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
}