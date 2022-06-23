<?php
    include_once 'header.php';

     $error="";
     $incorrect="";
     //check if login button is clicked
     if (isset($_POST['login'])){
     //store inputs in the variables
     $email = $_POST['email'];
     $password = $_POST['password'];
                
     // Database
     require_once 'dbh.inc.php';
          $access = $conn->prepare("select * from admin_tbl where email = ?");
          $access->bind_param('s', $email);
          $access->execute();
          $result = $access->get_result();
          if ($result->num_rows > 0){     //0 zero indicates that email is not a match. Must return 1 as its value
               $data = $result -> fetch_assoc();   //get the data from the entire row
               if ($data ['password'] === $password){  //compare the password from data base and from login input.
                    echo "Login successfully!";
                    // Store stuff in session variables
                    $_SESSION['adminid'] = $data['id']; 
                    header('Location: home.php');
               }else {
                    $incorrect = "Incorrect Password!";
                    $error ="";     
                    
               }
          }else {
               $error = "Invalid Email!";
               $incorrect = "";
          }
}
?>
        <!-- Log In Form -->
        <div class="log-in"> 
          <div class="subtitle">
                Administrator's Log In
          </div>  

          <div class="form">
            <form action="admin_log.php" method ="post">
                <div>
                <label class="labels" for="email"><b>Email</b></label> <br>
                <input class="inputs" type="text" name="email" id="email" required>
                <p class= "error"> <?=$error?> </p>
                <br> <br> <br>

                <label class="labels" for="password"><b>Password</b></label> <br>
                <input class="inputs" type="password" name="password" id="password" required>
                <p class= "incorrectPW"> <?=$incorrect?> </p>
                </div>

                <input type="submit" name="login" value="LOG IN" class="logButton">
            </form>
          </div>

          <div class="signup">
            <p>Not registered yet? <a href="registration.php">Register here</a>.</p>
          </div>

        </div>
     
     <!-- Hihglight navigation bar for voters-->
     <style>
          #admin-log {
               color: #1b2459;
               border: 10px solid transparent;
               background-color: #e2e3eb;
               border-color: #e2e3eb;
              
          }
     </style>

