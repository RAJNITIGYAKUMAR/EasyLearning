<?php
session_start();
include('../db.php');
// Validating Session
if(! isset($_SESSION['email']))
{
header('location:../index.php');
}
else{
?>
<?php

$username=$_SESSION['email'];
$check="select * from admin where name='$username'";
   $res=mysqli_query($con,$check);
$row=mysqli_fetch_assoc($res);
    
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <style type="text/css">
  	h3{
  		
  		text-align: center;

  	}
  	#cat_form{
  		
  		margin:10px;
  		display: none;

  	}
  </style>

  
  <body>

<div class="header sticky-top">
       
      <div class=" welcome container">

          <div >  
            <h4><a href="../index.php">SuccessCurve</a></h4>
          </div>
          <div id="welcome_user">   
            <h4>Welcome to <?php echo $username; ?></h4>
          </div>
          <div class="logoutChangepswd"> 
            <a href="#">Change Password</a>
            <a href="../admin_logout.php">Logout</a>
           </div>        
      </div>
    </div>
    

   <?php include("../admin_sidebar.php"); ?>
      <div class="rightside">
              <div >
  		<h3>Admin Profile</h3>
  		<button  onclick="cat_form()" >Add Class</button>
  	</div>
  	<div >
     	<form id="cat_form" method="post" action="" enctype="multipart/form-data">
			 <div class="form-group" >
			    <label >Categories Name</label>
			    <input type="text" class="form-control" name="cat_name"  required="">
			  </div>
			  <div class="form-group">
			    <label >Categories Icon</label>
			    <input type="file" class="form-control" name="image" required="">
			  </div>
			  <div class="form-group">
			    <label >Categories Description</label>
			    <input type="text" class="form-control" name="cat_desc"  required="">
			  </div>
			  <center><button type="submit" class="btn btn-primary" name="add_cat">Add Categories</button></center>
		</form>
  	</div>
  	<div>
  		<table cellspacing="0" class="table   table-responsive-md">
		<tr>
			<th scope="col">SR No.</th>
			<th scope="col">Student ID</th>
			<th scope="col">Student Name</th>
			<th scope="col">Student image</th>
			<th scope="col">student Email</th>
      <th scope="col">Mobile</th>
			<th scope="col">Action</th>
			
		</tr>
	</table>
  	</div>
      </div>
              
  </div>







  	<div class="rightside container">
  	
  </div>

  <script type="text/javascript">

  	    
    function cat_form()
    {
    	var x = document.getElementById("cat_form");
        if(x.style.display === "none")
        x.style.display="block";
        else
        x.style.display="none";
    }
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php }?>