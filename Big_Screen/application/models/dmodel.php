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
  		$this->db->join('tbl_moviedetails','tbl_login.lid=tbl_moviedetails.distributor_id','inner');
  		$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
  		$this->db->order_by("mid", "desc");
  		$query = $this->db->get_where('tbl_login',array($msg=>$data));
  		return $query->result();
  	}

    function filmsselect($lid)
    {

    	$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
    	$this->db->join('tbl_login','tbl_filmselection.lid=tbl_login.lid','inner');
			$this->db->join('tbl_theatredetails','tbl_login.lid=tbl_theatredetails.lid','inner');
    	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
    	// //$this->db->order_by("mid", "desc");
    	// //$this->db->join('tbl_filmselection','tbl_moviedetails.mid=tbl_filmselection.mid','inner');
    	$querys=$this->db->get_where('tbl_filmselection',array('distributor_id'=>$lid,'status'=>0));

			// $query = $this->db->query("select * from tbl_moviedetails as m,tbl_filmselection as f,tbl_login as l,tbl_details as d where m.mid=f.mid and f.lid=l.lid and l.username=d.email and m.distributer_id=$lid and f.status=0");
    	return $querys->result();
    }

    function filmsrunning($lid)
    {
			$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
    	$this->db->join('tbl_login','tbl_filmselection.lid=tbl_login.lid','inner');
			$this->db->join('tbl_theatredetails','tbl_login.lid=tbl_theatredetails.lid','inner');
    	$this->db->join('tbl_details','tbl_login.username=tbl_details.email','inner');
    	$querys=$this->db->get_where('tbl_filmselection',array('distributor_id'=>$lid,'status !='=>0));
    	return $querys->result();
    }

		//Check film in database
			function checkmovie($data)
			{
				$quuery=$this->db->get_where('tbl_moviedetails',array('film_name'=>$data));
				$c=$quuery->num_rows();
				return($c);
			}

		function filmcategory()
		{
			$querys = $this->db->get_where('tbl_film_category');
			return $querys->result();
		}

		//insert movie detailes
			function insertmovie($data)
			{
				$this->db->insert('tbl_moviedetails',$data);
			}

			function filmsingle($value)
			{
				$query = $this->db->get_where('tbl_moviedetails',array('mid'=>$value));
				return $query->result();

			}

			function theatreaccepted($lid)
			{
				$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
				$querys=$this->db->get_where('tbl_filmselection',array('lid'=>$lid,'status'=>'1'));
				return $querys->result();
			}

			function category($cat)
			{
				$query = $this->db->get_where('tbl_film_category',array('cid'=>$cat));
				return $query->result();
			}
			function filmapprove($fid,$action)
			{
				$this->db->where('fs_id',$fid);
				$this->db->update('tbl_filmselection',array('status'=>$action));
			}
			function language($langu)
			{
				$querys=$this->db->get_where('tbl_language',array('la_id'=>$langu));
				return $querys->result();
			}

}
?>
