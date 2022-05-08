<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <title>course details</title>
</head>
<style type="text/css">
ul li {
    list-style: none;
}

.container-fluid {

    margin-bottom: 10px;
}

.instructor {
    display:flex;
    justify-content: space-between;
    align-items: center;
  
}

#course_content {
 
}

.col-md-4 img {
    width: 100%;


}
.card-body ul li{
   
    margin:5px 0px;
    padding:5px;
}

.card-body ul li a{
    
    color:black;
    font-family:san;
    font-weight:500;
    font-size:18px;
    padding:5px;
    text-decoration:none;
 }
</style>

<body>
    <?php
include("navbar.php"); ?>
    <?php include("db.php"); ?>
    <?php 
        $id=$_GET['courseid'];
        $get_course=$con->prepare("select * from course where course_id=$id");
        $sql="select *from course where course_id='$id' ";
        $result=mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result))
            {
                $course_name=$row['course_name'];
                $course_icon=$row['course_icon'];
                $course_desc=$row['course_desc'];
                $course_ins=$row['course_ins'];
                $course_fee=$row['course_fee'];  
                $course_icon=$row['course_icon'];               
            }
            
        ?>
    <?php
    if($count == 0)
    {
        echo"Error Found OOPs";

    }
    else
    {
    ?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-4">
                <img src="image/<?php echo $course_icon;?>">
            </div>
            <div class="col-md-8">
                <div class="d-flex align-items-center">
                    <h5>Course name:</h5>
                    <h6 style="margin-left:10px;"><?php echo $course_name;  ?></h6>
                </div>
                <p><b>Rating</b>*****</p>
                <p style="font-size:18px;font-family:san"><b>Description</b>:-<?php echo $course_desc;  ?></p>
                <div>
                    <a class="btn enroll" href="#">Enroll Now</a>
                    <p style="font-weight:500;margin-top:10px;">Price : <?php echo $course_fee;  ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8" id="course_content">
                <h4 class="text-center p-2 text-white" style="background:#4D1933"> Course Content</h4>
                <ul>
                    <li id="section_list">
                        <div class="section-header"  style="background:#F7F9FA">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#section1">
                                <h4 style="font-weight:bold;font-family:san;color:#4D1933">Section 1</h4>
                                <p> <i class="fa fa-plus" style="color:#4D1933"></i></p>
                            </button>

                        </div>
                        <div id="section1" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">Lesson 1</a></li>
                                    <li><a href="#">Lesson 2</a></li>
                                    <li><a href="#">Lesson 3</a></li>
                                    <li><a href="#">Lesson 4</a></li>
                                    <li><a href="#">Lesson 5</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li id="section_list">
                        <div class="section-header"  style="background:#F7F9FA">

                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#section2">
                                <h4 style="font-weight:bold;font-family:san;color:#4D1933">Section 2</h4>
                                <p> <i class="fa fa-plus" style="color:#4D1933"></i></p>
                            </button>

                        </div>
                        <div id="section2" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">Lesson 1</a></li>
                                    <li><a href="#">Lesson 2</a></li>
                                    <li><a href="#">Lesson 3</a></li>
                                    <li><a href="#">Lesson 4</a></li>
                                    <li><a href="#">Lesson 5</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li id="section_list">
                        <div class="section-header"  style="background:#F7F9FA">

                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#section3">
                                <h4 style="font-weight:bold;font-family:san;color:#4D1933">Section 3</h4>
                                <p> <i class="fa fa-plus" style="color:#4D1933"></i></p>
                            </button>

                        </div>
                        <div id="section3" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">Lesson 1</a></li>
                                    <li><a href="#">Lesson 2</a></li>
                                    <li><a href="#">Lesson 3</a></li>
                                    <li><a href="#">Lesson 4</a></li>
                                    <li><a href="#">Lesson 5</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="col-lg-4">
                <h5 style="background:#4D1933;color:white;text-align:center;padding:10px;">About Instructor</h5>
                <div class="instructor ">
                    <h5>Name-<span style="font-size:20px"><?php echo $course_ins;  ?></span></h5>
                        <img style="border-radius:50%;"  src="image/img1.jpg" width="100px" height="100px;">
                </div>
                <p style="font-family:san;font-size:18px">Put it all together and your pages should look like this:Description:-Be sure to have Be sure to have
                    your pages set up with the latest design and development standards. Thaaviors.
                    Put it all together and your pages should look like this:Description:-Be sure to have your pages set
                    up with theor proper responsive behaviors. Put it all together a your pages set up with theor proper
                    responsive behaviors. Put it all together and your pages should look like this: your pages should
                    look like this:</p>
            </div>

        </div>

    </div>

    <div class=" text-center">
        <h4 id="copyright">
            copyright@2022 EasyLearning</h4>

    </div>





    <script>
    $(document).ready(function() {
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function() {
            $(this).prev(".section-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function() {
            $(this).prev(".section-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function() {
            $(this).prev(".section-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

</body>

</html>
<?php
}
?>