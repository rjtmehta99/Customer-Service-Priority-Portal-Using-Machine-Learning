<?php
  session_start();
	$pyscript1 = 'C:\\xampp\\htdocs\\dell1\\pyscripts\\os.py';
	$pyscript2 = 'C:\\xampp\\htdocs\\dell1\\pyscripts\\lag.py';
	$pyscript3 = 'C:\\xampp\\htdocs\\dell1\\pyscripts\\hang.py';
	$pyscript4 = 'C:\\xampp\\htdocs\\dell1\\pyscripts\\battery.py';
	$python = 'C:\\Python35\\python.exe';
	$cmd1 = "$python $pyscript1";
	$cmd2 = "$python $pyscript2";
	$cmd3 = "$python $pyscript3";
	$cmd4 = "$python $pyscript4";
	exec("$cmd1", $output);
	exec("$cmd2", $output);
	exec("$cmd3", $output);
	exec("$cmd4", $output);
?>



<!DOCTYPE html>
<html class>
<head>
	<title>Dell</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
 <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <script src="js/sweetalert-dev.js"></script>
</head>
<style type="text/css">
  body{
        background-color: lightgrey;
      }
  .footer{
    background-color: #0b598c;
  }

</style>
<body>
    
    <nav class="navbar navbar-primary navbar-fixed-top bg-primary">
      <div class="container-fluid"> 
    		<div class="row">
      		<div class="col-md-5">
	        	<div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <!-- the class="navbar-toggle" is used to get the styles. Data-toggle="collapse" attribute is used to control the show and hide. The data-target = "#id" attribute is used to connect the button with the collapsible div. Icon-bar is used to create a button with three horizontal lines. This button is displayed when the screen width is small -->
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			        </button>
		          	<a href="admin_dashboard.php"><img src="images/logo.png" class="navbar-brand" alt="logo" style="height: 100px"></a>
		          	
		          	<ul class="nav navbar-nav">

          				<li><a href="admin_dashboard.php" style="color: white;">Home</a></li>
                  <li><a href="admin_dashboard.php" style="color: white;">About</a></li>
                  <li><a href="https://www.dell.com/en-in/shop/scc/sc/laptops?~ck=mn" style="color: white;" target="_blank">Products</a></li>
                  <li><a href="https://www.dell.com/en-in/work/learn/large-enterprise-solutions?~ck=mn" style="color: white;" target="_blank">Solutions</a></li>
                  <li><a href="https://www.dell.com/en-in/work/learn/it-support-lifecycle?~ck=mn.php" style="color: white;" target="_blank">Services</a></li>
                  <li><a href="https://www.dell.com/support/home/in/en/indhs1?~ck=mn" style="color: white;" target="_blank">Support</a></li>
                  <li><a href="https://www.dell.com/en-in/shop/deals/7-generation-laptops" style="color: white;" target="_blank">Deals</a></li>
          			</ul>
		        </div>
		    </div>
        
        <form class="navbar-form navbar-right" method="get" action="https://dell.com/community/forums/searchpage/tab/message?filter=includeForums&q=&include_forums=true&collapse_discussion=true" target="_blank">
            <div class="form-group">
                <tr><td>
                  <input type="text" class="form-control"  name="q" colour="black" size="25" maxlength="255" value="" placeholder="Search Dell Community" />
                  <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                  </button>
                </td></tr>
                </div>
        </form>
        <form name="logout" class="form-horizontal" action="index.php">
        <div class="col-md-6"></div>
        <div class="col-md-7">
        <div id="navbar" class="collapse navbar-collapse">        
        <input type="submit" class="btn btn-default" value="Logout">
        </div>
        </div>
</form>
      	</div> 
    	</div>
</nav>      


<!-- piecharts -->
<img src="BATTERY ISSUES.png" class="img-responsive" alt="cant load" style=" position: absolute;
   top: 75%;
   width: 25%;
   margin-top: -250px;
   ">
   
<img src="LAG ISSUES.png" class="img-responsive" alt="cant load" style=" position: absolute;
	top: 75%;
	left: 25%;
	width: 25%;
	margin-top: -250px;
	">
	
<img src="OPERATING SYSTEM ISSUES.png" class="img-responsive" alt="cant load" style=" position: absolute;
   top: 75%;
   left: 50%;
   width: 25%;
   margin-top: -250px;
   ">
   
<img src="HANG ISSUES.png" class="img-responsive" alt="cant load" style=" position: absolute;
	top: 75%;
	left: 63%;
	width: 25%;
	margin-top: -250px;
	margin-left: 150px;">
   
   

<br><br><br><br>
<br><br><br><br>


    <footer class="footer footer-primary bg-primary">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-md-6">
      				<p class="text-muted" style="color: white">DELL 2018</p>
            </div>
            <div class="col-md-6">
              <p class="text-muted" style="float: right; color: white">Terms of Service</p>
      			</div>
      		</div>
      	</div>
    </footer>

    <?php 
      if(isset($_SESSION['message']))
      {
        echo "<script>sweetAlert('".$_SESSION['message']."');</script>";
        unset($_SESSION['message']);
      }
    ?>
</body>
</html>