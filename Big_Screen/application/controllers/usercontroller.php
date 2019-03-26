<?php
class Usercontroller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		$this->load->model('amodel');
		$this->load->helpers(array('url','form'));
		$this->load->library(array('session','upload'));
	}

	//NORMAL USER
function index()
{
$result['dis']=$this->Mymodel->states();
$this->load->view('home',$result);
}

function about()
{
$result['dis']=$this->Mymodel->states();
$this->load->view('about');
}
function contact()
{
$result['dis']=$this->Mymodel->states();
$this->load->view('contact');
}

function forgotpassword()
{
$result['email']="";
$this->load->view('forgotpassword',$result);
}
function countall($a)
{
$userreg=$this->amodel->countlist($a);
return($userreg);
}
function logout()
{
$this->session->unset_userdata(array('id'=> "",'username'=> "",'password'=>""));
$this->session->sess_destroy();
$this->index();

}

// function uindex()
// {
// 	$uname=$this->session->userdata('username');
// 	$result['dis']=$this->Mymodel->disuser($uname);
// 	$this->load->view('user_home',$result);
// }
function aindex()
{
$uname=$this->session->userdata('username');
$this->load->view('admin_home',$uname);
}
function dindex()
{
$uname=$this->session->userdata('username');
$this->load->view('donor_home',$uname);
}
//END NORMAL USER

//State selection
function states()
{
$result1['dis']=$this->Mymodel->states();
$this->load->view('Header',$result1);
}

//Theatre page


//end Theatre page

