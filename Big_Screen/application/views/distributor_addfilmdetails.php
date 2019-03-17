<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('distributor_header.php');
?>
<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto; overflow-y:hidden;overflow-x:scroll;">
<br>
<h1 align="center"  style="color: aliceblue;font-family: 'abril-fatface';font-size: 300%">Add New Films</h1><br>
<div class="container">
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1" class="col-xs-6">
                   <form class="well form-horizontal" method="post" action="<?php echo site_url('dcontroller/moviedetailesinsert');?>" enctype="multipart/form-data" onsubmit="return adddetailes()">
                      <fieldset>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Film</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vfilm" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                                 <input id="filmName" name="filmName" placeholder="Film Name" class="form-control" pattern="^[a-zA-Z]+$" type="text" onkeyup="this.value = this.value.toUpperCase();"></div>
                            </div>
                         </div>
                           <div class="form-group">
                            <label class="col-xs-4 control-label">Film Poster</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vposterpic" style="color:red;"></P>
                               <div class="input-group"><input id="filmposterpic" accept=".png, .jpg, .jpeg,.JPG" name="filmposterpic"  type="file" style="font-size: 120%; "></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Cover Picture</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vcoverpic" style="color:red;"></P>
                                <div class="input-group"><input id="coverpic" name="coverpic" accept=".png, .jpg, .jpeg,.JPG" Director type="file" style="font-size: 120%"></div>
                            </div>
                         </div>

                      <div>
                         <div class="form-group">
                           <input type="hidden" name="numdirector" id="numdirector" value="0">
                            <label class="col-xs-4 control-label">Director</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vdirector0" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon" >
                                 <i class="glyphicon glyphicon-user"></i></span>
                                 <div><input style="width:85%"  id="Director0" name="Director0" placeholder="Director Name" class="form-control" Director type="text">
                                 <input type="button" style="padding:3%;margin-left:5px;border-radius:10%;border:none" class="glyphicon glyphicon-plus" value="+" onclick="return adddirector()">
                               </div>
                             </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Director Pic</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vdirectorpic0" style="color:red;"></P>
                                <div class="input-group"><input id="Directorpic0" name="Directorpic0" accept=".png, .jpg, .jpeg,.JPG" Director type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                      </div>
                      <div id="directoradd" name="directoradd"></div>

                         <div class="form-group">
                           <input type="hidden" name="numproducer" id="numproducer" value="0">
                            <label class="col-xs-4 control-label">Producer</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vproducer0" style="color:red;"></P>
                               <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                 <input id="producer0" name="producer0" style="width:85%" placeholder="Producer Name" class="form-control" Director  type="text">
                                 <input type="button" style="padding:3%;margin-left:5px;border-radius:10%;border:none" class="glyphicon glyphicon-plus" value="+" onclick="return addproducer()">
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Producer Pic</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vproducerpic0" style="color:red;"></P>
                                <div class="input-group"><input id="producerpic0" name="producerpic0" accept=".png, .jpg, .jpeg,.JPG" Director  type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div id="produceradd" name="produceradd"></div>

                         <div class="form-group">
                            <label class="col-xs-4 control-label">Music director</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vmusic" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-headphones"></i></span><input id="mdirector" name="mdirector" placeholder="Music director" class="form-control" Director type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Language</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vlanguage" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <select id="language" name="language" placeholder="Singers" class="form-control">
                               	<option value="0">Select Language</option>
                               	<option value="1">English</option>
                               	<option value="2">Hindi</option>
                               	<option value="3">Malayalam</option>
                               	<option value="4">Kannada</option>
                               	<option value="5">Tamil</option>
                               </select></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Category</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vlanguage" style="color:red;"></P>
                               <!-- <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span> -->
                                <!-- <select id="language" name="language" placeholder="Singers" class="form-control">
                               	<option value="0">Select Category</option>
                                <option value="1">Action</option>
                                <option value="2">Biography</option>
                               	<option value="3">Crime</option>
                               	<option value="4">Family</option>
                               	<option value="5">Horror</option>
                               	<option value="6">Romance</option>
                                <option value="7">Sports</option>
                               	<option value="8">War</option>
                               	<option value="9">Adventure</option>
                               	<option value="10">Comedy</option>
                               	<option value="11">Documentary</option>
                                <option value="12">Fantasy</option>
                               	<option value="13">Thriller</option>
                               	<option value="14">Animation</option>
                               	<option value="15">Costume</option>
                               	<option value="16">Drama</option>
                                <option value="17">History</option>
                               	<option value="18">Musical</option>
                               	<option value="19">Psychological</option>
                               </select> -->

                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Action</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Biography</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Crime</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Documentary</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Horror</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Romance</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Sports</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>War</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Adventure</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Comedy</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Family</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Fantasy</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Thriller</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Animation</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Costume</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Drama</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>History</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Musical</b>
                               <input type="checkbox" name="caregory[]" id="caregory[]" value="0" style="margin:2%;font:18px"><b>Psychological</b>

                             </div>





















                            </div>
                         </div>
                      </fieldset>
                </td>
                <td colspan="1" class="col-xs-6">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group">
                           <input type="hidden" name="numactor" id="numactor" value="0">
                            <label class="col-xs-4 control-label">Actor</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vactor0" style="color:red;"></P>
                               <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                 <input id="actor0" name="actor0" style="width:85%" placeholder="Actor Name" class="form-control" Director type="text">
                                 <input type="button" style="padding:3%;margin-left:5px;border-radius:10%;border:none" class="glyphicon glyphicon-plus" value="+" onclick="return addactor()">
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Actor Pic</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vactorpic0" style="color:red;"></P>
                                <div class="input-group"><input id="actorpic0" name="actorpic0" accept=".png, .jpg, .jpeg,.JPG" Director type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div id="actoradd" name="actoradd"></div>

                         <div class="form-group">
                           <input type="hidden" name="numactress" id="numactress" value="0">
                            <label class="col-xs-4 control-label">Actress</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vactress0" style="color:red;"></P>
                               <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-female"></i></span>
                                 <input id="actress0" name="actress0" style="width:85%" placeholder="Actress Name" class="form-control" Director type="text">
                                 <input type="button" style="padding:3%;margin-left:5px;border-radius:10%;border:none" class="glyphicon glyphicon-plus" value="+" onclick="return addactress()">
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Actress Pic</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vactresspic0" style="color:red;"></P>
                                <div class="input-group"><input id="actresspic0" name="actresspic0" accept=".png, .jpg, .jpeg,.JPG"  Director type="file" style="font-size: 120%"></div>
                            </div>
                         </div>
                         <div id="actressadd" name="actressadd"></div>

                         <div class="form-group">
                            <label class="col-xs-4 control-label">Description</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vdescription" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
								               <textarea cols="39%" rows="10%" name="description" id="description" placeholder="  Enter Description"></textarea></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-xs-4 control-label">Cost</label>
                            <div class="col-xs-8 inputGroupContainer">
                              <p id="vcost" style="color:red;"></P>
                               <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
                                 <input id="cost" name="cost" placeholder="Selling Cost" class="form-control" Director type="text"></div>
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
		$CI->mainindex() ;
	}
	?>
