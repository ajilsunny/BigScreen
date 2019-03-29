<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>
<script>

function dist()
{
  var state=document.getElementById('state').value;
  var data=new FormData();
  data.append('sid',state);
  $.ajax({
    method:'post',
    url:"<?php echo site_url("usercontroller/districtselect"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
    //alert(result);
       var r=JSON.parse(result);
       //alert(r[0]);
       $('#district').html("<option value=0>"+"Select District"+"</option>");

       for(i=0;i<r.length;i++){
         $('#district').append("<option value="+r[i].id+">"+r[i].value+"</option>");
       }
         //$('#district').append("<option value="+result+">"+result+"</option>");
         //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
        }
  });
}

</script>
<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">

  <br>
  <h1 align="center"  style="color: aliceblue;font-size: 300%">Add Theatre Profile</h1><br>
  <div class="container">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td colspan="1" class="col-xs-6">
                     <form class="well form-horizontal" method="post" action="<?php echo site_url('tcontroller/theatredetailesinsert');?>" enctype="multipart/form-data" onsubmit="return adddetailes()">
                        <fieldset>
                           <div class="form-group">
                              <label class="col-xs-4 control-label">Theatre Name</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vfilm" style="color:red;"></P>
                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                                   <input id="TheatreName" name="TheatreName" placeholder="Theatre Name" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase();"></div>
                              </div>
                           </div>
                             <div class="form-group">
                              <label class="col-xs-4 control-label">Theatre Profle photo</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vposterpic" style="color:red;"></P>
                                 <div class="input-group"><input id="theatreprofilepic" accept=".png, .jpg, .jpeg,.JPG" name="theatreprofilepic"  type="file" style="font-size: 120%; "></div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-xs-4 control-label">Theatre Cover Picture</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vcoverpic" style="color:red;"></P>
                                  <div class="input-group"><input id="theatrecoverpic" name="theatrecoverpic" accept=".png, .jpg, .jpeg" Director type="file" style="font-size: 120%"></div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-xs-4 control-label">Number of Screens</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vfilm" style="color:red;"></P>
                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                                   <input id="Theatrescreen" name="theatrescreen" placeholder="Number of Screens" class="form-control" min=1 type="number" value="1"></div>
                              </div>
                           </div>
                        <div>
                           <div class="form-group">
                              <label class="col-xs-4 control-label">Email</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vdirector0" style="color:red;"></P>
                                 <div class="input-group"><span class="input-group-addon" >
                                   <i class="glyphicon glyphicon-envelope"></i></span>
                                   <div><input style="width:100%"  id="email" name="email" placeholder="Enter Theatre Email" class="form-control" type="text">

                                 </div>
                               </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-xs-4 control-label">Phone</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vproducer0" style="color:red;"></P>
                                 <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                   <input id="Phone" name="Phone" style="width:100%" placeholder="Enter Theatre Phone Number" class="form-control" type="text">
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-xs-4 control-label">Theatre Type</label>
                              <div class="col-xs-8 inputGroupContainer">
                                <p id="vcost" style="color:red;"></P>
                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
                                   <input id="type" name="type" placeholder="Selling Cost" class="form-control" Director type="text"></div>
                              </div>
                           </div>

                           </div>
                        </fieldset>
                        </td>
                            <td colspan="1" class="col-xs-6">
                               <div class="well form-horizontal">
                                  <fieldset>

                                    <div class="form-group">
                                       <label class="col-xs-4 control-label">State</label>
                                       <div class="col-xs-8 inputGroupContainer">
                                         <p id="vmusic" style="color:red;"></P>
                                          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                            <select name="state" id="state" class="form-control" onchange="return dist()" >
                          									<option value="0">Select State</option>
                          									<?php
                                            $state=$CI->state() ;
                          									foreach($state as $row)
                          										{
                          											$id=$row->id;
                          											$name=$row->sname;
                          											?>
                          											<option value="<?php echo $id;?>"><?php echo $name ?></option>
                          										<?php
                          										}
                          										?>
                          									</select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-xs-4 control-label">District</label>
                                       <div class="col-xs-8 inputGroupContainer">
                                          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-flash"></i></span>
                                            <select name="district" id="district" class="form-control" >
                          										<option value="0">Select District</option>
                          									</select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-xs-4 control-label">Place</label>
                                       <div class="col-xs-8 inputGroupContainer">
                                         <p id="vcost" style="color:red;"></P>
                                          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                            <input id="Place" name="Place" placeholder="Theatre Place" class="form-control" Director type="text"></div>
                                       </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-xs-4 control-label">Description</label>
                                        <div class="col-xs-8 inputGroupContainer">
                                          <p id="vdescription" style="color:red;"></P>
                                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
            								               <textarea cols="39%" rows="8%" name="description" id="description" placeholder="  Enter Description"></textarea></div>
                                        </div>
                                     </div>

                                  </fieldset><br>
                                  <div class="" style="width: 100%;background-color: #FF6600;height: 50%">
                                  <input class="butsubmit" type="submit" value="Add" name="addfilm" >
                                  </div><center>
                                  <font color="#FF0004" >
                        						<?php
                        							$msg=$this->session->flashdata('msg');
                        							echo($msg);
                        						?>
                                 </font></center>
                                 </div>
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
      </div><br>



</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
