<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('distributor_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:800px;width:auto;">




</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
