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

	function sessionin($t)
	{
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		$loginresult['login']=$this->Mymodel->loguser($username,$password);
		if($loginresult['login'])
		{
			foreach ($loginresult['login'] as $key)
			{
				$z=$key->type;
				if($z==$t)
				{
					return(1);
				}
				else
				{
					return(0);
				}
			}

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
    $this->load->view('distributor/distributor_home',$result);
  }

  function distributoraddfilms()
	{
		$username=$this->session->userdata('username');
		//$result['dis']=$this->Mymodel->disuser($username);
		$cat['cat']=$this->dmodel->filmcategory();
		$this->load->view('distributor/distributor_addfilmdetails',$cat);
	}

  function distributorfilms()
	{
		$lid=$this->session->userdata('id');
		$msg='lid';
		$result['dis']=$this->dmodel->films($lid,$msg);
		$this->load->view('distributor/distributor_films',$result);
	}

  function distributorselectedfilms()
	{
		$lid=$this->session->userdata('id');
		$result['dis']=$this->dmodel->filmsselect($lid);
		$this->load->view('distributor/distributor_selectedfilmdetails',$result);
	}

  function distributorrunningstatus()
	{
		$lid=$this->session->userdata('id');
		$result['dis']=$this->dmodel->filmsrunning($lid);
		$this->load->view('distributor/distributor_runningtheaters',$result);
	}

  function distributorprofile()
	{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor/distributor_profile',$result);
	}

  function distributorcontact()
	{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor/distributor_contact',$result);
	}

	//distributor edit profile
	function distributor_profile_edit()
	{
		$email=$this->input->post('email');
		if(isset($email))
		{
		$result['dis']=$this->Mymodel->disuser($email);
		$this->load->view('distributor/distributor_profileedit',$result);
		}
		else
		{
		$username=$this->session->userdata('username');
		$result['dis']=$this->Mymodel->disuser($username);
		$this->load->view('distributor/distributor_profile',$result);
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
					$this->load->view('distributor/distributor_profile',$result);
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
							$this->load->view('distributor/distributor_profile',$result);
						}
						else
						{
							$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
							$this->Mymodel->update_profile($data,$email);
							$result['dis']=$this->Mymodel->disuser($email);
							$this->load->view('distributor/distributor_profile',$result);
						}
				}
			}
			else
			{
				$username=$this->session->userdata('username');
				$result['dis']=$this->Mymodel->disuser($username);
				$this->load->view('distributor/distributor_profile',$result);
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

	function imagecheckposter($sourceProperties,$path)
	{
	$imageType = $sourceProperties[2];
	switch ($imageType) {


	case IMAGETYPE_PNG:
	$imageResourceId = imagecreatefrompng($path);
	$targetLayer = $this->imageResizeposter($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagepng($targetLayer,$path);
	break;


	case IMAGETYPE_GIF:
	$imageResourceId = imagecreatefromgif($path);
	$targetLayer = $this->imageResizeposter($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagegif($targetLayer,$path);
	break;


	case IMAGETYPE_JPEG:
	$imageResourceId = imagecreatefromjpeg($path);
	$targetLayer =$this->imageResizeposter($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagejpeg($targetLayer,$path);
	break;


	default:
	echo "Invalid Image type.";
	exit;
	break;

	}
	}

	function imagecheckcover($sourceProperties,$path)
	{
	$imageType = $sourceProperties[2];
	switch ($imageType) {


	case IMAGETYPE_PNG:
	$imageResourceId = imagecreatefrompng($path);
	$targetLayer = $this->imageResizecover($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagepng($targetLayer,$path);
	break;


	case IMAGETYPE_GIF:
	$imageResourceId = imagecreatefromgif($path);
	$targetLayer = $this->imageResizecover($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagegif($targetLayer,$path);
	break;


	case IMAGETYPE_JPEG:
	$imageResourceId = imagecreatefromjpeg($path);
	$targetLayer =$this->imageResizecover($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
	imagejpeg($targetLayer,$path);
	break;


	default:
	echo "Invalid Image type.";
	exit;
	break;

	}
	}


	function imageResizeposter($imageResourceId,$width,$height)
	{
	$targetWidth =236;
	$targetHeight =328;
	$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
	imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
	return $targetLayer;
	}

	function imageResizecover($imageResourceId,$width,$height)
	{
	$targetWidth =1280;
	$targetHeight =720;
	$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
	imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
	return $targetLayer;
	}

	//Movie details insert
	function moviedetailesinsert()
	{
		$filmName1=$this->input->post('filmName');
		$res=$this->dmodel->checkmovie($filmName1);
		if($res == 0)
		{
			$director=array();
			$producer=array();
			$actor=array();
			$actress=array();
			$directorpic=array();
			$producerpic=array();
			$actorpic=array();
			$actresspic=array();
			$categories=array();

			$id=$this->session->userdata('id');

			$numdirector=$this->input->post('numdirector');
			for($i=0;$i<=$numdirector;$i++)
			{
				$director[$i]=$this->input->post('Director'.$i);
				$directorpic[$i]=time().$_FILES['Directorpic'.$i]['name'];
				$directorpath="../Big_Screen/images/movie/director/";
				move_uploaded_file($_FILES['Directorpic'.$i]['tmp_name'],$directorpath.$directorpic[$i]);
				$sourceProperties = getimagesize($directorpath.$directorpic[$i]);
				$this->imagecheck($sourceProperties,$directorpath.$directorpic[$i]);
			}

			$numproducer=$this->input->post('numproducer');
			for($i=0;$i<=$numproducer;$i++)
			{
				$producer[$i]=$this->input->post('producer'.$i);
				$producerpic[$i]=time().$_FILES['producerpic'.$i]['name'];
				$producerpath="../Big_Screen/images/movie/producer/";
				move_uploaded_file($_FILES['producerpic'.$i]['tmp_name'],$producerpath.$producerpic[$i]);
				$sourceProperties = getimagesize($producerpath.$producerpic[$i]);
				$this->imagecheck($sourceProperties,$producerpath.$producerpic[$i]);
			}

			$numactor=$this->input->post('numactor');

			for($i=0;$i<=$numactor;$i++)
			{

				$actor[$i]=$this->input->post('actor'.$i);
				$actorpic[$i]=time().$_FILES['actorpic'.$i]['name'];
				$actorpath="../Big_Screen/images/movie/actor/";
				move_uploaded_file($_FILES['actorpic'.$i]['tmp_name'],$actorpath.$actorpic[$i]);
				$sourceProperties = getimagesize($actorpath.$actorpic[$i]);
				$this->imagecheck($sourceProperties,$actorpath.$actorpic[$i]);
			}

			$numactress=$this->input->post('numactress');
			for($i=0;$i<=$numactress;$i++)
			{
				$actress[$i]=$this->input->post('actress'.$i);
				$actresspic[$i]=time().$_FILES['actresspic'.$i]['name'];
				$actresspath="../Big_Screen/images/movie/actress/";
				move_uploaded_file($_FILES['actresspic'.$i]['tmp_name'],$actresspath.$actresspic[$i]);
				$sourceProperties = getimagesize($actresspath.$actresspic[$i]);
				$this->imagecheck($sourceProperties,$actresspath.$actresspic[$i]);
			}

			$mdirector=$this->input->post('mdirector');
			$language=$this->input->post('language');
			$category = implode(',',$this->input->post('caregory'));
			$description=$this->input->post('description');
			$cost=$this->input->post('cost');
			$filmposterpic=time().$_FILES['filmposterpic']['name'];
			$coverpic=time().$_FILES['coverpic']['name'];
			$posterpath="../Big_Screen/images/movie/poster/";
			$coverpath="../Big_Screen/images/movie/cover/";
			move_uploaded_file($_FILES['filmposterpic']['tmp_name'],$posterpath.$filmposterpic);
			move_uploaded_file($_FILES['coverpic']['tmp_name'],$coverpath.$coverpic);
			$sourceProperties = getimagesize($posterpath.$filmposterpic);
			$this->imagecheckposter($sourceProperties,$posterpath.$filmposterpic);

			$sourceProperties = getimagesize($coverpath.$coverpic);
			$this->imagecheckcover($sourceProperties,$coverpath.$coverpic);
			$directordata=implode(',', $director);
			$producordata=implode(',', $producer);
			$actordata=implode(',', $actor);
			$actressdata=implode(',', $actress);
			$directerpicdata=implode(',', $directorpic);
			$producerpicdata=implode(',', $producerpic);
			$actorpicdata=implode(',', $actorpic);
			$actresspicdata=implode(',', $actresspic);
			$data=array('mid'=>NULL,'distributor_id'=>$id,'film_name'=>$filmName1,'poster_pic'=>$filmposterpic,'cover_pic'=>$coverpic,'director'=>$directordata,'director_pic'=>$directerpicdata,'producer'=>$producordata,'producer_pic'=>$producerpicdata,'mdirector'=>$mdirector,'language'=>$language,'categories'=>$category,'actor'=>$actordata,'actor_pic'=>$actorpicdata,'actress'=>$actressdata,'actress_pic'=>$actresspicdata,'description'=>$description,'date'=>'2018','price'=>$cost);
			$this->dmodel->insertmovie($data);
			$username=$this->session->userdata('username');
			$this->session->set_flashdata('msg', 'Film Update Sucessfully');
			$this->distributoraddfilms();
		}
		else
		{
			$username=$this->session->userdata('username');
			$this->session->set_flashdata('msg', 'The Film Already Uploaded');
			$this->distributoraddfilms();
		}
	}

	function filmcategory()
	{
		$result['dis']=$this->dmodel->filmcategory();
		return $result;
	}

	//Film detailes view distributor
function filmviewdistributor()
{
		$lid=$this->session->userdata('id');
		$fid=$this->input->post('fid');
		if(isset($fid))
		{
			$result['dis']=$this->dmodel->filmsingle($fid);
			$this->load->view('distributor/distributor_film_single',$result);
		}
		else
		{
			$result['dis']=$this->dmodel->theatreaccepted($lid);
			$this->load->view('distributor/distributor_selectedfilmdetails',$result);
		}
	}

	function category($cat)
	{
		$result['dis']=$this->dmodel->category($cat);
		foreach ($result['dis'] as $row)
		{
			return $row->catname;
		}

	}

	function filmapprove()
	{
	$status=$this->input->post('status');
	$fid=$this->input->post('fid');
	$action=1;
	$a=$this->dmodel->filmapprove($fid,$action);
	$lid=$this->session->userdata('id');
	$result['dis']=$this->dmodel->filmsselect($lid);
	$this->load->view('distributor/distributor_selectedfilmdetails',$result);

	}
	function language($langu)
	{
		$a['dis']=$this->dmodel->language($langu);
		foreach($a['dis'] as $row)
		{
			$lname=$row->la_name;
			return $lname;
		}
	}
}
?>
