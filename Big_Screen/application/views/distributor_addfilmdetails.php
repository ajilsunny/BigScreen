<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('distributor_header.php');
?>
<script>
  function vali()
  {
    var language=document.getElementById('language').value;
  	if(language=='select')
  		{
  			alert("Select Language");
  			return false;
  		}
  }
</script>
<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto;">
<br>
<h1 align="center"  style="color: aliceblue;font-family: 'abril-fatface';font-size: 300%">Add New Films</h1><br>
<div class="container">
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="<?php echo site_url('usercontroller/moviedetailesinsert');?>" enctype="multipart/form-data" onsubmit="return vali()">
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Film</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span><input id="filmName" name="filmName" placeholder="Film Name" class="form-control" required="" type="text"></div>
                            </div>
                         </div>
                           <div class="form-group">
                            <label class="col-md-4 control-label">Film Poster</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><input id="filmposterpic" accept=".png, .jpg, .jpeg,.JPG" name="filmposterpic" required="" type="file" style="font-size: 120%; "></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Cover Picture</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><input id="coverpic" name="coverpic" accept=".png, .jpg, .jpeg,.JPG" required="" type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Director</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="Director" name="Director" placeholder="Director Name" class="form-control" required="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Director Pic</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><input id="Directorpic" name="Directorpic" accept=".png, .jpg, .jpeg,.JPG" required="" type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Producer</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span><input id="producer" name="producer" placeholder="Producer Name" class="form-control" required=""  type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Producer Pic</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><input id="producerpic" name="producerpic" accept=".png, .jpg, .jpeg,.JPG" required=""  type="file" style="font-size: 120%"></div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Music director</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-headphones"></i></span><input id="mdirector" name="mdirector" placeholder="Music director" class="form-control" required="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Language</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span><select id="language" name="language" placeholder="Singers" class="form-control">
                               	<option value="select">Select Language</option>
                               	<option value="English">English</option>
                               	<option value="Hindi">Hindi</option>
                               	<option value="Malayalam">Malayalam</option>
                               	<option value="Kannada">Kannada</option>
                               	<option value="Tamil">Tamil</option>
                               </select></div>
                            </div>
                         </div>
                      </fieldset>
                </td>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Actor</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-male"></i></span><input id="actor" name="actor" placeholder="Actor Name" class="form-control" required="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Actor Pic</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><input id="actorpic" name="actorpic" accept=".png, .jpg, .jpeg,.JPG" required="" type="file" style="font-size: 120%"></div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Actress</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-female"></i></span><input id="actress" name="actress" placeholder="Actress Name" class="form-control" required="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Actress Pic</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><input id="actresspic" name="actresspic" accept=".png, .jpg, .jpeg,.JPG"  required="" type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
								<textarea cols="39%" rows="10%" name="description" id="description" placeholder="  Enter Description" required></textarea></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Cost</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span><input id="cost" name="cost" placeholder="Selling Cost" class="form-control" required="" type="text"></div>
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
