<?php
use SMVC\PayMethods\PayMethodBase;	
use SMVC\SecureSite\SecureSiteBase;	


/***************************************************************************/	
ob_start();

/*** Content ***************************************************************/
?>


<div class="row">
	<div class="col-sm-6" >
      
      <div class="panel panel-default">
	      <div class="panel-heading">How it works</div>
	      <div class="panel-body">
		  	<p>You have gotten this far so I can assume that you have successfully completed the following
			  	<ol>
				  	<li>Edited public/.htaccess file</li>
				  	<li> Either Installed the test database with the two tables of user and environment values. Or ignored the login function</li>
				  	<li> Edited the app/config/config.php file switch statements</li>
			  	</ol>
		  	</p>
		  	<p>
			  	A quick word on Composer Autoloading. Classes are called dynamically when required as long as you follow the following rules.
			  	<ul>
				  	<li>Use fully qualified namespaces at the top of each class file</li>
				  	<li>The naming convention is app/lib/FolderName/ClassName.php</li>
				  	<li>The app/core folder is only for core files that manage the MVC system</li>
			  	</ul>
		  	</p>
		  	
		  	<p>
			  	Getting going with your own pages using the Model View Controller (MVC) method. Using this page as an example.
			  	<ul>
				  	<li>This page is called using http://yoursite-localhost?-name/home/index</li>
				  	<li>The application looks for a Controller ( which is a class) called 'home' and runs the method within 'home' called 'index'. See app/controllers/home.php</li>
				  	<li>The controller works out all the logic by using Models ( methods within classes ) does all the hard work and pools al the data needed to be sent to the View within an array called $data</li>
				  	<li>You can pass the regular POST, GET, SESSION values as needed but there is also an additional method. Using this format http://yoursite-localhost?-name/home/index/variable1/2/3/.... will enable the Controller to access these values as individual variables</li>
				  	<li>What View/template used to display the html/json/xml is called for each Controller Method. E.g. $this->view('pages/home',array ( 'pageText' => 'Hello World', 'userList'=> array(), ) );</li>
			  	</ul>
			  	Thats about it for getting on with, to recap.
			  	<ol>
				  	<li>The URL defines the controller/method used</li>
				  	<li>The Controller/Method does the collating, database queries, sending email, etc by calling Models/Classes</li>
			  	<li>The Controller calls the required View/template</li>
			  	</ol>
		  	</p>
		  	
	      </div>
	    </div><!-- End Panel -->
	    
	    
	<div class="panel panel-default">
	  <div class="panel-heading"> Emailer  </div>
	  <div class="panel-body">
		  <p>
			  Mailchimp is currently installed as a dependancy and with an 'INTERFACE' found at SMVC\Emails\
		  </p>
		  
	  </div>
	</div>	    

<div class="panel panel-default">
  <div class="panel-heading"> Login / Security </div>
  <div class="panel-body"> 
	  <p>
		  
	  </p>
	  
	  <?php
		  $forms = new SecureSiteBase();
		  $forms->setFramework(new SMVC\SecureSite\Bootstrap\SecurityForms);
		  
		  
		  echo $forms->loginForm();
		  echo '<hr>'.$forms->passwordReminderForm();
		  echo '<hr>'.$forms->signupForm();
		  
		?>
  </div>
</div>

      
    </div><!-- end col -->
    <div class="col-sm-6" >
      
      
      	<div class="panel panel-default">
	      <div class="panel-heading">A dump of data passed to this page from its controller</div>
	      <div class="panel-body">
		      <pre>
			      <?print_r($data)?>
		      </pre>
	      </div>
	    </div><!-- End Panel -->
      
      
    <div class="panel panel-default">
       <div class="panel-heading"> Composer </div>
       <div class="panel-body">
	       <p>
		       Composer is the goto program that manages dependancies, it is being used here to manage autoloading classes. The composer.json file is the only thing you need to think about and even then is you stick to the naming conventions and place all your classes inside app/lib/ then you will have nothing to worry about.
		    </p>
		    <p>
			    If you do decide to edit or deviate from this you will likely need to install composer, navigate using the command line to your sites root folder and run the following code: composer dump-autoload
		    </p>
		    <p>
			    For more information visit <a href="https://getcomposer.org/">Composer</a>
        </div>
     </div><!-- End Panel --> 
      
      
    <div class="panel panel-default">
       <div class="panel-heading">  Templates </div>
       <div class="panel-body"> 
	       <p>
		       This package comes with a default Bootstrap template ( public/default/index.php ) that echoes out the contents of variables passed from Views. Edit this as you see fit.
	       </p>
	    </div>
     </div> <!-- End Panel -->
     
     
	<div class="panel panel-default">
	  <div class="panel-heading"> Payment Methods </div>
	  <div class="panel-body"> 
		  <ul>
			  <li>Sage Pay -- <?=(new PayMethodBase( new SMVC\PayMethods\Sagepay\Transactions ) )->takePayment()?></li>
			  <li>World Pay -- <?=(new PayMethodBase( new SMVC\PayMethods\Worldpay\Transactions ) )->takePayment()?></li>
			  <li>PayPal -- <?=(new PayMethodBase( new SMVC\PayMethods\Worldpay\Transactions ) )->takePayment()?></li>
		  </ul>
		  
	  </div>
	</div>  
      
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