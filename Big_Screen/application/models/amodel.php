<?php
class amodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  //Not approved theatres list
  	function approvetheatrelist($type)
  	{
			$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
			$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
			$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
  		$querys=$this->db->get_where('tbl_login',array('type'=>$type,'lstatus'=>'0'));
  		return $querys->result();
  	}

		//distributor approval
			function approvedistributorlist($type)
			{

				$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
				$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
				$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
				$querys=$this->db->get_where('tbl_login',array('type'=>$type,'lstatus'=>'0'));
				return $querys->result();
			}

    function countlist($a)
  	{
  		$query=$this->db->get_where('tbl_login',array('type'=>$a,'lstatus!='=>0));
  		$c=$query->num_rows();
  		return $c;
  	}

  //count no of appovel
  	function countapproval($a)
  	{
  		$query=$this->db->get_where('tbl_login',array('type'=>$a,'lstatus'=>0));
  		$c=$query->num_rows();
  		return $c;
  	}

	//Block update action
		function updateblock($email,$block)
		{
			$this->db->where('username',$email);
			$this->db->update('tbl_login',array('lstatus'=>$block));
		}

		function states()
		{
			$querys=$this->db->get_where('tbl_state',array('status'=>0));
			return $querys->result();
		}

		// lists
		function lists($type)
		{
			$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
			$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
			$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
			$querys=$this->db->get_where('tbl_login',array('type'=>$type,'lstatus!='=>0));
			return $querys->result();
		}

	//update news
		function newsupdate($value)
		{
			$query = $this->db->get_where('tbl_news',array('nid'=>$value));
			return $query->result();
		}

	//Check news in database
	function checknews($data)
	{
		$quuery=$this->db->get_where('tbl_news',array('heading'=>$data));
		$c=$quuery->num_rows();
		return($c);
	}

//Insert News
	function insertnews($data)
	{
		$this->db->insert('tbl_news',$data);
	}

	//news status update
	function updatenews($id,$data)
	{
		$this->db->where('nid',$id);
		$this->db->update('tbl_news',$data);
	}

//List newses in admin page
	function newslist()
	{
		$this->db->order_by("nid", "desc");
		$query = $this->db->get_where('tbl_news',array('nstatus'=>0));
		return $query->result();
	}
//remove news
	function removenews($id)
	{
		$this->db->where('nid',$id);
		$this->db->delete('tbl_news');
		//$this->db->update('tbl_news',array('nstatus'=>$action));
	}
function searchtheatre($search)
{
	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
	$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
	$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
	$querys=$this->db->get_where('tbl_login',array('name'=>$search,'type'=>2,'lstatus'=>'0'));
	return $querys->result();
}

function searchdistributor($search)
{
	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
	$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
	$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
	$querys=$this->db->get_where('tbl_login',array('name'=>$search,'type'=>3,'lstatus'=>'0'));
	return $querys->result();
}

function searchtheatrelist($search)
{
	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
	$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
	$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
	$querys=$this->db->get_where('tbl_login',array('name'=>$search,'type'=>2,'lstatus!='=>'0'));
	return $querys->result();
}

function searchuserlist($search)
{
	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
	$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
	$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
	$querys=$this->db->get_where('tbl_login',array('name'=>$search,'type'=>1,'lstatus!='=>'0'));
	return $querys->result();
}

function searchdistributorlist($search)
{
	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
	$this->db->join('tbl_district','tbl_details.did=tbl_district.did','inner');
	$this->db->join('tbl_state','tbl_district.sid=tbl_state.id','inner');
	$querys=$this->db->get_where('tbl_login',array('name'=>$search,'type'=>3,'lstatus!='=>'0'));
	return $querys->result();
}

}
