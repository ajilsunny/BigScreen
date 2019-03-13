<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">

  <?php
    foreach($dis as $row)
    {
      $name=$row->name;
      $email=$row->email;
      $phone=$row->phone;
      $place=$row->place;
      $pin=$row->pin;
      $profile_pic=$row->profile_pic;
    }
    ?>
  <!-- Include the above in your HEAD tag ---------->

  <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
              <div class="panel-heading">
                <center><h3 style="color:black"><b>Profile</b></h3></center>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class=" col-md-12 col-xs-12 ">
                    <div class="col-md-12 col-lg-12 " align="center"><img alt="User Pic" src="../../images/profile/<?php echo $profile_pic ?>" class="img-circle img-responsive"> </div>
                    <form action="<?php echo site_url('usercontroller/theatre_profile_edit') ?>" method="post">
                    <table class="table table-user-information" style="font-size:23px;">
                      <tbody>
                        <tr>
                          <td style="color:black">Name</td>
                          <td style="color:black">: <?php echo $name ?></td>
                        </tr>
                        <tr >
                          <td style="color:black">Email</td>
                          <td style="color:black">: <a href=""><?php echo $email ?></a></td>
                        </tr>
                        <tr>
                          <td style="color:black">Phone</td>
                          <td style="color:black">: <?php echo $phone ?></td>
                        </tr>
                        <tr>
                          <td style="color:black">Place</td>
                          <td style="color:black">: <?php echo $place ?></td>
                        </tr>
                          <tr>
                          <td style="color:black">Pin Code</td>
                          <td style="color:black">: <?php echo $pin ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <span class="pull-right">
                      <input type="hidden" name="email" value="<?php echo $email ?>" >
                    <button type="submit"class="btn btn-primary btn-sm btn-warning" title="Edit this Profile" ><i class="glyphicon glyphicon-edit"></i></button>
                    </span>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
