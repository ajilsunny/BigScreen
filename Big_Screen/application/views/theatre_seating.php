<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">
<script type="text/javascript">
  function dis()
  {
    document.getElementById("show1").style.visibility = "hidden";
    document.getElementById("show2").style.visibility = "hidden";
    document.getElementById("show3").style.visibility = "hidden";
    document.getElementById("show4").style.visibility = "hidden";
    document.getElementById("show5").style.visibility = "hidden";
    var num= document.getElementById('shows').value;
    for (var i = 1; i <=num; i++)
    {
      document.getElementById("show"+i+"").style.visibility = "visible";
    }
  }
</script>
  <?php
  if(!$dis)
  {
  ?>
  <div class="container">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td colspan="1">
                     <form class="well form-horizontal" method="post" action="<?php echo site_url('usercontroller/theaterseatingadd');?>" enctype="multipart/form-data" onsubmit="return vali()">
                        <fieldset>
                            <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Classic Seating</label></div>
                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Rows</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="c_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Columns</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="c_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Seat price/head</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="c_price" placeholder="Seat price per head" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                            <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Luxury Seating</label></div>

                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Rows</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="l_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Columns</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="l_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-4 control-label" align="right">Seat price/head</label>
                               <div class="col-md-8 inputGroupContainer">
                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="l_price" placeholder="Seat price per head" class="form-control" required="" type="Number" min="0"></div>
                               </div>
                            </div>

                        </fieldset>
                  </td>
                  <td colspan="1">
                     <div class="well form-horizontal">
                        <fieldset>

                          <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Balcony Seating</label></div>

                          <div class="form-group">
                             <label class="col-md-4 control-label" align="right">Rows</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="b_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0"></div>
                             </div>
                          </div>

                          <div class="form-group">
                             <label class="col-md-4 control-label" align="right">Columns</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="b_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                             </div>
                          </div>

                          <div class="form-group">
                             <label class="col-md-4 control-label" align="right">Seat price/head</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="directer" name="b_price" placeholder="Seat price per head" class="form-control" required="" type="Number" min="0"></div>
                             </div>
                          </div>

                          <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Show Time</label></div>

                          <div class="form-group">
                             <label class="col-md-4 control-label" align="right">Shows</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                  <select name="shows" id="shows" class="form-control" onchange="dis()">
                                    <option value=0>0</option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                  </select>
                                  </div>
                             </div>
                          </div>

                          <div class="form-group" id="show1" style="visibility:hidden">
                             <label class="col-md-4 control-label" align="right">First Show</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input  name="time1" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                             </div>
                          </div>

                          <div class="form-group" id="show2" style="visibility:hidden">
                             <label class="col-md-4 control-label" align="right">Second Show</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input  name="time2" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                             </div>
                          </div>

                          <div class="form-group" id="show3" style="visibility:hidden">
                             <label class="col-md-4 control-label" align="right">Third Show</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input  name="time3" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                             </div>
                          </div>

                          <div class="form-group" id="show4" style="visibility:hidden">
                             <label class="col-md-4 control-label" align="right">Fourth Show</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input  name="time4" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                             </div>
                          </div>

                          <div class="form-group" id="show5" style="visibility:hidden">
                             <label class="col-md-4 control-label" align="right">Fifth Show</label>
                             <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input  name="time5" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                             </div>
                          </div>
                          <div class="col-xs-12" style="width: 100%;height: 50%">
                          <input class="butsubmit btn-primary" type="submit" style="background-color: #3366cc;color:white" value="Add" name="addfilm" >
                          </div>
                        </fieldset>
                        </font>
                      </div>
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
      </div><br>
  </div>
<?php
}
else
{
  foreach ($dis as $row)
  {
      $status=$row->status;
      $c_row=$row->c_row;
      $c_column=$row->c_column;
      $c_price=$row->c_price;
      $l_rows=$row->l_rows;
      $l_column=$row->l_column;
      $l_price=$row->l_price;
      $b_rows=$row->b_rows;
      $b_column=$row->b_column;
      $b_price=$row->b_price;
      $no_of_shows=$row->no_of_shows;
      $time1=$row->time1;
      $time2=$row->time2;
      $time3=$row->time3;
      $time4=$row->time4;
      $time5=$row->time5;
      if($status=="0")
      {
        ?>
        <div class="container">
               <table class="table table-striped">
                  <tbody>
                     <tr>
                        <td colspan="1" class="col-xs-6">
                           <form class="well form-horizontal" method="post" action="<?php echo site_url('usercontroller/theaterseatingedit');?>" enctype="multipart/form-data" onsubmit="return vali()">
                              <fieldset>
                                <div class="form-group">
                                  <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Classic Seating</label></div>
                                   <label class="col-md-4 control-label" align="right">Rows</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_row ?>" id="directer" name="c_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Columns</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_column ?>" id="directer" name="c_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_price ?>" id="directer" name="c_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                  <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Luxury Seating</label></div>

                                  <div class="form-group">
                                     <label class="col-md-4 control-label" align="right">Rows</label>
                                     <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_rows ?>" id="directer" name="l_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" disabled></div>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                     <label class="col-md-4 control-label" align="right">Columns</label>
                                     <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_column ?>" id="directer" name="l_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                     <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                     <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_price ?>" id="directer" name="l_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                     </div>
                                  </div>

                              </fieldset>
                        </td>
                        <td colspan="1">
                           <div class="well form-horizontal">
                              <fieldset>

                                <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Balcony Seating</label></div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Rows</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_rows ?>" id="directer" name="b_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Columns</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_column ?>" id="directer" name="b_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_price ?>" id="directer" name="b_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>
                                </div>

                                <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Show Time</label></div>

                                <div class="form-group">
                                   <label class="col-md-4 control-label" align="right">Shows</label>
                                   <div class="col-md-8 inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $no_of_shows ?>" id="directer" name="b_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" disabled></div>
                                   </div>


                                <?php
                                for ($i=1; $i <= $no_of_shows ; $i++)
                                {
                                  $time="time".$i;
                                  ?>
                                  <div class="form-group" id="show<?php $i ?>" >
                                     <label class="col-md-4 control-label" align="right"><?php echo $i ?> Show</label>
                                     <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo ${$time} ?>"  name="time1" class="form-control" disabled type="text"></div>
                                     </div>
                                  </div>
                                  <?php
                                  }
                                ?>
                              </div>
                                <div class="col-xs-12" style="width: 100%;height: 50%">
                                <input class="butsubmit btn-primary" type="submit" style="background-color: #3366cc;color:white" value="Edit" name="editseating" >
                              </div>
                              </div>
                              </fieldset>
                              </font>
                             </div>
                           </form>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div><br>
        </div>
<?php
    }
    else
    {
      ?>
      <div class="container">
             <table class="table table-striped">
                <tbody>
                   <tr>
                      <td colspan="1">
                         <form class="well form-horizontal" method="post" action="<?php echo site_url('usercontroller/theaterseatingupdate');?>" enctype="multipart/form-data" onsubmit="return vali()">
                            <fieldset>
                              <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Classic Seating</label></div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Rows</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_row ?>" id="directer" name="c_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Columns</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_column ?>" id="directer" name="c_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $c_price ?>" id="directer" name="c_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                                 </div>
                              </div>

                              <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Luxury Seating</label></div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Rows</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_rows ?>" id="directer" name="l_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Columns</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_column ?>" id="directer" name="l_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $l_price ?>" id="directer" name="l_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                                 </div>
                              </div>

                            </fieldset>
                      </td>
                      <td colspan="1">
                         <div class="well form-horizontal">
                            <fieldset>

                              <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Balcony Seating</label></div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Rows</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_rows ?>" id="directer" name="b_rows" placeholder="Number of Rows" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Columns</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_column ?>" id="directer" name="b_column" placeholder="Number of Column" class="form-control" required="" type="Number" min="0" ></div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Seat price/head</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $b_price ?>" id="directer" name="b_price" placeholder="Number of Column" class="form-control" required="" type="Number" min="0"></div>
                                 </div>
                              </div>

                              <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Show Time</label></div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" align="right">Shows</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                      <select name="shows" id="shows" class="form-control" onchange="dis()">
                                        <option value=0>0</option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                      </select>
                                      </div>
                                 </div>
                              </div>
                              <div class="form-group" id="show1" style="visibility:hidden">
                                 <label class="col-md-4 control-label" align="right">First Show</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $time1 ?>"  name="time1" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                                 </div>
                              </div>

                              <div class="form-group" id="show2" style="visibility:hidden">
                                 <label class="col-md-4 control-label" align="right">Second Show</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $time2 ?>"  name="time2" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                                 </div>
                              </div>

                              <div class="form-group" id="show3" style="visibility:hidden">
                                 <label class="col-md-4 control-label" align="right">Third Show</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $time3 ?>"  name="time3" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                                 </div>
                              </div>

                              <div class="form-group" id="show4" style="visibility:hidden">
                                 <label class="col-md-4 control-label" align="right">Fourth Show</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $time4 ?>"  name="time4" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                                 </div>
                              </div>

                              <div class="form-group" id="show5" style="visibility:hidden">
                                 <label class="col-md-4 control-label" align="right">Fifth Show</label>
                                 <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input value="<?php echo $time5 ?>"  name="time5" class="form-control" placeholder="24hr Format" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" type="text"></div>
                                 </div>
                              </div>

                              <div class="col-xs-12" style="width: 100%;height: 50%">
                              <input class="butsubmit btn-primary" type="submit" style="background-color: #3366cc;color:white" value="Update" name="updateseating" >
                              </div>

                            </fieldset>
                            </font>
                           </div>
                         </form>
                      </td>
                   </tr>
                </tbody>
             </table>
          </div><br>
      </div>
      <?php
    }
  }
}
 ?>
</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
