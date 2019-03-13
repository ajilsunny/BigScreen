<?PHP
class dcontroller extends CI_Controller
{
	function __construct()

	{
		parent::__construct();
		$this->load->model('dmodel');
		$this->load->model('Mymodel');
		$this->load->helpers(array('url','form'));
		$this->load->library(array('session','upload'));
	}
  function mainindex()
  {
  	$result['dis']=$this->Mymodel->states();
  	$this->load->view('home',$result);
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

  //distributor PAGES
  function distributorhome()
  {
    $username=$this->session->userdata('username');
    $result['dis']=$this->Mymodel->disuser($username);
    $this->load->view('distributor_home',$result);
  }

  function distributoraddfilms()
	{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor_addfilmdetails',$result);
	}

  function distributorfilms()
	{
		$lid=$this->session->userdata('id');
		$msg='lid';
		$result['dis']=$this->dmodel->films($lid,$msg);
		$this->load->view('distributor_films',$result);
	}

  function distributorselectedfilms()
	{
		$lid=$this->session->userdata('id');
		$result['dis']=$this->dmodel->filmsselect($lid);
		$this->load->view('distributor_selectedfilmdetails',$result);
	}

  function distributorrunningstatus()
	{
		$lid=$this->session->userdata('id');
		$result['dis']=$this->dmodel->filmsrunning($lid);
		$this->load->view('distributor_runningtheaters',$result);
	}

  function distributorprofile()
	{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor_profile',$result);
	}

  function distributorcontact()
	{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor_contact',$result);
	}

	//distributor edit profile
	function distributor_profile_edit()
	{
		$email=$this->input->post('email');
		if(isset($email))
		{
		$result['dis']=$this->Mymodel->disuser($email);
		$this->load->view('distributor_profileedit',$result);
		}
		else
		{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor_profile',$result);
		}
	}

	function distributor_profile_update()
	{
		$name=$this->input->post('name');
		if(isset($name))
		{
				$email=$this->input->post('email');
				$phone=$this->input->post('phone');
				$place=$this->input->post('place');
				$pin=$this->input->post('pin');
				$button=$this->input->post('action');
				if($button=='cancel')
				{
					$username=$this->session->userdata('username');
					$result['dis']=$this->Mymodel->disuser($username);
					$this->load->view('distributor_profile',$result);
				}
				else
				{
					if($_FILES['profilepic']['name'] !=="")
						{
							$folderPath = "../Big_Screen/images/profile/";
							$image =  time().$_FILES['profilepic']['name'];
							move_uploaded_file($_FILES['profilepic']['tmp_name'],$folderPath.$image);
							$sourceProperties = getimagesize($folderPath.$image);
							$ext = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
							$this->imagecheck($sourceProperties,$folderPath.$image);
							$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin,'profile_pic'=>$image);
							$this->Mymodel->update_profile($data,$email);
							$result['dis']=$this->Mymodel->disuser($email);
							$this->session->set_userdata('name',$name);
							$this->load->view('distributor_profile',$result);
						}
						else
						{
							$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
							$this->Mymodel->update_profile($data,$email);
							$result['dis']=$this->Mymodel->disuser($email);
							$this->load->view('distributor_profile',$result);
						}
				}
			}
			else
			{
				$username=$this->session->userdata('username');
				$result['dis']=$this->Mymodel->disuser($username);
				$this->load->view('distributor_profile',$result);
			}
	}

	//check image type
	function imagecheck($sourceProperties,$path)
	{
		$imageType = $sourceProperties[2];
		switch ($imageType) {


			case IMAGETYPE_PNG:
			$imageResourceId = imagecreatefrompng($path);
			$targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagepng($targetLayer,$path);
			break;


			case IMAGETYPE_GIF:
			$imageResourceId = imagecreatefromgif($path);
			$targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagegif($targetLayer,$path);
			break;


			case IMAGETYPE_JPEG:
			$imageResourceId = imagecreatefromjpeg($path);
			$targetLayer =$this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagejpeg($targetLayer,$path);
			break;


			default:
			echo "Invalid Image type.";
			exit;
			break;

		}
	}

	function imageResize($imageResourceId,$width,$height)
	{
		$targetWidth =200;
		$targetHeight =200;
		$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
		imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
		return $targetLayer;
	}

}
?>