//user PAGES
function userhome()
{
$result['dis']=$this->Mymodel->allfilms();
$this->load->view('user_home',$result);
}
function userprofile()
{
	$username=$this->session->userdata('username');
	$result['dis']=$this->Mymodel->disuser($username);
	$this->load->view('user_profile',$result);
}
function englishfilms()
{
	$language='English';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function malayalamfilms()
{
	$language='Malayalam';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function hindifilms()
{
	$language='Hindi';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function kannadafilms()
{
	$language='Kannada';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function tamilfilms()
{
	$language='Tamil';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function telugufilms()
{
	$language='Telugu';
	$result['dis']=$this->Mymodel->selectfilm($language);
	$this->load->view('user_choosefilms',$result);
}
function usercontact()
{
	$this->load->view('user_contact');
}
//end user page

function forgotpasswordemailcheck()
{
	$email=$this->input->post('email');
	$result['id']=$this->Mymodel->forgotpasswordemailcheck($email);
	if(!$result['id'])
	{
		$this->session->set_userdata('msg','Email not registered ...!!');
		$this->forgotpassword();
	}
	else
	{
		$otp=rand(111111,999999);
		$from_email = "edusat999@gmail.com";
		$this->load->library('email');

				$this->email->from($from_email, 'BIG SCREEN');
        $this->email->to($email);
        $this->email->subject('Reset password');
        $this->email->message('We received a request to reset your BIG SCREEN password. Click here to change your password. Alternatively, you can enter the following password reset code:  '. $otp);

				if($this->email->send())
				{
				$this->session->set_userdata('email',$email);
				$result['email']=$this->Mymodel->forgotpasswordnmrinsert($email,$otp);
        $this->session->set_flashdata("msg","OTP sent your email.");
				$this->session->set_userdata('count',0);
				$this->load->view('forgotpassword',$result);
			 }
         else
         $this->session->set_flashdata("msg","Error in sending Email.");
         $this->forgotpassword();
	}
}

function otpcheck()
{

	$emaildb=$this->session->userdata('email');
	$otp=$this->input->post('otp');
	$result['email']=$this->Mymodel->otpcheck($emaildb,$otp);
	if($result['email'])
	{
		$this->session->set_userdata('otp',123);
		$this->load->view('Resetpassword');
	}
	else
	{
		$count=$this->session->userdata('count');
		if($count==3)
		{
			$this->Mymodel->otplimit($emaildb);
			$count=0;
			$this->session->set_flashdata("msg","Forgot password process is failed");
			$this->forgotpassword();
		}
		$count++;
		$this->session->set_userdata('count',$count);
		$this->session->set_flashdata("msg","Invalid OTP ");
		$result['email']="hi";
		$this->load->view('forgotpassword',$result);
	}
}

function resetpassword()
{
	$email=$this->session->userdata('email');
	$password=$this->input->post('password1');

	$this->Mymodel->updatepassword($email,$password);
	$this->session->sess_destroy();
	$this->session->set_flashdata("msg","Password reset Successful");
	$this->index();
}
	//REGISTRATION ACTION
function insert()
{
	$name=$this->input->post('Name');
	if(isset($name))
	{
				$email=$this->input->post('Email');
				$phone=$this->input->post('Phone');
				$type=$this->input->post('Type');
				$did=$this->input->post('district');
				$place=$this->input->post('Place');
				$pin=$this->input->post('Pin');
				$cpassword=$this->input->post('psw2');
				$pass=md5($cpassword);
				$result['id']=$this->Mymodel->checkreguser($email);
				if(!$result['id'])
				{
					$folderPath = "../Big_Screen/images/certificate/";
					$cimage =  time().$_FILES['cpic']['name'];
					move_uploaded_file($_FILES['cpic']['tmp_name'],$folderPath.$cimage);

					$data=array('regid'=>NULL,'name'=>$name,'email'=>$email,'phone'=>$phone,'did'=>$did,'place'=>$place,'pin'=>$pin,'profile_pic'=>'profilepic.png','cpic'=>$cimage);
					$this->Mymodel->insertdetails($data);
					if($type=='1')
					{
						$data1=array('lid'=>NULL,'username'=>$email,'password'=>$pass,'type'=>$type,'lstatus'=>'0');
						$this->Mymodel->insertlogin($data1);
					}
					else
					{
						$data1=array('lid'=>NULL,'username'=>$email,'password'=>$pass,'type'=>$type,'lstatus'=>'1');
						$this->Mymodel->insertlogin($data1);
					}
					$this->session->set_userdata('msg','Registration Succesfull!!');
					$result['dis']=$this->Mymodel->states();
					$this->load->view('home',$result);
				}
				else
				{
					$this->session->set_userdata('msg','User already exist...!!');
					$result['dis']=$this->Mymodel->states();
					$this->load->view('home',$result);
				}
		}
		else
		{
			$this->index();
		}
}
//END REGISTRATION


	//LOGIN ACTION
function loginn()
{
	$username=$this->input->post('Username');
	if(isset($username))
	{
			$password1=$this->input->post('Password');
			$password=md5($password1);
			$loginresult['login']=$this->Mymodel->loguser($username,$password);
			if(!$loginresult['login'])
			{
				$this->session->set_userdata('msg','Username or Password Wrong...!!');
				$this->load->view('home');
			}
			else
			{
				foreach($loginresult['login'] as $row)
				{
					$lid=$row->lid;
					$name=$row->name;
					$username=$row->username;
					$password=$row->password;
					$type=$row->type;
					$status=$row->lstatus;
					if($status=='2')
					{
						$this->session->set_userdata('msg','Blocked login..!!');
						$this->load->view('home');
					}
					else
					{
						if($type=='0')
						{
							$data= array('id'  => $lid, 'name' => $name, 'username'=> $username,'password'=>$password);
							$this->session->set_userdata($data);
							$this->load->view('admin/admin_home');
						}
						else if($type=='1')
						{
							$data= array('id'  => $lid, 'name' => $name, 'username'=> $username,'password'=>$password);
							$this->session->set_userdata($data);
							$result['dis']=$this->Mymodel->allfilms();
							$this->load->view('user_home',$result);
						}
						else if($type=='2')
						{
							$data= array('id'  => $lid, 'name' => $name, 'username'=> $username,'password'=>$password);
							$this->session->set_userdata($data);

							$result['dis']=$this->Mymodel->disuser($username);
							$this->load->view('theatre/theatre_home',$result);
						}
						else
						{
							$data= array('id'  => $lid, 'name' => $name, 'username'=> $username,'password'=>$password);
							$this->session->set_userdata($data);
							$result['dis']=$this->Mymodel->disuser($username);
							$this->load->view('distributor/distributor_home',$result);
						}

					}
				}
			}
		}
		else
		{
			$this->load->view('home');
		}
}
//END LOGIN

	//END distributor

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

	//DISPLAY USER LIST
function listdisplay()
{
	$display['dis']=$this->Mymodel->diss();
	$this->load->view('list',$display);
}

	//Film detailes view distributor
function filmviewdistributor()
{
		$lid=$this->session->userdata('id');
		$fid=$this->input->post('fid');
		if(isset($fid))
		{
			$result['dis']=$this->Mymodel->filmsingle($fid);
			$this->load->view('distributor_film_single',$result);
		}
		else
		{
			$result['dis']=$this->Mymodel->theatreaccepted($lid);
			$this->load->view('distributor_selectedfilmdetails',$result);
		}
	}
	//films view in theaters
function filmviewtheatres()
{
	$lid=$this->session->userdata('id');
	$fid=$this->input->post('fid');
	if(isset($fid))
	{
		$result['dis']=$this->Mymodel->filmsingle($fid);
		$this->load->view('theatre_selected_single',$result);
	}
	else
	{

			$result['dis']=$this->Mymodel->theatreaccepted($lid);
			$this->load->view('theatre_acceptedfilms',$result);
	}
}

	
	//updeate distributor profile
function user_profile_edit()
{
		$email=$this->input->post('email');
		if(isset($email))
		{
			$result['dis']=$this->Mymodel->disuser($email);
			$this->load->view('user_editprofile',$result);
		}
		else {
			$username=$this->session->userdata('username');
			$result['dis']=$this->Mymodel->disuser($username);
			$this->load->view('user_profile',$result);
		}
	}


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
$username=$this->session->userdata('username');
$result['dis']=$this->Mymodel->disuser($username);
$this->load->view('theatre_profile',$result);
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
	$this->Mymodel->update_profile($data,$email);
	$result['dis']=$this->Mymodel->disuser($email);
	$this->session->set_userdata('name',$name);
	$this->load->view('theatre_profile',$result);
}
else
{
	$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
	$this->Mymodel->update_profile($data,$email);
	$result['dis']=$this->Mymodel->disuser($email);
	$this->load->view('theatre_profile',$result);
}
}
}
else
{
$username=$this->session->userdata('username');
$result['dis']=$this->Mymodel->disuser($username);
$this->load->view('theatre_profile',$result);
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
$result['dis']=$this->Mymodel->disuser($username);
$this->load->view('user_profile',$result);
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
	$this->Mymodel->update_profile($data,$email);
	$result['dis']=$this->Mymodel->disuser($email);
	$this->session->set_userdata('name',$name);
	$this->load->view('user_profile',$result);
}
else
{
	$data=array('name'=>$name,'phone'=>$phone,'place'=>$place,'pin'=>$pin);
	$this->Mymodel->update_profile($data,$email);
	$result['dis']=$this->Mymodel->disuser($email);
	$this->load->view('user_profile',$result);
}
}
}
else
{
$username=$this->session->userdata('username');
$result['dis']=$this->Mymodel->disuser($username);
$this->load->view('user_profile',$result);
}
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
function districtselect()
{
$distt= array();
$ii=0;
$sid=$this->input->post('sid');
$dist['dis']=$this->Mymodel->districtselect($sid);
foreach($dist['dis'] as $row)
{
$did=$row->did;
$dname=$row->dname;
$distt[$ii]['id']=$did;
$distt[$ii]['value']=$dname;

$ii++;
//echo $did;

}
echo json_encode($distt);
}

