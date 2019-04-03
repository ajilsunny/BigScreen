<?PHP
class acontroller extends CI_Controller
{
	function __construct()

	{
		parent::__construct();
		$this->load->model('amodel');
		$this->load->model('Mymodel');
		$this->load->helpers(array('url','form'));
		$this->load->library(array('session','upload'));
	}

	//ADMIN PAGES
	function index()
	{
		$this->load->view('admin/admin_home');
	}

	function theatreapproval()
	{
		$type='2';
		$result['theatres']=$this->amodel->approvetheatrelist($type);
		$this->load->view('admin/admin_theatreapprove',$result);
	}

	function distributorapproval()
	{
		$type='3';
		$result['distributor']=$this->amodel->approvedistributorlist($type);
		$this->load->view('admin/admin_distributorapprove',$result);
	}

	//distributor approval
	function approvedistributoraction()
	{
		$email=$this->input->post('blockid');
		$blockstatus=$this->input->post('blockstatus');
		if($blockstatus==1)
		{
			$action=0;
			$this->amodel->updateblock($email,$action);
			$this->distributorapproval();
		}
	}

	function theatrelist()
	{
		$type='2';
		$result['theatres']=$this->amodel->lists($type);
		$this->load->view('admin/admin_theatrelist',$result);
	}

	function userlist()
	{
		$type='1';
		$result['user']=$this->amodel->lists($type);
		$this->load->view('admin/admin_userslist',$result);
	}


	//USER BLOCK ACTION
	function blockuseraction()
	{
		$email=$this->input->post('blockid');
		$blockstatus=$this->input->post('blockstatus');
		if($blockstatus==2)
		{
			$action=0;
			$this->amodel->updateblock($email,$action);
			$this->userlist();
		}
		else
		{
			$action=2;
			$this->amodel->updateblock($email,$action);
				$this->userlist();
		}
	}
	//END USER BLOCK


	function distributorlist()
	{
		$type='3';
		$result['distributor']=$this->amodel->lists($type);
		$this->load->view('admin/admin_distributorlist',$result);
	}
	//THEATRE BLOCK ACTION
	function blocktheatreaction()
	{
		$email=$this->input->post('blockid');
		$blockstatus=$this->input->post('blockstatus');
		if($blockstatus==2)
		{
			$action=0;
			$this->amodel->updateblock($email,$action);
			$this->theatrelist();
		}
		else
		{
			$action=2;
			$this->amodel->updateblock($email,$action);
			$this->theatrelist();
		}
	}
	//END BLOCK ACTION

	//distributor BLOCK ACTION
	function blockdistributoraction()
	{
		$email=$this->input->post('blockid');
		$blockstatus=$this->input->post('blockstatus');
		if($blockstatus==2)
		{
			$action=0;
			$this->amodel->updateblock($email,$action);
			$this->distributorlist();
		}
		else
		{
			$action=2;
			$this->amodel->updateblock($email,$action);
			$this->distributorlist();
		}
	}
	//END distributor BLOCK


	function payment()
	{
		$this->load->view('admin/admin_payment');
	}

	function addnews()
	{
		$result['dis']=$this->amodel->newsupdate(0);
		$this->load->view('admin/admin_addnews',$result);
	}

	function dnews()
	{
		$result['list']=$this->amodel->newslist();
		$this->load->view('admin/admin_news',$result);
	}

	function contact()
	{
		$this->load->view('admin/admin_contact');
	}
	//END ADMIN PAGES

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

	function countall($a)
	{
		$userreg=$this->amodel->countlist($a);
		return($userreg);
	}
function mainindex()
{
	$result['dis']=$this->Mymodel->states();
	$this->load->view('home',$result);
}
function countapprove($a)
{
	$approve=$this->amodel->countapproval($a);
	return($approve);
}

	//THEATRE approval
	function approvetheatreaction()
	{
		$email=$this->input->post('blockid');
		$blockstatus=$this->input->post('blockstatus');
		if($blockstatus==1)
		{
			$action=0;
			$this->amodel->updateblock($email,$action);
			$this->theatreapproval();
		}
	}
	//END approval THEATRE

	//UPLOAD NEWS
	function newsupload()
	{
		$heading=$this->input->post('heading');
		$res=$this->amodel->checknews($heading);
		if($res == 0)
		{
			$date=date("Y/m/d  h:i:sa");
			$description=$this->input->post('newsdescription');
			$image =  time().$_FILES['newsimage']['name'];
			$path='../Big_Screen/images/news/';
			move_uploaded_file($_FILES['newsimage']['tmp_name'],$path.$image);

			$sourceProperties = getimagesize($path.$image);
			$this->imagechecknews($sourceProperties,$path.$image);

			$data=array('nid'=>NULL,'heading'=>$heading,'photo'=>$image,'description'=>$description,'ndate'=>$date,'nstatus'=>0);
			$s=$this->amodel->insertnews($data);
			$this->session->set_flashdata('msg', 'News Added Sucessfully');
			$result['dis']=$this->amodel->newsupdate(0);
			$this->load->view('admin/admin_addnews',$result);
		}else{
			$this->session->set_flashdata('msg', 'The news already uploaded');
			$result['dis']=$this->amodel->newsupdate(0);
			$this->load->view('admin/admin_addnews',$result);
		}

	}

