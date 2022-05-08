<?php
session_start();
include('../db.php');
// Validating Session
if(!isset($_SESSION['email']))
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Class</title>
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
  		<h3>Class Detais</h3>
  		<button  class="btn" onclick="cat_form()" >Add Class</button>
  	</div>
  	<div >
     	<form id="cat_form" method="post" action="" enctype="multipart/form-data">   
			 <div class="form-group" >
			    <label >Class Name</label>
			    <input type="text" class="form-control" name="class_name"  required="">
			  </div>
			  <div class="form-group">
			    <label >Class Icon</label>
			    <input type="file" class="form-control" name="image" required="">
			  </div>
			  <div class="form-group">
			    <label >Class Description</label>
			    <input type="text" class="form-control" name="class_desc"  required="">
			  </div>
			  <center><button type="submit" class="btn btn-primary" name="add_class">Add Class</button></center>
		</form>
  	</div>
  	<div>
  		<table cellspacing="0" class="table   table-responsive-md">
		<tr>
			<th scope="col">SR No.</th>
			<th scope="col">class ID</th>
			<th scope="col">Class Name</th>
			<th scope="col">CLass image</th>
      <th scope="col">CLass Desc</th>
			<th scope="col">Action</th>
			
		</tr>

    <?php
 
 $get_cat="select * from class";
 $result=mysqli_query($con,$get_cat);

$i=1;
while($row=mysqli_fetch_assoc($result)){ 
    echo"<tr>
            <td>".$i++."</td>
                  
            <td>".$row['class_id']."</td>
            <td>".$row['class_name']."</td>
            <td><img src='../image/".$row['class_icon']."' height='50' width='50'/></td>
            <td>".$row['class_desc']."</td>
            <td>
                <a  title='Edit' href='class.php?edit_class=".$row['class_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> 
                <a title='Delete' href='class.php?del_class=".$row['class_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </td>
         
           

       </tr>";
}

   if(isset($_GET['del_class'])){
    $id=$_GET['del_class'];
    $del="delete  from class where class_id='$id'";
    if(mysqli_query($con,$del)){
      echo "<script>alert('class delete successfully')</script>";
      echo "<script>window.open('class.php','_self')</script>";
    }else{
      echo "<script>alert('class not delete successfully')</script>";
      echo "<script>window.open('class.php','_self')</script>";

    }
   }

    ?>
	</table>
  	</div>
      </div>
              
  </div>

<?php 

  if(isset($_POST['add_class'])){
    $class_name=$_POST['class_name']; 
    $class_desc=$_POST['class_desc'];       
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
    $check="select * from class where class_name='$class_name'";
    $res=mysqli_query($con,$check);
    $count=mysqli_num_rows($res);

    if($count==1)
    {
           echo"<script>alert('class Already Added')</script>";
       echo"<script>window.open('class.php','_self')</script>";
    }
    else{
      $add_class="insert into class(class_name,class_icon,class_desc)values('$class_name','$file_name','$class_desc')";
    if(mysqli_query($con,$add_class))
    {
      echo"<script>alert('class added successfully')</script>";
      echo"<script>window.open('class.php','_self')</script>";
    }else{
      echo"<script>alert('class not added successfully')</script>";
      echo"<script>window.open('class.php','_self')</script>";
    }

    }
    
  }




?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
  
  </body>
</html>
<?php }?>