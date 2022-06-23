<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Online Election System | Home</title>
</head>
<body id="entire">
       <div class="top">
           <div class="title">
               Online Election System
           </div>     
           <div class="start">  
                <?php
                
                if(isset($_SESSION['adminid'])) {
                    // greeting admins
                    require_once 'dbh.inc.php';
                    $access = $conn->prepare("select concat('Hello, ', firstName,' ', lastName, '!') as 'name' from admin_tbl where id = ?");
                    $access->bind_param('i', $_SESSION['adminid']);
                    $access->execute();
                    $result = $access->get_result();
                    if ($result->num_rows > 0){
                        $data = $result -> fetch_assoc();
                        echo "<div class='greet'><p> ". $data['name']."</p><a href='log_out.php'class='log-out'>Log Out</a> </div>";
                    }
                  
                } else if(isset($_SESSION['voterid'])){ 
                    // greeting voters
                    require_once 'dbh.inc.php';
                    $access = $conn->prepare("select concat('Hello, ', firstName,' ', lastName, '!') as 'name' from voter_tbl where id = ?");
                    $access->bind_param('i', $_SESSION['voterid']);
                    $access->execute();
                    $result = $access->get_result();
                    if ($result->num_rows > 0){
                        $data = $result -> fetch_assoc();
                        echo "<div class='greet'><p> ". $data['name']."</p><a href='log_out.php'class='log-out'>Log Out</a> </div>";
                    }

                }else {
                    echo " <a href='voter_log.php'class='log-in'>Log In</a>";
                    echo "<a href='registration.php' class='reg'>Register</a>" ;                                    

                }
                ?>
          </div>
        </div>

        <nav>  
            <div class="main-nav">
                 <ul class="menu">
                      <li>
                           <a href="home.php">Home</a>
                      </li>
                    <?php
                        if(isset($_SESSION['adminid'])) {
                            echo "<li> <a href='admin-views/manage-elections.php'>Manage Elections</a></li>";
                            echo "<li> <a href='admin-views/admin-results.php'>View Results</a></li>";
                        } else if (isset($_SESSION['voterid'])){
                            echo "<li> <a href='voter-views/voting-page.php'>Vote</a></li>";
                            echo "<li> <a href='voter-views/voter-results.php'>View Results</a></li>";
                            
                        } else {
                            echo "<li><a href='admin_log.php'>Administrator</a></li>";
                            echo "<li><a href='voter_log.php'>Voter</a></li>";
                        }

                    ?>
                     
                      <li>
                           <a href="help.php">Help</a>
                      </li>
                      <li>
                           <a href="contact.php">Contact Us</a>
                       
                      </li>
        
                 </ul>
            </div>
        </nav>
</body>
</html>