<?php
 $Pine->Page->DisplayHead();
  ?>
<link href="app/css/style.css" rel="stylesheet">
<?
 $Pine->Page->DisplayBody();
?>
  
	<!-- START sample content -->
	<section class="slide">
		<? $Pine->Page->DisplaySnippet("greeting.html"); ?>
	</section>
	<!-- END sample content -->	
<? 

$Pine->Page->DisplayFoot();
	
?>
