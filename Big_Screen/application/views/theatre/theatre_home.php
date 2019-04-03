<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">


</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