function filmbookrequest()
{

$mid=$this->input->post('mid');
$lid=$this->input->post('lid');
$date=date("Y/m/d");
//$data1=array('lid'=>NULL,'username'=>$email,'password'=>$pass,'type'=>$type,'status'=>'1');
$data=array('fs_id'=>NULL,'mid'=>$mid,'lid'=>$lid,'status'=>'0','date'=>$date);
$a['dis']=$this->Mymodel->filmbookstatus($data,$mid,$lid);
foreach($a['dis'] as $row)
{
$fid=$row->status;
echo $fid;
}
}

function filmapprove()
{
$status=$this->input->post('status');
$fid=$this->input->post('fid');
$action=1;
$a=$this->Mymodel->filmapprove($fid,$action);
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->filmsselect($lid);
$this->load->view('distributor_selectedfilmdetails',$result);

}

function filmbookrequestcancel()
{
$mid=$this->input->post('mid');
$lid=$this->input->post('lid');
//$data1=array('lid'=>NULL,'username'=>$email,'password'=>$pass,'type'=>$type,'status'=>'1');
$data=array('mid'=>$mid,'lid'=>$lid);
$a=$this->Mymodel->filmbookstatuscancel($data);
echo $a;
}

function bookstatus($mid,$lid)
{
$a['dis']=$this->Mymodel->bookstatus($mid,$lid);
foreach($a['dis'] as $row)
{
$fid=$row->status;
return $fid;
}
}

