<?php
session_start();
include('../db.php');
// Validating Session
if(!isset($_SESSION['username']))
{
header('location:../index.php');
}
else{
?>
<?php

$username=$_SESSION['username'];
$check=$con->prepare("select * from admin where name='$username'");
    $check->setFetchMode(PDO:: FETCH_ASSOC);
    $check->execute();
    $row=$check->Fetch();
    
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

    <title>Student Details</title>
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

<div class="header">
       
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
  		<h3>Student Details</h3>
  		<button  onclick="cat_form()" >Add Student</button>
  	</div>
  	<div >
     	<form id="cat_form" method="post" action="" enctype="multipart/form-data">
			 <div class="form-group" >
			    <label >Student Name</label>
			    <input type="text" class="form-control" name="name"  required="">
			  </div>
			  <div class="form-group">
			    <label >Student Image</label>
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
			  <center><button type="submit" class="btn btn-primary" name="add_student">Add Student</button></center>
		</form>
  	</div>
  	<div>
  		<table cellspacing="0" class="table   table-responsive-md">
		<tr>
			<th scope="col">SR No.</th>
			<th scope="col"> ID</th>
			<th scope="col"> Name</th>
			<th scope="col">image</th>
			<th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile</th>
			<th scope="col">Action</th>
			
		</tr>
	<?php
  include("../db.php");
   $get_cat=$con->prepare("select * from student");
  $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  $i=1;
  while($row=$get_cat->Fetch()):
    echo"<tr>
            <td>".$i++."</td>
                  
            <td>".$row['student_id']."</td>
            <td>".$row['name']."</td>
            <td><img src='../image/".$row['stud_img']." 'height='50' width='50'/></td>
            <td>".$row['email']."</td>
            <td>".$row['password']."</td>
            <td>".$row['mobile']."</td>
            <td>
                <a  title='Edit' href='student_details.php?edit_class=".$row['student_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> 
                <a title='Delete' href='student_details.php?del_class=".$row['student_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </td>
         
           

       </tr>";
  endwhile;

   if(isset($_GET['del_class'])){
    $id=$_GET['del_class'];
    $del=$con->prepare("delete  from student where student_id='$id'");
    if($del->execute()){
      echo "<script>alert('student delete successfully')</script>";
      echo "<script>window.open('student_details.php','_self')</script>";
    }else{
      echo "<script>alert('student not delete successfully')</script>";
      echo "<script>window.open('student_details.php','_self')</script>";

    }
   }

    ?>
  </table>
    </div>
      </div>
              
  </div>

<?php 
include("../db.php");
  if(isset($_POST['add_student'])){
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
    $check=$con->prepare("select * from student where email='$email'");
    $check->setFetchMode(PDO:: FETCH_ASSOC);
    $check->execute();
    $count=$check->rowCount();

    if($count==1)
    {
       echo"<script>alert('email Already Added')</script>";
       echo"<script>window.open('student_details.php','_self')</script>";
    }
    else{
      $add_class=$con->prepare("insert into student(name,stud_img,email,password,mobile)values('$name','$file_name','$email','$password',
        '$mobile')");
    if($add_class->execute())
    {
      echo"<script>alert('student added successfully')</script>";
      echo"<script>window.open('student_details.php','_self')</script>";
    }else{
      echo"<script>alert('class not added successfully')</script>";
      echo"<script>window.open('student_details.php','_self')</script>";
    }

    }
    
  }




?>







  	<div class="rightside container"></div>

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