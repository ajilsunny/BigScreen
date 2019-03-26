<?PHP
class tcontroller extends CI_Controller
{
	function __construct()

	{
		parent::__construct();
		$this->load->model('tmodel');
		$this->load->model('Mymodel');
		$this->load->helpers(array('url','form'));
		$this->load->library(array('session','upload'));
	}

  function sessionin()
  {
  	$username=$this->session->userdata('username');
  	$password=$this->session->userdata('password');
  	$loginresult['login']=$this->Mymodel->loguser($username,$password);
  	if($loginresult['login'])
  	{
  		return(1);
  	}
  	else
  	{
  		return(0);
  	}
  }

  function index()
  {
  	$result['dis']=$this->Mymodel->states();
  	$this->load->view('home',$result);
  }

  function theatrehome()
  {
  $this->load->view('theatre/theatre_home');
  }
  function theatreseating()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->seatingselection($lid);
  $this->load->view('theatre/theatre_seating',$result);
  }
  function theatrerunningtime()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->theatrebooked($lid);
  $this->load->view('theatre/theatre_runningfilmtime',$result);
  }
  function theatrefilmrunningtime()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->tfilmrunningtime($lid);
  $this->load->view('theatre/theatre_runningtime',$result);
  }
  function theatrefilmselection()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->allfilms();
  $this->load->view('theatre/theatre_filmselection',$result);
  }
  function theatreacceptfilm()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->theatreaccepted($lid);
  $this->load->view('theatre/theatre_acceptedfilms',$result);
  }
  function theatrebookedfilm()
  {
  $lid=$this->session->userdata('id');
  $result['dis']=$this->Mymodel->theatrebooked($lid);
  $this->load->view('theatre/theatre_bookedfilms',$result);
  }
  function theatreownerprofile()
  {
  $this->load->view('theatre/theatre_owner_profile');
  }
  function theatreprofile()
  {
  $username=$this->session->userdata('username');
  $result['dis']=$this->tmodel->disuser($username);
  $this->load->view('theatre/theatre_profile',$result);
  }
  function theatrecontact()
  {
  $this->load->view('theatre/theatre_contact');
  }

  //theatre edit profile
function theatre_profile_edit()
{
		$email=$this->input->post('email');
		if(isset($email))
		{
			$result['dis']=$this->tmodel->disuser($email);
			$this->load->view('theatre/theatre_profileedit',$result);
		}
		else {
			$this->theatreprofile();
		}
	}

	function theatresetseats()
	{
		$seats[]=$this->input->post('seat');
		$catname[]=$this->input->post('catname');
		$catrows[]=$this->input->post('catrow');
		$catprice[]=$this->input->post('catprice');
	}

}