function bankpayment()
{
$mid = $this->input->post('mid');
if(isset($mid))
{
$result['dis']=$this->Mymodel->paymentfilm($mid);
$this->load->view('bank_payment',$result);
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theatreaccepted($lid);
$this->load->view('theatre_acceptedfilms',$result);
}
}

function payment()
{
$bank = $this->input->post('banktype');
if(isset($bank))
{
$cardnumber = $this->input->post('cardnumber');
$month = $this->input->post('month');
$year = $this->input->post('year');
$cardCVV = $this->input->post('cardCVV');
$holdername = $this->input->post('holdername');
$price = $this->input->post('price');
$mid = $this->input->post('mid');
$lid=$this->session->userdata('id');
$data=array('banktype'=>$bank,'card_no'=>$cardnumber,'month'=>$month,'year'=>$year,'cvv'=>$cardCVV,'name'=>$holdername);
$count['dis']=$this->Mymodel->payment($data);
if($count['dis'])
{
foreach ($count['dis'] as $row)
{
$bankid=$row->bid;
$amount=$row->amount;
if($amount > $price)
{
	$balance=$amount - $price;
	$count1['dis1']=$this->Mymodel->select_id($mid,$lid);
	foreach ($count1['dis1'] as $row1)
	{
		$fs_id=$row1->fs_id;
		$this->Mymodel->select_film_status($fs_id);
		$this->Mymodel->update_bank_balabce($balance,$bankid);
		echo "<script>alert('Payment Successful')</script>";
		$result['dis']=$this->Mymodel->theatrebooked($lid);
		$this->load->view('theatre_bookedfilms',$result);
	}
}
else
{
	echo "<script>alert('Account contain insufficient balance')</script>";
	$lid=$this->session->userdata('id');
	$result['dis']=$this->Mymodel->theatreaccepted($lid);
	$this->load->view('theatre_acceptedfilms',$result);
}
}
}
else
{
echo "<script>alert('Payment Card Details Incorrect')</script>";
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theatreaccepted($lid);
$this->load->view('theatre_acceptedfilms',$result);
}
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theatreaccepted($lid);
$this->load->view('theatre_acceptedfilms',$result);
}
}

function theaterseatingadd()
{
$lid=$this->session->userdata('id');
$c_rows = $this->input->post('c_rows');
if(isset($c_rows))
{
$c_column = $this->input->post('c_column');
$c_price = $this->input->post('c_price');
$l_rows = $this->input->post('l_rows');
$l_column = $this->input->post('l_column');
$l_price = $this->input->post('l_price');
$b_rows = $this->input->post('b_rows');
$b_column = $this->input->post('b_column');
$b_price = $this->input->post('b_price');
$shows = $this->input->post('shows');
$time1 = $this->input->post('time1');
$time2 = $this->input->post('time2');
$time3 = $this->input->post('time3');
$time4 = $this->input->post('time4');
$time5 = $this->input->post('time5');
$data=array('lid'=>$lid,'c_row'=>$c_rows,'c_column'=>$c_column,'c_price'=>$c_price,'l_rows'=>$l_rows,'l_column'=>$l_column,'l_price'=>$l_price,'b_rows'=>$b_rows,'b_column'=>$b_column,'b_price'=>$b_price,'no_of_shows'=>$shows,'time1'=>$time1,'time2'=>$time2,'time3'=>$time3,'time4'=>$time4,'time5'=>$time5,'status'=>'0');
$this->Mymodel->theaterseatingadd($data);
$result['dis']=$this->Mymodel->seatingselection($lid);
$this->load->view('theatre_seating',$result);
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->seatingselection($lid);
$this->load->view('theatre_seating',$result);
}
}

