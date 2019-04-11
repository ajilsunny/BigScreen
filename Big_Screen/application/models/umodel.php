<?php
class umodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('email');
	}

  function allfilms()
  {
    $this->db->order_by("mid", "desc");
    $querys=$this->db->get_where('tbl_moviedetails');
    return $querys->result();
  }
	function filmviewdetailed($fid)
	{
		$query = $this->db->get_where('tbl_moviedetails',array('mid'=>$fid));
		return $query->result();
	}
	function language($langu)
	{
		$querys=$this->db->get_where('tbl_language',array('la_id'=>$langu));
		return $querys->result();
	}
	function category($cat)
	{
		$query = $this->db->get_where('tbl_film_category',array('cid'=>$cat));
		return $query->result();
	}
function theatreselect($mid,$district)
{
	$this->db->join('tbl_runningmovietime','tbl_theatredetails.tid=tbl_runningmovietime.tid','inner');
	$querys=$this->db->get_where('tbl_theatredetails',array('t_district'=>$district,'mid'=>$mid));
	return $querys->result();
}
function runt($mid,$tid,$screen)
{
	$querys=$this->db->get_where('tbl_runningmovietime',array('tid'=>$tid,'mid'=>$mid,'screen'=>$screen));
	return $querys->result();
}
function day($a,$did)
{
	$querys=$this->db->get_where('tbl_showtime',array('stid'=>$a,'dayid'=>$did));
	return $querys->result();
}
function theatreseating($tid,$screen)
{
	$querys=$this->db->get_where('tbl_theatreseating',array('tid'=>$tid,'screen_no'=>$screen));
	return $querys->result();
}
function alocate($tid,$screen,$mid,$bookdate,$booktime)
{
	$querys=$this->db->get_where('tbl_seatbooking',array('tid'=>$tid,'screen'=>$screen,'mid'=>$mid,'date'=>$bookdate,'time'=>$booktime));
	return $querys->result();
}
function bookseat($data)
{
	$this->db->insert('tbl_seatbooking',$data);
	$insert_id = $this->db->insert_id();
	return $insert_id;
}
function seatcheck($data,$data1)
{
	$querys=$this->db->get_where('tbl_seatbooking',$data);
	$c=$querys->num_rows();

	$this->db->where($data1);
	$this->db->delete('tbl_seatbooking');

	return $querys->result();
}
function details($s)
{
	$querys=$this->db->query("SELECT * FROM `tbl_seatbooking` as se,tbl_moviedetails as m,tbl_theatredetails as td WHERE se.mid=m.mid and se.tid=td.tid and se.s_id='$s'");
	return $querys->result();
}
function payment($data)
{
	$querys=$this->db->get_where('tbl_bank',$data);
	return $querys->result();
}
function updatebooking($seat)
{
	$this->db->where('s_id',$seat);
	$this->db->update('tbl_seatbooking',array('b_status'=>'0'));
}
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


}
