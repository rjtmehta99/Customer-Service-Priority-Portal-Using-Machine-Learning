<?php 
  session_start();
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location:index.php');
    exit;
  }

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
		          	<a href="dashboard.php"><img src="images/logo.png" class="navbar-brand" alt="logo" style="height: 100px"></a>
		          	<ul class="nav navbar-nav">

          				<li><a href="dashboard.php" style="color: white;">Home</a></li>
                  <li><a href="dashboard.php" style="color: white;">About</a></li>
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
		    <div class="col-md-6"></div>
        <div class="col-md-7">
				<div id="navbar" class="collapse navbar-collapse">
        				<ul class="nav navbar-nav">
          				<li class="dropdown">
            					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <a href="#" role="button" aria-haspopup="true" aria-expanded="false">Signed in as: <?php echo $_SESSION['username']; ?> <span class="caret"></span></a></button>
            					<ul class="dropdown-menu">
              					<li><a href="add_complaints.php">Add Complaint</a></li>
              					<li><a href="dashboard.php">View Complaints</a></li>
                        <li class="divider"></li>
              					<li><a href="logout.php">Logout</a></li>
            					</ul>
          				</li>
        				</ul>
      	</div>
		    </div>
      	</div> 
    	</div>
      
    </nav>
<br>
<br>
<div class="container" style="margin-top: 10%;">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">Add Complaint</div>
            <div class="panel-body">
              <form name="addComplaint" action="complaint_filed.php" method="POST">
                <div class="form-group">
                  <label for="title">Complaint Type:</label>
                  <select class="form-control" id="title" name="title" required>
                <option></option>
                <option>battery</option>
                <option>heating</option>
                <option>slow</option>
                <option>speaker</option>
                <option>keyboard</option>
                <option>display</option>
                </select>
                </div>
          
                <div class="form-group">
                  <label for="body">Complaint Description:</label>
                  <textarea id="body" class="form-control" name="body" rows="4" required></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary form-control" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

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

       # echo $_SESSION['email'];
  #echo "pppp";
    ?>


</body>
</html>