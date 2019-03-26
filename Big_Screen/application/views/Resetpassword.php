<?php
$CI =& get_instance();
$otp=$this->session->userdata('otp');
if($otp==123)
{
 ?>
<script>

function validate()
{
  var pass1=document.getElementById('password1').value;
  var pass2=document.getElementById('password2').value;
  if(pass1 != pass2)
  {
    document.getElementById('msgs').value="password not match";
    return false;
  }
}

</script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap" style="margin-top:10%"></div>
 <body style="overflow: hidden">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Reset Password !!</h2>
                  <p>Reset your password here.</p>
                  <div class="panel-body">
                    <?php
          					$s=$this->session->userdata('msg');
          					if($s!="")
          					{ echo "<font color='#FF0000'>".$s."</font>";
          					}
          					?>
                    <form id="register-form" role="form" class="form" method="post" action="<?php echo site_url('usercontroller/resetpassword')?>" onclick="return validate()">

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-cog color-blue"></i></span>
                          <input id="password1" name="password1" placeholder="Enter New Password" class="form-control"  type="password" required="Must fill the password">
                        </div>
                        <p id="msgs"></p>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-cogs color-blue"></i></span>
                          <input id="password2" name="password2" placeholder="Enter Confirm Password" class="form-control"  type="password" required="Must fill the Confirm password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>

                      <input type="hidden" class="hide" name="token" id="token" value="">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php
}
else
{
$CI->index();
}

 ?>
