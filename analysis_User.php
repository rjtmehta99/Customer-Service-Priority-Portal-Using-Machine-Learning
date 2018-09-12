<?php 
  session_start();
  require_once "config.php";
  $sql = "SELECT * FROM `complaints` WHERE `User_id` = 1";
  $result =$mysql->query($sql);
  $complaints = array();
  
  while ($row = $result->fetch_assoc()){
    $complaints[] = $row;
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
    <?php 
	print_r($complaint['Complain_details'])
	?>
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
<br><br><br><br><br><br><br><br>
<br><br><br><br>


<div class="container">
<div class="col-md-11">
  
<div class="row">
	<div class="col-md-15">

<table class="table table-bordered" style="border-width: 3px;">
    <thead>
      <tr>
        <th>S.No.</th>
        <th width="400px">Complaint Type</th>
        <th>Track Complaint</th>
        <th width="200px">Days Left</th>
        <th>Get A Quick Solution</th>
      </tr>
    </thead>
    <tbody>
	
      <?php foreach ($complaints as $key => $complaint) {
        ?>
        <tr>
          <td><?php echo $key + 1 ?></td>
          <td><?php echo $complaint['Category'] ?></td>
          <td><button class="btn btn-default" style="height:30px;width:150px" onclick="getDaysLeft(<?php echo $complaint['Complaint_id'] ?>)">Track</button></td>
          <td><span id="dl<?php echo $complaint['Complaint_id'] ?>"></span></td>
       <!--   <form name="mailingForm" class="form-horizontal" action="mailing.php" target="_blank">
          <td><input type="submit" name="mailing" class="btn btn-default" style="height:30px;width:150px" value="Quick Solution">
          </td></form>  -->
		  <td><button class="btn btn-default" style="height:30px;width:150px" onclick="getUserinfo('<?php echo addslashes($complaint['Complain_details']) ?>')">Quick Solution</button></td>
        </tr>
      <?php  
      }?>
    </tbody>
  </table>
</div>
</div>
<br>
	<div class="col-md-5"></div>
	<div class="col-md-5">
  <div class="submit-butt">
  <form name="complaintForm" class="form-horizontal" action="add_complaints.php" method="POST">
    <input type="submit" class="btn btn-primary" value="Add New Complaint" style="height:40px;width:150px">
    </div>
</div>
  </form>
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
    ?>

<script type="text/javascript">
  function getDaysLeft(complaint_id){
    $.get('http://localhost:5555/?u_id=1&c_id='+complaint_id, function(data){
      $("#dl"+complaint_id).html(data);
    });
  }
  
  function getUserinfo(complain_details){
    $.get('http://localhost:5555/mailer?user_email=<?php echo $_SESSION['email']?>&complain_details='+complain_details);
  }
  
  
</script>
</body>
</html>