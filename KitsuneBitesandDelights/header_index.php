<style>
    /* Custom styles */
    .custom-bg-grey {
        background-color: #f0f0f0; /* Grey background color */
    }
    .custom-input-pink {
        border-color: #ff85a2 !important; /* Pink border color */
    }
    .custom-btn-pink {
        background-color: #ff85a2; /* Pink button background color */
        border-color: #ff85a2; /* Pink button border color */
        color: #fff; /* White button text color */
    }
    .custom-btn-pink:hover {
        background-color: #d9466f; /* Darker shade of pink on hover */
        border-color: #d9466f; /* Darker shade of pink on hover */
    }
    .custom-register-pink {
        color: #ff85a2;
        border-color: #ff85a2; /* Pink text color */
    }
    .custom-register-pink:hover {
      background-color: #d9466f; /* Darker shade of pink on hover */
      border-color: #d9466f;  /* Pink text color */
    }
</style>

<div class="row custom-bg-grey"> <!-- Changed background color to grey -->
    <div class="col-1 p-0">
        <div class="container-fluid p-0 m-0">
            <div class="row">
                <div class="col-6">
                    <img src="img/brandLogo.jpeg" width="60px" alt="" class="img-fluid ms-0">
                </div>
                <div class="col-6">
                    <figure class="text-start">
                        <blockquote class="blockquote">
                           
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <cite title="Source Title">2024</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-4 pt-3 ps-4">
        <!-- Navigation-->
        <?php include_once "navigation.php"; ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="mb-3 mt-3">
            <form action="process_login.php" method="POST">
                <div class="input-group">
                    <input name="f_username" type="text" class="form-control custom-input-pink" placeholder="Username">
                    <input name="f_password" type="password" class="form-control custom-input-pink" placeholder="Password">
                    <input type="submit" value="Login" class="btn btn-success custom-btn-pink"> <!-- Changed login button to pink -->
                    <a href="registration.php" class="btn btn-outline-success custom-register-pink">Create Account</a> <!-- Changed text for registration to pink -->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row p-0">
           
           <div id="carouselExample" class="carousel slide m-0 p-0">
              <div class="carousel-inner">
                <div class="carousel-item active m-0 p-0">
                  <img src="img/1.jpeg" class="d-block w-100 m-0" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="img/2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/4.jpeg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
        </div>
       </div>
       
      
       <div class="row">
           
           <div class="col-12">
               <center>
               <h1 class="display-1">Kitsune Bites & Delights</h1>
               </center>
           </div>
           
       </div>