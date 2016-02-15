<?php
	$content =' '; $docReady = ''; $javascript = '';

/*** Content ***************************************************************/
extract($data);
ob_start();
?>
    
    <div class="row">
    	<div class="col-sm-4" > </div>
        <div class="col-sm-4" >
	        
          <div class="panel panel-primary">
            <div class="panel-body">
				<?=$form?>
            </div>
          </div>          
          
        </div>
        <div class="col-sm-4" > </div>	
    </div><!-- End row -->
    
    
<?php
$content .= ob_get_contents();
ob_end_clean();

/*** Doc Ready *************************************************************/
ob_start();
?>



<?php
$docReady .= ob_get_contents();
ob_end_clean();

/*** javascript *************************************************************/

ob_start();
?>


<?php
$javascript .= ob_get_contents();
ob_end_clean();	

/*** Load Template **********************************************************/
if ( file_exists('../public/'.TEMPLATE.'/blank.php') ){
	require_once '../public/'.TEMPLATE.'/blank.php';
}else{
	echo " <h2>There is no template found</h2>";
}	
