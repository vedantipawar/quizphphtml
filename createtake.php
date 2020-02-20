<?php 

   $con = mysqli_connect('localhost','root');
   if($con){
      echo"index";
   }

   mysqli_select_db($con,'quizdatabase');

?>






<!DOCTYPE html>
<html>
<head>
   <title></title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
<!-- 
    font-family: 'Montserrat', sans-serif; 
   font-family: 'Open Sans', sans-serif;
   -->
<br>
<div>
    <h7 class="text-center text-white font-weight-bold text-uppercase bg-dark" > The start date is: </h7><br>
<?php
                $sql3 = "SELECT start_date FROM `questions` WHERE `qid` = 1 ";
                        $result3 = mysqli_query($con, $sql3);
                        
                        $new = mysqli_fetch_assoc($result3);
                        $late= $new['start_date'];
                       
                        printf($late);
                        $sql4 = "SELECT end_date FROM `questions` WHERE `qid` = 1 ";
                        $result4 = mysqli_query($con, $sql4);
            ?>
            <br>
            <h8 class="text-center text-white font-weight-bold text-uppercase bg-dark" > The end date is: </h8><br>
            <?php
                        $new1 = mysqli_fetch_assoc($result4);
                        $late1= $new1['end_date'];
                        //echo "  The end date is:";
                        printf($late1);
                        
            ?>
</div>

</head>
<body>

   <div class="container">
      <h1 class="text-center"> Welcome to Quiz World </h1><br>

      <div class="row">
         
         <div class="col-lg-6">
            <div class="card">
               <h4 class="card-header text-center"> Login Form </h4>
               <br>
               <form action="login.php" method="post">
                  <div class="form-group">
                     <label for="user "> Username: </label>
                     <input type="text" name="user" id="user" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="pass "> Password: </label>
                     <input type="Password" name="pass" id="pass" class="form-control">
                  </div>
                  <button class="btn btn-success d-block m-auto" type="submit"> Submit </button>
                  <br>
                  <a href="forgotpassword.php" class="btn btn-primary d-block m-auto text-white" > Forgot password? </a> <br>
               </form>
            
            </div>
         </div>

         <div class="col-lg-6">
            <div class="card">
               <h4 class="card-header text-center"> SignUp Form </h4>
               <br>
               <form action="registration.php" method="post">
                  <div class="form-group">
                     <label for="email"> email: </label>
                     <input type="text" name="user" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="user "> Username: </label>
                     <input type="text" name="user" id="user" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="pass "> Password: </label>
                     <input type="Password" name="pass" id="pass" class="form-control">
                  </div>
                  <button class="btn btn-success d-block m-auto" type="submit"> Submit </button>
                  <div class="duplicate"> </div>
               </form>

            </div>
         </div>
            </div>
         </div>

      </div>

   </div>
   

</body>
</html>