function seatingselection()
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->seatingselection($lid);
return $result;
}

function theaterseatingedit()
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theaterseatingedit($lid);
$this->load->view('theatre_seating',$result);
}

function theaterseatingupdate()
{
$lid=$this->session->userdata('id');
$c_rows = $this->input->post('c_rows');
if(isset($c_rows))
{
$c_column = $this->input->post('c_column');
$c_price = $this->input->post('c_price');
$l_rows = $this->input->post('l_rows');
$l_column = $this->input->post('l_column');
$l_price = $this->input->post('l_price');
$b_rows = $this->input->post('b_rows');
$b_column = $this->input->post('b_column');
$b_price = $this->input->post('b_price');
$shows = $this->input->post('shows');
$time1 = $this->input->post('time1');
$time2 = $this->input->post('time2');
$time3 = $this->input->post('time3');
$time4 = $this->input->post('time4');
$time5 = $this->input->post('time5');
$data=array('lid'=>$lid,'c_row'=>$c_rows,'c_column'=>$c_column,'c_price'=>$c_price,'l_rows'=>$l_rows,'l_column'=>$l_column,'l_price'=>$l_price,'b_rows'=>$b_rows,'b_column'=>$b_column,'b_price'=>$b_price,'no_of_shows'=>$shows,'time1'=>$time1,'time2'=>$time2,'time3'=>$time3,'time4'=>$time4,'time5'=>$time5,'status'=>'0');
$this->Mymodel->theaterseatingupdate($data,$lid);
$result['dis']=$this->Mymodel->seatingselection($lid);
$this->load->view('theatre_seating',$result);
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->seatingselection($lid);
$this->load->view('theatre_seating',$result);
}
}

function runningfilmtime()
{
$mid = $this->input->post('fid');
if(isset($mid))
{
$result['dis']=$this->Mymodel->filmrunningtime($mid);
$this->load->view('theatre_filmtimesetting',$result);
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theatrebooked($lid);
$this->load->view('theatre_runningtime',$result);
}
}

function countapprove($a)
{
$approve=$this->amodel->countapproval($a);
return($approve);
}

function runningtimeadd()
{
$mid = $this->input->post('mid');
if(isset($mid))
{
$noofshows= $this->input->post('noofshows');
$lid=$this->session->userdata('id');
$time1 = $this->input->post('time1');
$time2 = $this->input->post('time2');
$time3 = $this->input->post('time3');
$time4 = $this->input->post('time4');
$time5 = $this->input->post('time5');
if(!isset($time1)){	$time1='00:00';	}
if(!isset($time2)){	$time2='00:00';	}
if(!isset($time3)){	$time3='00:00';	}
if(!isset($time4)){	$time4='00:00';	}
if(!isset($time5)){	$time5='00:00';	}
$data=array('mid'=>$mid,'lid'=>$lid,'no_of_shows'=>$noofshows,'time1'=>$time1,'time2'=>$time2,'time3'=>$time3,'time4'=>$time4,'time5'=>$time5,'status'=>'1');
$result['dis']=$this->Mymodel->runningtimeadd($data,$lid);
$this->load->view('theatre_runningtime',$result);

}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->theatrebooked($lid);
$this->load->view('theatre_filmtimesetting',$result);
}

}

function showrunningfilmtime()
{
$lid=$this->session->userdata('id');
$mid = $this->input->post('fid');
if(isset($mid))
{
$result['dis']=$this->Mymodel->showrunningmoviedetailes($lid,$mid);
$this->load->view('theatre_filmtimeshow',$result);
}
else
{
$lid=$this->session->userdata('id');
$result['dis']=$this->Mymodel->tfilmrunningtime($lid);
$this->load->view('theatre_runningtime',$result);
}
}



function ForgotPass()
{
$email = $this->input->post('email');
$findemail = $this->Mymodel->ForgotPassword($email);
if ($findemail)
{
$this->Mymodel->sendpassword($findemail);
}
else
{
echo "<script>alert(' $email not found, please enter correct email id')</script>";
redirect('controller/login');
}
}

function myprof()
{
$this->load->view('user');
}



}

?>
