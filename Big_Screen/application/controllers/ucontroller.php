<?PHP
class ucontroller extends CI_Controller
{
	function __construct()

	{
		parent::__construct();
		$this->load->model('umodel');
		$this->load->model('Mymodel');
		$this->load->helpers(array('url','form'));
		$this->load->library(array('session','upload'));
	}
  function mainindex()
  {
    $result['dis']=$this->Mymodel->states();
  	$this->load->view('home',$result);
  }
  function userhome()
  {
  $result['dis']=$this->umodel->allfilms();
  $this->load->view('user/user_home',$result);
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
  function filmviewdetailed()
  {
    $fid=$this->input->post('fid');
    $result['dis']=$this->umodel->filmviewdetailed($fid);
    $this->load->view('user/user_filmview_detailes',$result);
  }
  function language($langu)
	{
		$a['dis']=$this->umodel->language($langu);
		foreach($a['dis'] as $row)
		{
			$lname=$row->la_name;
			return $lname;
		}
	}
  function category($cat)
	{
		$result['dis']=$this->umodel->category($cat);
		foreach ($result['dis'] as $row)
		{
			return $row->catname;
		}
	}
  function theatre_selection()
  {
		$result['dis']=$this->Mymodel->states();
		$result['mid']=$this->input->post('mid');
    $this->load->view('user/user_theatre_selection',$result);
  }
	function theatreselect()
	{
		$theatre=array();
		$i=0;
		$mid=$this->input->post('mid');
		$district=$this->input->post('district');
		$result['theaters']=$this->umodel->theatreselect($mid,$district);
		foreach ($result['theaters'] as $key)
		{
			$theatre[$i]=$key;
			$i++;
		}
		echo json_encode($theatre);
	}
function dateandtime_selection()
{
	$result['tid']=$this->input->post('tid');
	$result['runid']=$this->input->post('runid');
	$result['mid']=$this->input->post('mid');
	$result['screen']=$this->input->post('screen');
	$this->load->view('user/user_select_dateandtime',$result);
}
function showtime()
{
	$day=array();
	$res=array();
	$days=array();
	$dayss=array();
	$mid=$this->input->post('mid');
	$tid=$this->input->post('tid');
	$runid=$this->input->post('runid');
	$did=$this->input->post('did');
	$screen=$this->input->post('screen');
	$result['runt']=$this->umodel->runt($mid,$tid,$screen);

	foreach ($result['runt'] as $key)
	{
		$res=$key->showstime;
	}
	$kk=explode(",",$res);

for ($i=0; $i <sizeof($kk) ; $i++)
{
	$day[$i]=$this->umodel->day($kk[$i],$did);
	foreach ($day[$i] as $row)
	{
		$days=$row->show_time;
	}
}
if($days)
{
$dayss=explode(",",$days);
}
else
{
	$dayss=0;
}

	echo json_encode($dayss);
}

function theatreseating()
{
	$mid=$this->input->post('mid');
	$tid=$this->input->post('tid');
	$screen=$this->input->post('screen');
	$bookdate=$this->input->post('bookdate');
	$booktime=$this->input->post('booktime');
	$result['bookdate']=$bookdate;
	$result['booktime']=$booktime;
	$result['screen']=$screen;
	$result['mid']=$mid;
	$result['tid']=$tid;
	$result['name']=$lid=$this->session->userdata('name');
	$result['alocate']=$this->umodel->alocate($tid,$screen,$mid,$bookdate,$booktime);
	$result['dis']=$this->umodel->theatreseating($tid,$screen);
	$this->load->view('user/bookseats_arrangement',$result);
}

function bookseat()
{
	$mid=$this->input->post('mid');
	$tid=$this->input->post('tid');
	$bookdate=$this->input->post('bookdate');
	$booktime=$this->input->post('booktime');
	$screen=$this->input->post('screen');
	$amount=$this->input->post('amount');
	$seat=$this->input->post('seat');
	$lid=$this->session->userdata('id');
	$data=array('s_id'=>NULL,'lid'=>$lid,'tid'=>$tid,'mid'=>$mid,'screen'=>$screen,'date'=>$bookdate,'time'=>$booktime,'seat'=>$seat,'amount'=>$amount,'b_status'=>3);
	$seatid=$this->umodel->bookseat($data);
	echo json_encode($seatid);
}
function bookedcount()
{
	$lid=$this->session->userdata('id');
	$count=$this->umodel->bookedcount($lid);
	echo $count;
}

function seatcheck()
{
	$mid=$this->input->post('mid');
	$tid=$this->input->post('tid');
	$bookdate=$this->input->post('bookdate');
	$booktime=$this->input->post('booktime');
	$screen=$this->input->post('screen');
	$seat=$this->input->post('seat');
	$lid=$this->session->userdata('id');
	$data=array('tid'=>$tid,'mid'=>$mid,'screen'=>$screen,'date'=>$bookdate,'time'=>$booktime,'seat'=>$seat);
	$data1=array('lid'=>$lid,'tid'=>$tid,'mid'=>$mid,'screen'=>$screen,'date'=>$bookdate,'time'=>$booktime,'seat'=>$seat);
	$num=$this->umodel->seatcheck($data,$data1);
	echo json_encode($num);
}
function bookseat_bill()
{
	$result['name'] =$this->input->post('name');
	$result['seats'] =$this->input->post('seats');
	$result['total']=$this->input->post('total');
	$sbid=$this->input->post('sbid');
	$s=explode(",",$sbid);
	$result['dis']=$this->umodel->details($s[0]);
	foreach ($result['dis'] as $key)
	{
		$result['fname']=$key->film_name;
		$result['tname']= $key->theatre_name;
		$result['screen']= $key->screen;
		$result['date'] =$key->date;
		$result['time']= $key->time;
	}
	$result['sbid'] =$sbid;
	$this->load->view('user/bookseat_bill',$result);
}
function paymentpage()
{
	$result['seatname'] =$this->input->post('seatname');
	$result['seatid'] =$this->input->post('seatid');
	$result['totalamount'] =$this->input->post('totalamount');
	$this->load->view('user/payment',$result);
}

function payment()
{
	$lid=$this->session->userdata('id');
	$seatname =$this->input->post('seatname');
	$amount =$this->input->post('amount');
	$bank = $this->input->post('banktype');
	if(isset($bank))
	{
		$cardnumber = $this->input->post('cardnumber');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$cardCVV = $this->input->post('cardCVV');
		$holdername = $this->input->post('holdername');
		$price = $this->input->post('price');
		$data=array('banktype'=>$bank,'card_no'=>$cardnumber,'month'=>$month,'year'=>$year,'cvv'=>$cardCVV);
		$count['dis']=$this->umodel->payment($data);
		if($count['dis'])
		{
			$seatid =$this->input->post('seatid');
			$seatids =explode(",",$seatid);
			$data1=array('sid'=>NULL,'lid'=>$lid,'se_id'=>$seatid,'seat_name'=>$seatname,'total_amount'=>$amount);
			for ($i=0; $i <sizeof($seatids) ; $i++)
			{
				// echo $seatids[$i];
				$this->umodel->updatebooking($seatids[$i]);
			}
			$this->umodel->insertbooking($data1);
					echo "<script>alert('Payment Successful')</script>";
					$this->userhome();


		}
		else
		{
			echo "<script>alert('Payment Card Details Incorrect')</script>";
			$this->userhome();
		}
	}
	else
	{
		$this->userhome();
	}
}
function userprofile()
{
	$username=$this->session->userdata('username');
	$result['dis']=$this->umodel->disuser($username);
	$this->load->view('user/user_profile',$result);
}
function user_profile_edit()
{
		$email=$this->input->post('email');
		if(isset($email))
		{
			$result['dis']=$this->umodel->disuser($email);
			$this->load->view('user/user_editprofile',$result);
		}
		else {
			$username=$this->session->userdata('username');
			$result['dis']=$this->umodel->disuser($username);
			$this->load->view('user/user_profile',$result);
		}
	}
	function user_profile_update()
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
	$result['dis']=$this->umodel->disuser($username);
	$this->load->view('user/user_profile',$result);
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
		$this->umodel->update_profile($data,$email);
		$result['dis']=$this->umodel->disuser($email);
		$this->session->set_userdata('name',$name);
		$this->load->view('user/user_profile',$result);
	}
	else
	{
		$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
		$this->umodel->update_profile($data,$email);
		$result['dis']=$this->umodel->disuser($email);
		$this->load->view('user/user_profile',$result);
	}
	}
	}
	else
	{
	$username=$this->session->userdata('username');
	$result['dis']=$this->umodel->disuser($username);
	$this->load->view('user/user_profile',$result);
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

}
