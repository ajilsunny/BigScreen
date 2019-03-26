<?php
class tmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//display details access
	function disuser($user)
	{
		$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
		$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
		$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');

		$querys=$this->db->get_where('tbl_login',array('username'=>$user));
		return $querys->result();
	}

}
