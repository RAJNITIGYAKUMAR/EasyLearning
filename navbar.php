 
<nav class="navbar navbar-expand-lg  navbar-light  ">
  <a class="navbar-brand text-white" href="#">EasyLearning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="all_course.php">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Contact Us</a>
      </li>
    </ul>
    <div class="access">
        <?php
           
       
        if(isset($_SESSION['username']))
        {
            echo '<a id="ragister" href="student/dashboard.php" class="btn"  >Dashboard</a>';
        }
        else{
            echo '<button id="login"  class="btn" data-toggle="modal" data-target="#exampleModalLong">Login</button>
            <button id="ragister" class="btn"  data-toggle="modal" data-target="#exampleModalregister">Register</button>
           '; 
        }
   ?>
  </div>    
  </div>
</nav>



<!-- Admin Modal -->
<!-- <div class="modal fade" id="adminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLongTitle">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                           <div class="modal-body">
                      
                                <form id="login-form" class="form" action="admin_login.php" method="post">                           
                                    <div class="form-group">
                                        <label for="username" class="text-info">Email:</label><br>
                                        <input type="email" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                                    </div>
                                    <div id="register-link">
                                      <a href="#" class="text-info">forgot password ?</a>
                                    </div>
                                </form>
                              </div>
    </div>
  </div>  
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLongTitle" style="color:#4d1933">Student Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#4d1933">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="login-form" class="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="username" class="textinfo">Email:</label><br>
                        <input type="email" name="username" id="lusername" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="textinfo">Password:</label><br>
                        <input type="password" name="password" id="lpassword" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn  btn-md" style="background:#4d1933;color:white" value="Login">
                    </div>
                    <div id="register-link">
                        <a href="#" class="textinfo">forgot password ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ragisterModal -->
<div class="modal fade" id="exampleModalregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLongTitle" style="color:#4d1933">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#4d1933">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="register-form" class="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="name" class="textinfo">Name:</label><br>
                        <input type="text" name="name" id="name" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <label for="username" class="textinfo">Email:</label><br>
                        <input type="email" name="email" id="username" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="textinfo">Mobile:</label><br>
                        <input type="phone" name="mobile" id="mobile" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="textinfo">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="textinfo">Confirm Password:</label><br>
                        <input type="password" name="password" id="cpassword" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Register" style="color:white;background:#4d1933" class="btn  btn-md text-center" value="Register">
                    </div>
                    <div id="register-link">Already Register ?
                        <a href="#" class="textinfo" data-dismiss="modal" type="button" data-toggle="modal"
                            data-target="#exampleModalLong" style="color:#4d1933">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>