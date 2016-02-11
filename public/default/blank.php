<?php
	use SMVC\Core\Security;
?><!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?=TITLE_TAG?></title>
  <meta name="description" content="">
  <meta name="author" content="Dave Clare">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php include_once('appleIcons.php'); ?>
  
<!-- jQuery -->
	<script type="text/javascript" src="<?=BASE_URL?>/public/assets/jquery/jquery-1.11.3.min.js"></script>
	
<!-- Bootstrap CSS /jQuery -->
	<link rel="stylesheet" type='text/css' href="<?=BASE_URL?>/public/default/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type='text/css' href="<?=BASE_URL?>/public/default/assets/bootstrap/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="<?=BASE_URL?>/public/default/assets/bootstrap/js/bootstrap.min.js"></script>
	
<!-- Bootstrap overwrite CSS-->
	<link rel="stylesheet" type='text/css' href="<?=BASE_URL?>/public/default/assets/css/style.php">

<!-- Datatables -->
	<script type="text/javascript" src="<?=BASE_URL?>/public/assets/dataTables/datatables.min.js"></script>
	<link rel="stylesheet" type='text/css' href="<?=BASE_URL?>/public/assets/dataTables/datatables.css">
	
<!-- Sortable -->
	<script type="text/javascript" src="<?=BASE_URL?>/public/assets/js/jquery-sortable.js"></script>
	
<!-- Equal heights -->	
	<script type="text/javascript" src="<?=BASE_URL?>/public/assets/js/equalheights.js"></script>
  
</head>


  <body role="document">
	
    <?php

			include_once('navigation.php'); 	

   
	?>


    <div class="container-fluid" role="main">
<?php
	if( !empty($content) ){
		echo $content;
	}	
?>
    </div>


<footer class="container-fluid text-center">
  <a href="" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Gopher Digital Framework <a href="http://www.gopherdigital.com" title="Visit Gopher Digital">www.gopherdigital.com</a></p>		
</footer>
    
<script>
	$(document).ready(function(){
		<?php if(!empty($docReady) ){
			echo $docReady;
		}
		?>
	});	
</script>
</body>
</html>