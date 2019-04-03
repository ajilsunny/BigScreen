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
		function theatreshowtime($tid,$screen)
		{
			$this->db->join('tbl_day','tbl_showtime.dayid=tbl_day.did','inner');
			$querys=$this->db->get_where('tbl_showtime',array('tid'=>$tid,'screen'=>$screen));
			return $querys->result();
		}
		function checkshowtime($tid,$screen,$did)
		{
			$querys=$this->db->get_where('tbl_showtime',array('tid'=>$tid,'screen'=>$screen,'dayid'=>$did));
			$c=$querys->num_rows();
			return $c;
		}
		function allfilms()
		{
			$this->db->order_by("mid", "desc");
			$querys=$this->db->get_where('tbl_moviedetails');
			return $querys->result();
		}
		function selectfilms($lid)
		{
			$querys=$this->db->get_where('tbl_filmselection',array('lid'=>$lid,'status!='=>0));
			return $querys->result();
		}
		function filmsingle($value)
		{
			$query = $this->db->get_where('tbl_moviedetails',array('mid'=>$value));
			return $query->result();

		}

		function category($cat)
		{
			$query = $this->db->get_where('tbl_film_category',array('cid'=>$cat));
			return $query->result();
		}

		function bookstatus($mid,$lid)
		{
				$querys=$this->db->get_where('tbl_filmselection',array('mid'=>$mid,'lid'=>$lid));
				return $querys->result();
		}

		function filmbookstatus($data,$mid,$lid)
		{
			$this->db->insert('tbl_filmselection',$data);
			$querys=$this->db->get_where('tbl_filmselection',array('mid'=>$mid,'lid'=>$lid));
			return $querys->result();
		}

		function filmbookstatuscancel($data)
		{
				$this->db->where($data);
		   	$this->db->delete('tbl_filmselection');
				return 0;
		}

		function theatreaccepted($lid)
		{
			$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
			$querys=$this->db->get_where('tbl_filmselection',array('lid'=>$lid,'status'=>'1'));
			return $querys->result();
		}

		function theatrebooked($lid)
		{
			$this->db->join('tbl_moviedetails','tbl_filmselection.mid=tbl_moviedetails.mid','inner');
			$querys=$this->db->get_where('tbl_filmselection',array('lid'=>$lid,'status'=>'2'));
			return $querys->result();
		}
		function language($langu)
		{
			$querys=$this->db->get_where('tbl_language',array('la_id'=>$langu));
			return $querys->result();
		}
		function showrunningmoviedetailes($mid)
		{
			//$this->db->join('tbl_moviedetails','tbl_runningmovietime.mid=tbl_moviedetails.mid','inner');
			$querys=$this->db->get_where('tbl_moviedetails',array('mid'=>$mid));
			return $querys->result();
		}
		function tfilmrunningtime($lid)
		{
			$this->db->join('tbl_moviedetails','tbl_runningmovietime.mid=tbl_moviedetails.mid','inner');
			$querys=$this->db->get_where('tbl_runningmovietime',array('lid'=>$lid));
			return $querys->result();
		}
		function theatres($lid)
		{
			$querys=$this->db->get_where('tbl_theatredetails',array('lid'=>$lid));
			return $querys->result();
		}

}
