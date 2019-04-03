<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>
<script type="text/javascript">
function bookrequest()
{
  var mid=document.getElementById("mid").value;
  var lid=document.getElementById("lid").value;
  var button=document.getElementById("request").value;
  var data=new FormData();
  data.append('mid',mid);
  data.append('lid',lid);
  if(button=='Request')
  {
  $.ajax({
    method:'post',
    url:"<?php echo site_url("tcontroller/filmbookrequest"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
    if(result=='0')
    {
      document.getElementById('request').value='Request Send';
    }
    }
  });
}
else {
  $.ajax({
    method:'post',
    url:"<?php echo site_url("tcontroller/filmbookrequestcancel"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
    //alert(result);
    if(result=='0')
    {
      document.getElementById('request').value='Request';
    }
    }
  });
}
}

function bookcancel()
{

}
</script>
<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">
  <?php
    foreach($dis as $row)
    {
        $lid=$this->session->userdata('id');
        $mid=$row->mid;
        $fname=$row->film_name;
        $poster_pic=$row->poster_pic;
        $cover_pic=$row->cover_pic;

        $Director=$row->director;
        $Directors = explode(',',$Director);

        $Director_pic=$row->director_pic;
        $Director_pics = explode(',',$Director_pic);

        $producer=$row->producer;
        $producers = explode(',',$producer);

        $producer_pic=$row->producer_pic;
        $producer_pics = explode(',',$producer_pic);

        $mdirector=$row->mdirector;
        $langu=$row->language;
        $language=$CI->language($langu);
        $category=$row->categories;
        $categories=explode(',',$category);
        $actor=$row->actor;
        $actors = explode(',',$actor);

        $actor_pic=$row->actor_pic;
        $actor_pics = explode(',',$actor_pic);

        $actress=$row->actress;
        $actresss = explode(',',$actress);

        $actress_pic=$row->actress_pic;
        $actress_pics = explode(',',$actress_pic);

        $description=$row->description;
        $price=$row->price;
        $fid=$row->mid;
      ?>
  <div class="col-xs-12" style="background: #F8F8F8">
  	<div class="col-xs-9 " style="height: auto">
  		<div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
        <img src="<?php echo base_url('images/movie/cover/').$cover_pic ?>" style="width:100%">
  			<div class="col-xs-12" style="height: 78%">

  			</div>
  			<div class="col-xs-12" style="padding-right: 10%;">
          <?php for ($i=0; $i < sizeof($Director_pics); $i++)
          {
            ?>
            <div style="display:inline-block;" align="center" >
              <img class="imgcircle bod"  src="<?php echo base_url('images/movie/director/').$Director_pics[$i] ?>">
            </div>
          <?php
          }
          ?>
          <?php for ($i=0; $i < sizeof($producer_pics); $i++)
          {
            ?>
            <div style="display:inline-block;" align="center" >
              <img class="imgcircle bod"  src="<?php echo base_url('images/movie/producer/').$producer_pics[$i] ?>">
            </div>
          <?php
          }
          ?>
          <?php for ($i=0; $i < sizeof($actor_pics); $i++)
          {
            ?>
            <div style="display:inline-block;" align="center" >
              <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actor/').$actor_pics[$i] ?>">
            </div>
          <?php
          }
          ?>
          <?php for ($i=0; $i < sizeof($actress_pics); $i++)
          {
            ?>
            <div style="display:inline-block;" align="center" >
              <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actress/').$actress_pics[$i] ?>">
            </div>
          <?php
          }
          ?>

  			</div>
  		</div>
      <div align=left class="col-xs-12 tblstyle1">
        <br>
            <?php echo $description ?>
      <br><BR>
      </div>
  	</div>
  	<div class="col-md-3" style="height: auto;"><br>
    <center>  <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br>
  <h1><b><?php echo $fname ?> </b></h1></center><br>
  <table class="table tblstyle" style="color:black">
      <tbody>
        <tr>
          <td >Director </td>
          <td >:
            <?php
            for ($i=0; $i < sizeof($Directors); $i++)
            {
            echo $Directors[$i]." ,  ";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Producer </td>
          <td>:
            <?php
            for ($i=0; $i < sizeof($producers); $i++)
            {
            echo $producers[$i]." ,  ";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Music director</td>
          <td>: <?php echo $mdirector ?></td>
        </tr>
        <tr>
          <td>Actor </td>
          <td>:
            <?php
            for ($i=0; $i < sizeof($actors); $i++)
            {
            echo $actors[$i]." , <br>   ";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Actress</td>
          <td>:
            <?php
            for ($i=0; $i < sizeof($actresss); $i++)
            {
            echo $actresss[$i]." , <br> ";
            }
            ?>
        </td>
        </tr>
        <tr>
          <td>Language </td>
          <td>: <?php echo $language ?></td>
        </tr>
        <tr>
          <td>Category </td>
          <td>:
            <?php
            $cat=array();
            for ($i=0; $i < sizeof($categories) ; $i++)
            {
              $cat=$CI->category($categories[$i]);
              echo $cat." ,<br>  ";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Price </td>
          <td>: ₹25000</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>
            <input type="hidden" id='mid' value="<?php echo $mid; ?>">
            <input type="hidden" id='lid' value="<?php echo $this->session->userdata('id'); ?>">
          </td>
          <td>
            <?php
              $a= $CI->bookstatus($mid,$lid) ;
              if($a=='0')
              {
            ?>
            <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Request send" onclick="bookrequest()">
          <?php
              }
              elseif ($a=='1')
              {
            ?>
            <form action="<?php echo site_url('usercontroller/bankpayment');?>" method="post">
                <input type="hidden" name="mid" value="<?php echo $mid ?>">
                <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Buy Now">
            </form>
            <?php
              }
              elseif ($a=='2')
              {
            ?>
                <input type="submit" id='request' style="background:#a2d246;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Payed" disabled>
            <?php
              }
              else
              {
                ?>
            <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Request" onclick="bookrequest()">
          <?php } ?>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>

    <?php } ?>

  </div>

  <?php
include('footer.php');
}
else
{
  $CI->index() ;
}
?>