	function imagechecknews($sourceProperties,$path)
	{
		$imageType = $sourceProperties[2];
		switch ($imageType) {


			case IMAGETYPE_PNG:
			$imageResourceId = imagecreatefrompng($path);
			$targetLayer = $this->imageResizenews($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagepng($targetLayer,$path);
			break;


			case IMAGETYPE_GIF:
			$imageResourceId = imagecreatefromgif($path);
			$targetLayer = $this->imageResizenews($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagegif($targetLayer,$path);
			break;


			case IMAGETYPE_JPEG:
			$imageResourceId = imagecreatefromjpeg($path);
			$targetLayer =$this->imageResizenews($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
			imagejpeg($targetLayer,$path);
			break;


			default:
			echo "Invalid Image type.";
			exit;
			break;

		}
	}

	function imageResizenews($imageResourceId,$width,$height)
	{
		$targetWidth =236;
		$targetHeight =328;
		$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
		imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
		return $targetLayer;
	}


//UPDATE NEWS
	function newsupdate()
	{
		$head=$this->input->post('head');
		$heading=$this->input->post('heading');
		$res=$this->amodel->checknews($head);
		if($res == 1)
		{
			$nid=$this->input->post('nid');
			$date=date("Y/m/d  h:i:sa");
			$description=$this->input->post('newsdescription');
			if($_FILES['newsimage']['name'] !=="")
			{
					$image =  time().$_FILES['newsimage']['name'];
					$path="../Big_Screen/images/news/";
					move_uploaded_file($_FILES['newsimage']['tmp_name'],$path.$image);

					$sourceProperties = getimagesize($path.$image);
					$this->imagechecknews($sourceProperties,$path.$image);

					$data=array('heading'=>$heading,'photo'=>$image,'description'=>$description,'ndate'=>$date,'nstatus'=>0);
					$s=$this->amodel->updatenews($nid,$data);
					$this->session->set_flashdata('msg', 'News Update Sucessfully');
					$result['list']=$this->amodel->newslist();
					$this->load->view('admin/admin_news',$result);
				}
				else {
					$data=array('heading'=>$heading,'description'=>$description,'ndate'=>$date,'nstatus'=>0);
					$s=$this->amodel->updatenews($nid,$data);
					$this->session->set_flashdata('msg', 'News Update Sucessfully');
					$result['list']=$this->amodel->newslist();
					$this->load->view('admin/admin_news',$result);
				}
		}
		else
		{
			$this->session->set_flashdata('msg', 'The news already uploaded');
			$result['list']=$this->amodel->newslist();
			$this->load->view('admin/admin_news',$result);
		}
	}

	//NEWS VIEW CHANGE
	function newsviewchange()
	{

		$id=$this->input->post('id');
				$status=$this->input->post('status');
				$remove=$this->input->post('remove');
				$edit=$this->input->post('edit');
				if($remove=='Remove')
				{
					$this->amodel->removenews($id);
					$result['list']=$this->amodel->newslist();
					$this->load->view('admin/admin_news',$result);
				}
				else
				{
					$result['dis']=$this->amodel->newsupdate($id);
					$this->load->view('admin/admin_addnews',$result);
				}
			}
	//END VIEW CHANGE

//Search Theatres
function searchtheatre()
{
	$search=$this->input->post('search');
	$result['theatres']=$this->amodel->searchtheatre($search);
	$this->load->view('admin/admin_theatreapprove',$result);

}

//Search Distributor
function searchdistributor()
{
	$search=$this->input->post('search');
	$result['distributor']=$this->amodel->searchdistributor($search);
	$this->load->view('admin/admin_distributorapprove',$result);

}

//Search Theatre list
function searchtheatrelist()
{
	$search=$this->input->post('search');
	$result['theatres']=$this->amodel->searchtheatrelist($search);
	$this->load->view('admin/admin_theatrelist',$result);

}

//Search User list
function searchuserlist()
{
	$search=$this->input->post('search');
	$result['user']=$this->amodel->searchuserlist($search);
	$this->load->view('admin/admin_userslist',$result);
}

//Search Distributor list
function searchdistributorlist()
{
	$search=$this->input->post('search');
	$result['distributor']=$this->amodel->searchdistributorlist($search);
	$this->load->view('admin/admin_distributorlist',$result);
}

}
?>
