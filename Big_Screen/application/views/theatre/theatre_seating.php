<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script>
var x=[];
var f=0;
function val(z)
{

    for (var i = 0; i < x.length; i++)
    {
      if(z==x[i])
      {
        document.getElementById(z).style.backgroundColor = "";
        var index = x.indexOf(z);
        if (index > -1)
        {
          x.splice(index, 1);
          f--;
        }
        return false;
      }
    }
    document.getElementById(z).style.backgroundColor = "red";
    x[f]=z;
    f++;
    return false;

}
function vals()
{
if(x.length < 10)
{
  alert("select a minimum of 50 seats");
  return false;
}
  // var catsname=[];
  // var catsrow=[];
  // var catsprice=[];
  document.getElementById('seatsets').value=x;

//   var tid=document.getElementById('tid').value;
//   var cats=document.getElementById('no_of_seatcategory').value;
// for (var i = 1; i <= cats; i++)
// {
//   catsname[i]=document.getElementById('cat_name'+i).value;
//   catsrow[i]=document.getElementById('cat_start'+i).value;
//   catsprice[i]=document.getElementById('cat_price'+i).value;
//
// }
//  var data=new FormData();
//  data.append('seat',x);
//  data.append('tid',tid);
//  data.append('catsname',catsname);
//  data.append('catsrow',catsrow);
//  data.append('catsprice',catsprice);
//  $.ajax({
//    method:'post',
//    url:"<?php echo site_url("tcontroller/insertseating"); ?>",
//    processData: false,
//    contentType: false,
//    data: data,
//    success:function(result){
//      alert(result);
//
//    }
//  });
}

function category()
{
  // alert("hi");

$('#catdiv').html('');
var num=document.getElementById('no_of_seatcategory').value;

// alert(num);
for (var i = 1; i <= num; i++)
{
$('#catdiv').append('<tr class="form-group"><td><label>Seat Categorys Name '+i+': </label></td><td><input type="text" class="form-control" required name="cat_name'+i+'" id="cat_name'+i+'"></td></tr><tr><td><label></lable></td></tr><tr><td><label>Seat start row '+i+': </label></td><td><input class="form-control" min=1 required type="number" name="cat_start'+i+'" id="cat_start'+i+'"></td></tr><tr><td></td></tr><tr><td><label></lable></td></tr><tr><td><label>Seat price '+i+': </label></td><td><input class="form-control" required type="number" min=0 name="cat_price'+i+'" id="cat_price'+i+'"></td></tr><tr><td></td></tr><tr><td><label></lable></td></tr>');

}

}

  </script>

