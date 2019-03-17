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

	//Movie details insert
	function moviedetailesinsert()
	{
		$filmName1=$this->input->post('filmName');
		$res=$this->Mymodel->checkmovie($filmName);
		if($res == 0)
		{
			$directer=array();
			$producer=array();
			$actor=array();
			$actress=array();
			$directerpic=array();
			$producerpic=array();
			$actorpic=array();
			$actresspic=array();

			$id=$this->session->userdata('id');

			$numdirector=$this->input->post('numdirector');
			for($i=0;$i<=$numdirector;$i++)
			{
				$directer[$i]=$this->input->post('directer'.$i);
				$directerpic[$i]=time().$_FILES['directerpic'.$i]['name'];
				$directorpath="../Big_Screen/images/movie/directer/";
				move_uploaded_file($_FILES['directerpic'.$i]['tmp_name'],$directorpath.$directerpic[$i]);
				$sourceProperties = getimagesize($directorpath.$directerpic[$i]);
				$this->imagecheck($sourceProperties,$directorpath.$directerpic[$i]);
			}

			$numproducer=$this->input->post('numproducer');
			for($i=0;$i<=$numproducer;$i++)
			{
				$producer[$i]=$this->input->post('producer'.$i);
				$producerpic[$i]=time().$_FILES['producerpic'.$i]['name'];
				$producerpath="../Big_Screen/images/movie/directer/";
				move_uploaded_file($_FILES['producerpic'.$i]['tmp_name'],$producerpath.$producerpic[$i]);
				$sourceProperties = getimagesize($producerpath.$$producerpic[$i]);
				$this->imagecheck($sourceProperties,$producerpath.$producerpic[$i]);
			}

			$numproducer=$this->input->post('numproducer');
			for($i=0;$i<=$numproducer;$i++)
			{
				$producer[$i]=$this->input->post('producer'.$i);
				$producerpic[$i]=time().$_FILES['producerpic'.$i]['name'];
				$producerpath="../Big_Screen/images/movie/directer/";
				move_uploaded_file($_FILES['producerpic'.$i]['tmp_name'],$producerpath.$producerpic[$i]);
				$sourceProperties = getimagesize($producerpath.$$producerpic[$i]);
				$this->imagecheck($sourceProperties,$producerpath.$producerpic[$i]);
			}

			$mdirector=$this->input->post('mdirector');
			$language=$this->input->post('language');
			$actor=$this->input->post('actor');
			$actress=$this->input->post('actress');
			$description=$this->input->post('description');
			$cost=$this->input->post('cost');
			$filmposterpic=time().$_FILES['filmposterpic']['name'];
			$coverpic=time().$_FILES['coverpic']['name'];

			$producerpic=time().$_FILES['producerpic']['name'];
			$actorpic=time().$_FILES['actorpic']['name'];
			$actresspic=time().$_FILES['actresspic']['name'];
			$posterpath="../Big_Screen/images/movie/poster/";
			$coverpath="../Big_Screen/images/movie/cover/";

			$producerpath="../Big_Screen/images/movie/producer/";
			$actorpath="../Big_Screen/images/movie/actor/";
			$actresspath="../Big_Screen/images/movie/actress/";
			move_uploaded_file($_FILES['filmposterpic']['tmp_name'],$posterpath.$filmposterpic);
			move_uploaded_file($_FILES['coverpic']['tmp_name'],$coverpath.$coverpic);

			move_uploaded_file($_FILES['producerpic']['tmp_name'],$producerpath.$producerpic);
			move_uploaded_file($_FILES['actorpic']['tmp_name'],$actorpath.$actorpic);
			move_uploaded_file($_FILES['actresspic']['tmp_name'],$actresspath.$actresspic);

			$sourceProperties = getimagesize($posterpath.$filmposterpic);
			$this->imagecheckposter($sourceProperties,$posterpath.$filmposterpic);

			$sourceProperties = getimagesize($coverpath.$coverpic);
			$this->imagecheckcover($sourceProperties,$coverpath.$coverpic);



			$sourceProperties1 = getimagesize($producerpath.$producerpic);
			$this->imagecheck($sourceProperties1,$producerpath.$producerpic);

			$sourceProperties2 = getimagesize($actorpath.$actorpic);
			$this->imagecheck($sourceProperties2,$actorpath.$actorpic);

			$sourceProperties3 = getimagesize($actresspath.$actresspic);
			$this->imagecheck($sourceProperties3,$actresspath.$actresspic);

			$data=array('mid'=>NULL,'distributor_id'=>$id,'film_name'=>$filmName,'poster_pic'=>$filmposterpic,'cover_pic'=>$coverpic,'directer'=>$directer,'directer_pic'=>$directerpic,'producer'=>$producer,'producer_pic'=>$producerpic,'mdirector'=>$mdirector,'language'=>$language,'actor'=>$actor,'actor_pic'=>$actorpic,'actress'=>$actress,'actress_pic'=>$actresspic,'description'=>$description,'date'=>'2018','price'=>$cost);
			$this->Mymodel->insertmovie($data);
			$username=$this->session->userdata('username');
			$this->session->set_flashdata('msg', 'Film Update Sucessfully');
			$result['dis']=$this->Mymodel->disuser($username);
			$this->load->view('distributor_addfilmdetails',$result);
		}
		else
		{
			$username=$this->session->userdata('username');
			$this->session->set_flashdata('msg', 'The Film Already Uploaded');
			$result['dis']=$this->Mymodel->disuser($username);
			$this->load->view('distributor_addfilmdetails',$result);
		}
	}

}
?>
