<?php
 //$Page = $GLOBALS["Page"]; 
 $Page->DisplayHead();
  ?>
<link href="app/css/style.css" rel="stylesheet">
<?
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