<div class="col-md-12 " style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:auto;width:100%;">
<?php
if($dis)
{
  foreach($dis as $row)
  {
    $flag=0;
    $tid=$row->tid;
    $screen_no=$row->screen_no;
    $rows=$row->row;
    $cols=$row->cols;
    $seat_arrangement=$row->seat_arrangement;
    $classes_name=$row->classes_names;
    $class_row=$row->class_rows;
    $class_amount=$row->class_amount;

    $seat_arrangements = explode(',',$seat_arrangement);
    $classes_names = explode(',',$classes_name);
    $class_rows = explode(',',$class_row);
    $class_amounts = explode(',',$class_amount);
    $category=sizeof($classes_names);
    $num_seats=sizeof($seat_arrangements);
  ?>
  <center>
  <div class="col-md-12 well">
<div class="well col-md-8" id="main" style="overflow-x: scroll;">
<h3><b>Seating arrangements</b></h3><br>
<input type="button" value="screen" id="red" style="border: none;border-radius: 15px;background-color:#f0ad4e;width:50%"><br><br>
<table>
<?php

  $s="A";
  $z=1;
  for($i=1;$i<=$rows;$i++)
  {
    echo"<tr>";
    for($j=1;$j<=$cols;$j++)
    {
        $seat=$i.'-'.$j;
        for ($k=0; $k < $num_seats; $k++)
        {
          if($seat == $seat_arrangements[$k])
          {
            $flag=1;
            break;
          }

        }
        if($flag==1)
        {
          ?>
          <th>
            <input type="button" class="btn btn-danger" name="seat" value="<?php echo($s.$z) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;background:red;width:25px;margin:1px" onclick="return val(this.id)">
          </th>
        <?php
        $z++;
        $flag=0;
        }
        else {
          ?>
          <th>
            <input type="button" class="btn btn-default" name="seat" value="<?php echo "" ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;width:25px;margin:1px" disabled onclick="return val(this.id)">
          </th>
        <?php
        }
      ?>
      <!-- <th>
        <input type="button" name="seat" value="<?php echo($s.$j) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;" onclick="return val(this.id)">
      </th> -->
    <?php
  }
    $s++;
    $z=1;
    echo "</tr>";
  }
  ?>
 </table>
 </div>
 <div class="col-md-4  well">
 <center>
   <form action="<?php echo site_url("tcontroller/insertseating"); ?>" method="post">
   <input type="hidden" name="seatsets" id="seatsets">
   <input type="hidden" name="row" id="row" value="<?php echo $rows ?>">
   <input type="hidden" name="cols" id="cols" value="<?php echo $cols ?>">
   <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
   <input type="hidden" name="screen" id="screen" value="<?php echo $screen_no ?>">
   <!-- <input type="hidden" name="" id="">
   <input type="hidden" name="" id="">
   <input type="hidden" name="" id=""> -->
   <h3><b>Seating catrgory</b></h3><br>
   <tr><td><label>Choose Number Of catrgory</label></td>
     <td><input  type="number" id="no_of_seatcategory" name="no_of_seatcategory" min=1  value="<?php echo $category; ?>" required onchange="category()" disabled>
     </tr>
     <div name="catdiv" id="catdiv" style="padding-top:10%" >
       <table>
       <?php
          for ($i=0; $i < $category; $i++)
          {
            ?>
            <tr class="form-group"><td><label>Seat Categorys Name <?php echo $i+1?></label></td>
              <td><input type="text" class="form-control" required name="cat_name<?php echo $i?>" value="<?php echo $classes_names[$i] ?>" id="cat_name<?php echo $i?>" disabled></td></tr>
              <tr><td><label></lable></td></tr>
                <tr><td><label>Seat start row <?php echo $i+1?>: </label></td>
                  <td><input class="form-control" min=1 required type="number" name="cat_start<?php echo $i?>" value="<?php echo $class_rows[$i]?>" id="cat_start<?php echo $i?>" disabled></td></tr>
                  <tr><td></td></tr><tr><td><label></lable></td></tr>
                    <tr><td><label>Seat price <?php echo $i+1?>: </label></td>
                      <td><input class="form-control" required type="number" min=0 name="cat_price<?php echo $i?>" value="<?php echo $class_amounts[$i]?>" id="cat_price<?php echo $i?>" disabled></td></tr>
                      <tr><td></td></tr><tr><td><label></lable></td></tr>
    <?php
          }
        ?>
</table>
     </div>
     <input type="submit" value="Set Seating" id="add" style="background-color:blue;width:200px;color:white;display:none" onclick="return vals()">
     <input type="submit" value="Edit" id="add" style="background-color:blue;width:200px;color:white;" onclick="return vals()" disabled>
   </form>
 </center>
 </div>
<?php
}
}
else
{

 ?>
  <center>
  <div class="well" >
  <form action="" method="post">
    <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
    <input type="hidden" name="screen" id="screen" value="<?php echo $screen ?>">
  Rows<input type="text" name="rows" id="rows" required>
  cols<input type="text" name="cols" id="cols" required>
  <input type="submit" name="show" id="show" value="show seating">
</form>
</div>
    <?php
    if(isset($_POST['show']))
    {
      ?>
      <div class="col-md-12 well">
<div class="well col-md-8" id="main" style="overflow-x: scroll;">
  <h3><b>Seating arrangements</b></h3><br>
  <input type="button" value="screen" id="red" style="background-color:yellow;width:600px">
  <table>
<?php
$r=$_POST['rows'];
$c=$_POST['cols'];
$s="A";
for($i=1;$i<=$r;$i++)
{
  echo"<tr>";
  for($j=1;$j<=$c;$j++)
  {?>
    <th>

      <input type="button" name="seat" value="<?php echo($s.$j) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;" onclick="return val(this.id)">

    </th>
  <?php
}
  $s++;
  echo "</tr>";
}

 ?>
</table>
</div>
<div class="col-md-4  well">
<center>
  <form action="<?php echo site_url("tcontroller/insertseating"); ?>" method="post">
  <input type="hidden" name="seatsets" id="seatsets">
  <input type="hidden" name="row" id="row" value="<?php echo $r ?>">
  <input type="hidden" name="cols" id="cols" value="<?php echo $c ?>">
  <input type="hidden" name="tid" id="tid" value="<?php echo $_POST['tid'] ?>">
  <input type="hidden" name="screen" id="screen" value="<?php echo $_POST['screen'] ?>">
  <!-- <input type="hidden" name="" id="">
  <input type="hidden" name="" id="">
  <input type="hidden" name="" id=""> -->
  <h3><b>Seating catrgory</b></h3><br>
  <tr><td><label>Choose Number Of catrgory</label></td>
    <td><input  type="number" id="no_of_seatcategory" name="no_of_seatcategory" min=1 required onchange="category()">
    </tr>
    <div name="catdiv" id="catdiv" style="padding-top:10%" >

    </div>
    <input type="submit" value="Set Seating" id="add" style="background-color:blue;width:200px;color:white;" onclick="return vals()" >
  </form>
</center>
</div>
<br>
<br>
<?php } ?>
<!-- <input type="button" value="Set Seating" id="add" style="background-color:blue;width:200px" onclick="return vals()"> -->
</div>
<?php } ?>

</center>
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
