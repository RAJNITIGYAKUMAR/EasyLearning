<?php
session_start();
include('../db.php');
// Validating Session
if(!isset($_SESSION['email']))
{
header('location:../index.php');
}
else{

$username=$_SESSION['email'];

    
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Instructor</title>
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
          <div >  
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
  		<h3>Instructor Details</h3>
  		<button  onclick="cat_form()" >Add Instructor</button>
  	</div>
  	<div >
     	<form id="cat_form" method="post" action="" enctype="multipart/form-data">
			 <div class="form-group" >
			    <label >Instructor Name</label>
			    <input type="text" class="form-control" name="name"  required="">
			  </div>
			  <div class="form-group">
			    <label >Instructor Image</label>
			    <input type="file" class="form-control" name="image" required="">
			  </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="form-control" name="email"  required="">
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="password"  required="">
        </div>        
      <div class="form-group">
          <label >Mobile</label>
          <input type="phone" class="form-control" name="mobile"  required="">
        </div>
			  <center><button type="submit" class="btn btn-primary" name="add_ins">Add Instructor</button></center>
		</form>
  	</div>
  	<div>
  		<table cellspacing="0" class="table   table-responsive-md">
		<tr>
			<th scope="col">SR No.</th>
			<th scope="col">ID</th>
			<th scope="col"> Name</th>
			<th scope="col">image</th>
			<th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile</th>
			<th scope="col">Action</th>
			
		</tr>
<?php

  $get_cat="select * from instructor";
  $res=mysqli_query($con,$get_cat);
 
  $i=1;
  while($row=mysqli_fetch_assoc($res))
    echo"<tr>
            <td>".$i++."</td>
                  
            <td>".$row['ins_id']."</td>
            <td>".$row['name']."</td>
            <td><img src='../image/".$row['ins_img']." 'height='50' width='50'/></td>
            <td>".$row['email']."</td>
            <td>".$row['password']."</td>
            <td>".$row['mobile']."</td>
            <td>
                <a  title='Edit' href='instructor.php?edit_class=".$row['ins_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> 
                <a title='Delete' href='instructor.php?del_class=".$row['ins_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </td>
         
           

       </tr>";
  }

   if(isset($_GET['del_class'])){
    $id=$_GET['del_class'];
    $del="delete  from instructor where ins_id='$id'";
    if(mysqli_query($con,$del)){
      echo "<script>alert('instructor delete successfully')</script>";
      echo "<script>window.open('instructor.php','_self')</script>";
    }else{
      echo "<script>alert('instructor not delete successfully')</script>";
      echo "<script>window.open('instructor.php','_self')</script>";

    }
   }

    ?>
  </table>
    </div>
      </div>
              
  </div>

<?php 
include("../db.php");
  if(isset($_POST['add_ins'])){
    $name=$_POST['name']; 
    $password=$_POST['password'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];       
    if(isset($_FILES['image']))
    {
      $errors= array();
      // print_r($_FILES);exit;
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];


     $files= explode('.',$file_name);
     $file_ext=strtolower(end($files));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../image/".$file_name);
         // echo "Success";
      }else{
         print_r($errors);
      }
   }
    $check="select * from instructor where email='$email'";
   
    $res=mysqli_query($con,$check);
    $count=mysqli_num_rows($res);

    if($count==1)
    {
       echo"<script>alert('email Already Added')</script>";
       echo"<script>window.open('instructor.php','_self')</script>";
    }
    else{
      $add_class="insert into instructor(name,ins_img,email,password,mobile)values('$name','$file_name','$email','$password',
        '$mobile')";
    if(mysqli_query($con,$add_class))
    {
      echo"<script>alert('Instructor added successfully')</script>";
      echo"<script>window.open('instructor.php','_self')</script>";
    }else{
      echo"<script>alert('instructor not added successfully')</script>";
      echo"<script>window.open('instructor.php','_self')</script>";
    }

    
    
  }




?>





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