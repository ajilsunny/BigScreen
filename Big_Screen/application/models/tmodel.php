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

	function update_profile($data,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('tbl_details',$data);
	}

	function states()
	{

		$querys=$this->db->get_where('tbl_state');
		return $querys->result();
	}

	function inserttheatre($data)
	{
		$this->db->insert('tbl_theatredetails',$data);
	}

	//Check film in database
		function checktheatre($theatrename,$email)
		{
			$quuery=$this->db->get_where('tbl_theatredetails',array('theatre_name'=>$theatrename,'t_email'=>$email));
			$c=$quuery->num_rows();
			return($c);
		}

		function theatreprofiles($lid)
		{
			$querys=$this->db->get_where('tbl_theatredetails',array('lid'=>$lid));
			return $querys->result();
		}

		function insertseating($data)
		{
			$this->db->insert('tbl_theatreseating',$data);
		}
		function theatrescreens($tid)
		{
			$querys=$this->db->get_where('tbl_theatredetails',array('tid'=>$tid));
			return $querys->result();
		}
		function theatreseating($tid,$screen)
		{
			$querys=$this->db->get_where('tbl_theatreseating',array('tid'=>$tid,'screen_no'=>$screen));
			return $querys->result();
		}
		function viewtheatre($tid)
		{
			$this->db->join('tbl_theatredetails','tbl_login.lid=tbl_theatredetails.lid','inner');
			$this->db->join('tbl_district','tbl_theatredetails.t_district=tbl_district.did','inner');
			$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');

			$querys=$this->db->get_where('tbl_login',array('tid'=>$tid));
			return $querys->result();
		}
		function days()
		{
			$querys=$this->db->get_where('tbl_day');
			return $querys->result();
		}
		function add_screens_time($data)
		{
			$this->db->insert('tbl_showtime',$data);
		}
}
