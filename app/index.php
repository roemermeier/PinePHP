<?php
 $Page = $GLOBALS["Page"]; 
 $Page->DisplayHead();
 
 $Page->DisplayBody();
?>
  
	<!-- START sample content -->
	<section class="slide">
		<? $Page->DisplaySnippet("greeting.html"); ?>             
	</section>
	<!-- END sample content -->	
<? 

$Page->DisplayFoot();
	
?>
