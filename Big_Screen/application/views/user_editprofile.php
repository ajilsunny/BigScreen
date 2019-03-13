<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('user_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/adminhome.jpg');?>);height:800px;width:auto;">

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

    <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
              <div class="panel panel-info">
                <div class="panel-heading">
                  <center><h3 style="color:black"><b>Edit Profile</b></h3></center>
                </div>
                <div class="panel-body">
                  <div class="row">
                  <form action="<?php echo site_url('usercontroller/user_profile_update') ?>" method="post" enctype="multipart/form-data">
                    <div class=" col-md-12 col-xs-12 ">
                      <div class="col-md-12 col-lg-12 " align="center"><img alt="User Pic" src="../../images/profile/<?php echo $profile_pic ?>" class="img-circle img-responsive avatar" height=200px width=200px> </div>
                        <div class="col-md-12 inputGroupContainer" align=right>
                           <div class="input-group"><input class="file-upload" id="profilepic" accept=".png, .jpg, .jpeg, .JPG" name="profilepic" type="file" style="font-size: 120%; "></div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Name</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="name" value="<?php echo $name ?>" class="form-control" required="" type="text"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Email</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span><input id="email" name="email" value="<?php echo $email ?>" class="form-control" disabled="disabled" type="text"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Phone</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span><input id="phone" name="phone" value="<?php echo $phone ?>" class="form-control" required="" type="text"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Place</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span><input id="place" name="place" value="<?php echo $place ?>" class="form-control" required="" type="text"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Pin Code</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input id="pin" name="pin" value="<?php echo $pin ?>" class="form-control" required="" type="text"></div>
                           </div>
                        </div>
                      <span class="pull-right">
                        <input type="hidden" name="email" value="<?php echo $email ?>" >
                        <button type="submit"class="btn btn-primary btn-sm btn-warning" title="Cancel" name="action" value="cancel" ><i class="fa fa-step-backward"></i></button>
                      <button type="submit"class="btn btn-primary btn-sm btn-warning" title="Edit this Profile" name="action" value="upload"><i class="fa fa-upload"></i></button>
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
    <script>
    $(document).ready(function() {


      var readURL = function(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('.avatar').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }


      $(".file-upload").on('change', function(){
          readURL(this);
      });
    });
    </script>



</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
