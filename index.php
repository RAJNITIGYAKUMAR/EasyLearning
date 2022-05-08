<?php
include('db.php');
 session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <title>Learn Here</title>
    <style type="text/css">
    img {
        height: 100vh;
        width: 100%;
    }

    #explore_course {}

    #explore_class {}

    #explore_subject {}



    .card {
        margin: 0 auto;
        /* Added */
        float: none;
        /* Added */
        /* Added */
    }



    .card-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .course_section {

        padding-left: 10px;
        padding-right: 10px;
    }

    /* .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-nav .owl-prev */

    .owl-carousel .owl-nav button.owl-prev {
        font-size: 35px;
        position: absolute;
        left: 0;
        top: 50%;
        color: #4d1933;
        outline: none;

        transform: translate(-50%, -50%);
    }

    .owl-carousel .owl-nav button.owl-next {
        position: absolute;
        right: -10px;
        top: 50%;
        font-size: 35px;
        outline: none;
        transform: translate(-50%, -50%);
        color: #4d1933;

    }

    .owl-carousel .owl-nav {
        display: block !important;


    }



    .slider_div {
        width: 100%;
        height: 400px;
    }

    .slider_div img {
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>



    <?php
include("navbar.php"); ?>

    <div class="owl-carousel owl-theme slider">
        <div class="item slider_div"><img src="image/img5.jpg"></div>
        <div class="item slider_div"><img src="image/img6.jpg"></div>
        <div class="item slider_div"><img src="image/img1.jpg"></div>

    </div>


    <div class=" d-flex searchbox">
        <div class="search1">
            <h3> SEARCH FOR COURSE</h3>
        </div>
        <div class="categories">
            <form>
                <select name="Course" form="courseform">
                    <option value="volvo" selected>All Categories </option>
                    <option value="saab">Categories 2</option>
                    <option value="opel">Categories 3</option>
                    <option value="audi">Categories 4</option>
                </select>
                <input type="text" name="coursename" placeholder="Enter Course Name">
                <button>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>

            </form>

        </div>
    </div>
    <h4 class="heading" style="">Explore courses</h4>

    <div class="container-fluid" id="explore_course">

        <div class="owl-carousel course_section mr-auto">
            <?php
                      $sql="select *from  course "; 
                      $result=mysqli_query($con,$sql);
                      while ($row=mysqli_fetch_assoc($result)) {                
                      echo"
                      <div class='card' >
                          <img src='image/".$row['course_icon']."' class='card-img-top' style='height: 12rem; alt='..'>  
                           <div class='card-body'>
                           <h5 class='card-title'>".$row['course_name']."</h5>
                           <p class='card-title' >".$row['course_desc']."</p>
                           <a href='course.php?courseid=".$row['course_id']."' class='btn enroll'>Enroll Now</a> 
                           </div>
                       </div>";
                          }
                    ?>
        </div>
    </div>

    <h4 class="heading"> Explore Class</h4>

    <div class="container-fluid" id="explore_subject">

        <div class="owl-carousel course_section  mr-auto">
            <?php

                   
                    $sql="select * from  class "; 
                    $result=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_assoc($result)) {                
                      echo"
                      <div class='card'>
                          <img src='image/".$row['class_icon']."' class='card-img-top' style='height: 12rem; alt='..'>  
                           <div class='card-body'>
                           <h5 class='card-title'>".$row['class_name']."</h5>
                           <a href='course_class.php?classid=".$row['class_id']."' class='btn enroll'>Explore Now</a> 
                           </div>
                       </div>";
                           }
                      
                      
                    ?>
        </div>

    </div>

    <h4 class="heading">Explore Categories</h4>
    <div class="container-fluid" id="explore_class">

        <div class="owl-carousel course_section mr-auto">
            <?php

                  
                    $sql3="select *from  categories "; 
                    $result3=mysqli_query($con,$sql3);
                    while ($row3=mysqli_fetch_assoc($result3)) {               
                      echo"
                      <div class='card' >
                          <img src='image/".$row3['cat_icon']."' class='card-img-top' style='height: 12rem; alt='..'>  
                           <div class='card-body'>
                           <h5 class='card-title'>".$row3['cat_name']."</h5>
                           <a href='course_cat.php?cat_id=".$row3['cat_id']."' class='btn enroll'>Explore Now</a> 
                           </div>
                       </div>";
                           }
                      
                      
                    ?>
        </div>

    </div>



    <div class=" text-center">
        <h4 id="copyright">
            copyright@2022 EasyLearning</h4>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>

  
  

    <script type="text/javascript">
    $('.course_section').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4

            }
        }
    })
    </script>
    <script>
    $('.slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true

            }
        }
    })
    </script>
</body>

</html>