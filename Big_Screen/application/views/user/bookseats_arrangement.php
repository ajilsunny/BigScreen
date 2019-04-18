<?php

$CI =& get_instance();
 $a= $CI->sessionin(1) ;
if($a==1)
{
	include('user_header.php');
if($dis)
{
  $alocateseats=array();
  foreach ($alocate as $key)
  {
    $alocateseats[]=$key->seat;
  }
  foreach($dis as $row)
  {
    $flag=0;
    $flag1=0;
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
    <input type="hidden" id="rows" value="<?php echo $class_row ?>">
    <input type="hidden" id="amount" value="<?php echo $class_amount ?>">
    <input type="hidden" id="class" value="<?php echo $classes_name ?>">
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
          for ($m=0; $m <sizeof($alocateseats) ; $m++)
          {
            if($seat==$alocateseats[$m])
            {
              $flag1=1;
              break;
            }
          }
          if($flag1==1)
          {
          ?>
            <th>
              <input type="button" class="btn" name="seat" value="<?php echo($s.$z) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;width:25px;margin:1px;background:#ff0000;color:white" disabled>
            </th>
        <?php
          $flag1=0;
          }
          else
          {
          ?>
          <th>
            <input type="button" class="btn" name="seat" value="<?php echo($s.$z) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;width:25px;margin:1px" onclick="return val(this.id,this.value)">
          </th>
          <?php
          }
        $z++;
        $flag=0;
        }
        else {
          ?>
          <th>
            <input type="button" class="btn btn-default" name="seat" value="<?php echo "" ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;width:25px;margin:1px" disabled >
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
   <form action="<?php echo site_url("ucontroller/bookseat_bill"); ?>" method="post">
   <input type="hidden" name="seatsets" id="seatsets">
   <input type="hidden" name="bookdate" id="bookdate" value="<?php echo $bookdate ?>">
   <input type="hidden" name="booktime" id="booktime" value="<?php echo $booktime ?>">
   <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
   <input type="hidden" name="mid" id="mid" value="<?php echo $mid ?>">
   <input type="hidden" name="screen" id="screen" value="<?php echo $screen ?>">
   <h3><b>Booking Details</b></h3><br>
   <div id="res">
    <table class="table">
      <tr><td><lable style="color:black;"><h4><b>Name :</b></h4></label></td><td><input style="font-weight:bold;" readonly class="form-control" type="text" id="name" name="name" value="<?php echo $name ?>"></td></tr>
      <tr><td><lable style="color:black;"><h4><b>Date :</b></h4></label></td><td><input style="font-weight:bold;" readonly class="form-control" type="text" id="date" value="<?php echo $bookdate ?>"></td></tr>
      <tr><td><lable style="color:black;"><h4><b>Time :</b></h4></label></td><td><input style="font-weight:bold;" readonly class="form-control" type="text" id="time" value="<?php echo $booktime ?>"></td></tr>
      <tr><td><lable style="color:black;"><h4><b>Booked Seats :</b></h4></label></td><td><input style="font-weight:bold;" readonly class="form-control" type="text" id="seats" name="seats" value="0"></td></tr>
      <tr><td><lable style="color:black;"><h4><b>Total :</b></h4></label></td><td><h3><input style="font-weight:bold;" readonly class="form-control" type="text" id="total" name="total" value="0"></h3></td></tr>
    </table>
   </div>

      <input type="hidden" name="sbid" id="sbid">
      <input type="hidden" name="sbname" id="sbname">
      <p style="color:red" id="vseat"></p>
     <input type="submit" class="btn btn-primary" value="Book Now" id="add" style="width:200px;color:white;display:block" onclick="return vals()">

   </form>
 </center>
 </div>
<?php
}
}
?>


</div>
<br><br>
<script>
var sid=[];
var z=0;
var sename=[];
var total=0;
function val(id,name)
{
  //alert(seaname);
  var bookdate=document.getElementById('bookdate').value;
  var booktime=document.getElementById('booktime').value;
  var tid=document.getElementById('tid').value;
  var mid=document.getElementById('mid').value;
  var screen=document.getElementById('screen').value;
  var num=id.split("-");
  var row=document.getElementById('rows').value;
  var amount=document.getElementById('amount').value;
  var name1=document.getElementById('class').value;
  var rows=row.split(",");
  var amounts=amount.split(",");
  var names=name.split(",");
  var amount;
  for (var i =0; i <rows.length; i++)
  {
    if(parseInt(num[0])>=rows[i])
    {
      amount=amounts[i];
      break;
    }
  }
  // alert(amount);
  var data=new FormData();
  data.append('mid',mid);
  data.append('tid',tid);
  data.append('bookdate',bookdate);
  data.append('booktime',booktime);
  data.append('screen',screen);
  data.append('amount',amount);
  data.append('seat',id);

  var data1=new FormData();
  data1.append('mid',mid);
  data1.append('tid',tid);
  data1.append('bookdate',bookdate);
  data1.append('booktime',booktime);
  data1.append('screen',screen);
  data1.append('seat',id);

  $.ajax({
    method:'post',
    url:"<?php echo site_url("ucontroller/bookedcount"); ?>",
    processData: false,
    contentType: false,
    data: data1,
    success:function(result2)
    {
      if(result2<10)
      {
      //alert(result2);

      $.ajax({
        method:'post',
        url:"<?php echo site_url("ucontroller/seatcheck"); ?>",
        processData: false,
        contentType: false,
        data: data1,
        success:function(result1)
        {
          //alert(result1);
      		var r=JSON.parse(result1);
          var rs=r.length;
          if(rs)
          {
            alert("Booked few seconds ago");
            for (var i = 0; i < r.length; i++)
            {
              var amount1=r[i].amount;
              var sbid=r[i].s_id;
            }
            var index1 = sid.indexOf(sbid);
            var index = sename.indexOf(name);

            if (index > -1)
            {
              sename.splice(index, 1);
              sid.splice(index1, 1);
              z--;
            var seaname=sename.toString();
            }
            //alert(amount1);
            total=parseInt(total)-parseInt(amount1);
            if(total<0)
            {
              total=0;
              seaname=0;
            }
            document.getElementById("seats").value =seaname ;
            document.getElementById("total").value =total ;
            document.getElementById("sbid").value = sid;
            document.getElementById(id).style.backgroundColor = ""
          }
          else
          {

            sename[z]=name;
            var seaname=sename.toString();
            $.ajax({
              method:'post',
              url:"<?php echo site_url("ucontroller/bookseat"); ?>",
              processData: false,
              contentType: false,
              data: data,
              success:function(result){
              //alert(result);
              var r=JSON.parse(result);
              //alert(r);
              sid[z]=r;
              total=parseInt(total)+parseInt(amount);
              document.getElementById("date").value =bookdate ;
              document.getElementById("time").value =booktime ;
              document.getElementById("seats").value =seaname ;
              document.getElementById("total").value =total ;
              document.getElementById("sbid").value = sid;
              document.getElementById(id).style.backgroundColor = "#77ff33"
              z++;
              }
            });



          }
    		}
      });

      }
      else
      {
      alert("Only Book 10 Seats");

      }
    }
    });

}
function vals()
{
  if(sename.length<1)
  {
    document.getElementById("vseat").innerHTML ="No seats selected";
    return false;
  }
}
</script>
<?php
  include('footer.php');
  }
  else
  {
    $CI->mainindex() ;
  }
  ?>
