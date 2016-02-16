<?php
use Acme\PayMethods\PayMethodBase;	
use Acme\SecureSite\SecureSiteBase;	


/***************************************************************************/	
ob_start();

/*** Content ***************************************************************/
?>



<div class="row">
	<div class="col-sm-3" >
      
      
      
    </div><!-- end col -->
    <div class="col-sm-6" >
      
      <h1>A Blank Page</h1>
      
    </div><!-- end col -->
	<div class="col-sm-3" >
      
      
      
    </div><!-- end col -->    	
</div><!-- End row -->




<?php
/***************************************************************************/
$content = ob_get_contents();
ob_end_clean();

/*** Doc Ready *************************************************************/
ob_start();
?>



<?php
$docReady = ob_get_contents();
ob_end_clean();

/*** Javascript not DocREady ************************************************/
ob_start();
?>



<?php
$docReady = ob_get_contents();
ob_end_clean();

/*** Load Template **********************************************************/

if ( file_exists('../public/'.TEMPLATE.'/blank.php') ){
	require_once '../public/'.TEMPLATE.'/blank.php';
}else{
	echo " <h2>There is no template found</h2>";
}	