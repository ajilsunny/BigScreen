<?php
class dmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  //films select
  	function films($data,$msg)
  	{
  		$this->db->join('tbl_moviedetails','tbl_login.lid=tbl_moviedetails.distributer_id','inner');
  		$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
  		$this->db->order_by("mid", "desc");
  		$query = $this->db->get_where('tbl_login',array($msg=>$data));
  		return $query->result();
  	}

    function filmsselect($lid)
    {

    	$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
    	$this->db->join('tbl_login','tbl_filmselection.lid=tbl_login.lid','inner');
    	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
    	//$this->db->order_by("mid", "desc");
    	//$this->db->join('tbl_filmselection','tbl_moviedetails.mid=tbl_filmselection.mid','inner');
    	$querys=$this->db->get_where('tbl_filmselection',array('distributer_id'=>$lid,'status'=>0));
    	return $querys->result();
    }

    function filmsrunning($lid)
    {
    	$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
    	$this->db->join('tbl_login','tbl_filmselection.lid=tbl_login.lid','inner');
    	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
    	//$this->db->order_by("mid", "desc");
    	//$this->db->join('tbl_filmselection','tbl_moviedetails.mid=tbl_filmselection.mid','inner');
    	$querys=$this->db->get_where('tbl_filmselection',array('distributer_id'=>$lid,'status !='=>0));
    	return $querys->result();
    }


}
?>
