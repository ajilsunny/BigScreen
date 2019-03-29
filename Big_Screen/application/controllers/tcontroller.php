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
	function addtheatre()
	{
		  $this->load->view('theatre/theatre_add_theatres');
	}
	function theatre_screens()
	{
		$tid=$this->input->post('tid');
		$result['dis']=$this->tmodel->theatrescreens($tid);
		$result['tid']=$tid;
	  $this->load->view('theatre/theatre_screen',$result);
	}
  function theatreseating()
  {
		$tid=$this->input->post('tid');
		$screen=$this->input->post('screen');;
	  $result['dis']=$this->tmodel->theatreseating($tid,$screen);
		$result['tid']=$tid;
		$result['screen']=$screen;
	  $this->load->view('theatre/theatre_seating',$result);
  }
	function  theatre_profile_seating()
	{
		$lid=$this->session->userdata('id');
	  $result['dis']=$this->tmodel->theatreprofiles($lid);
	  $this->load->view('theatre/seating_arrangement_theatres',$result);
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
  function theatreprofile()
  {
		$lid=$this->session->userdata('id');
	  $result['dis']=$this->tmodel->theatreprofiles($lid);
  	$this->load->view('theatre/theatres_profile',$result);
  }
  function theatreownerprofile()
  {
  $username=$this->session->userdata('username');
  $result['dis']=$this->tmodel->disuser($username);
  $this->load->view('theatre/theatre_owner_profile',$result);
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
			$this->theatreownerprofile();
		}
	}

	// function theatresetseats()
	// {
	// 	$seat[]=$this->input->post('seat');
	// 	$catname[]=$this->input->post('catname');
	// 	$catrow[]=$this->input->post('catrow');
	// 	$catprice[]=$this->input->post('catprice');
	//
	// 	 $seats = implode(',', $seat);
	// 	 $catnames= implode(',', $catname);
	// 	 $catrows= implode(',', $catrow);
	// 	 $catprices= implode(',', $catprice);
	//
	// 	 $data=array('lid'=>NULL,'username'=>$email,'password'=>$pass,'type'=>$type,'lstatus'=>'0');
	// 	 $this->Mymodel->insertlogin($data );
	// }

	//update theatre profile
	function theatre_profile_update()
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

	$this->theatreownerprofile();
	}
	else
	{
	if($_FILES['profilepic']['name'] !=="")
	{
		$p=$_FILES['profilepic']['name']	;
		$folderPath = "../Big_Screen/images/profile/";
		$image =  time().$_FILES['profilepic']['name'];
		move_uploaded_file($_FILES['profilepic']['tmp_name'],$folderPath.$image);
		$sourceProperties = getimagesize($folderPath.$image);
		$ext = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
		$this->imagecheck($sourceProperties,$folderPath.$image);
		$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin,'profile_pic'=>$image);
		$this->tmodel->update_profile($data,$email);
		$this->session->set_userdata('name',$name);
		$this->theatreownerprofile();
	}
	else
	{
		$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
		$this->tmodel->update_profile($data,$email);

		$this->theatreownerprofile();
	}
	}
	}
	else
	{
	$this->theatreownerprofile();
	}
	}

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

	function imageResizecover($imageResourceId,$width,$height)
	{
	$targetWidth =1280;
	$targetHeight =720;
	$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
	imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
	return $targetLayer;
	}

	function state()
	{
	$result['dis']=$this->tmodel->states();
	return $result['dis'];
	}

	function theatredetailesinsert()
	{
		$email=$this->input->post('email');
		$theatrename=$this->input->post('TheatreName');
		$res=$this->tmodel->checktheatre($theatrename,$email);
		if($res==0)
		{
			$theatre_profile_pic=time().$_FILES['theatreprofilepic']['name'];
			$theatre_path="../Big_Screen/images/theatreprofile/";
			move_uploaded_file($_FILES['theatreprofilepic']['tmp_name'],$theatre_path.$theatre_profile_pic);
			$sourceProperties = getimagesize($theatre_path.$theatre_profile_pic);
			$this->imagecheck($sourceProperties,$theatre_path.$theatre_profile_pic);

			$theatre_cover_pic=time().$_FILES['theatrecoverpic']['name'];
			$theatre_path="../Big_Screen/images/theatreprofile/";
			move_uploaded_file($_FILES['theatrecoverpic']['tmp_name'],$theatre_path.$theatre_cover_pic);
			$sourceProperties = getimagesize($theatre_path.$theatre_cover_pic);
			$this->imagecheckcover($sourceProperties,$theatre_path.$theatre_cover_pic);

			$screen=$this->input->post('theatrescreen');
			$Phone=$this->input->post('Phone');
			$type=$this->input->post('type');
			$district=$this->input->post('district');
			$Place=$this->input->post('Place');
			$description=$this->input->post('description');
			$lid=$this->session->userdata('id');

			$data=array('tid'=>NULL,'lid'=>$lid,'theatre_name'=>$theatrename,'t_pro_pic'=>$theatre_profile_pic,'t_cov_pic'=>$theatre_cover_pic,'t_email'=>$email,'t_phone'=>$Phone,'t_district'=>$district,'t_place'=>$Place,'t_description'=>$description,'t_screens'=>$screen,'t_status'=>0);
			$this->tmodel->inserttheatre($data);
			$this->theatreprofile();
		}
		else
		{
			$username=$this->session->userdata('username');
			$this->session->set_flashdata('msg', 'The Film Already Uploaded');
			$this->theatreprofile();
		}

	}

	function insertseating()
	{
		$catsname=array();
		$catsrow=array();
		$catsprice=array();
		$seat[]=$this->input->post('seatsets');
		$seatsets=$this->input->post('no_of_seatcategory');
		for ($i=1; $i <= $seatsets ; $i++)
		{
			$catsname[$i]=$this->input->post('cat_name'.$i);
			$catsrow[$i]=$this->input->post('cat_start'.$i);
			$catsprice[$i]=$this->input->post('cat_price'.$i);
		}

		$tid=$this->input->post('tid');
		$screen=$this->input->post('screen');
		$row=$this->input->post('row');
		$cols=$this->input->post('cols');
		$seats = implode(',', $seat);
		$catsnames = implode(',', $catsname);
		$catsrows = implode(',', $catsrow);
		$catsprices = implode(',', $catsprice);
		//
		$data=array('thid'=>NULL,'tid'=>$tid,'screen_no'=>$screen,'row'=>$row,'cols'=>$cols,'seat_arrangement'=>$seats,'classes_names'=>$catsnames,'class_rows'=>$catsrows,'class_amount'=>$catsprices,'status'=>0);
		$this->tmodel->insertseating($data);
		$this->theatre_profile_seating();


	}

}
