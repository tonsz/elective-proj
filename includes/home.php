<?php
     include_once 'header.php';
?>
        <img class="bg-img" src="../img/bg.png" alt="Election Hand Voting">
        <div class="container">
               <h2 class="vote">
                    Every vote counts.
               </h2>
               <p> The Online Election System is a platform for institutions to conduct their own elections or voting event polls. Register, know your election ID and let your choice count. </p>
               <?php
                    if(isset($_SESSION['adminid'])) {
                         echo "<a href=create-election.php' class='home-btn'>CREATE ELECTIONS</a>";

                    } else if (isset($_SESSION['voterid'])) {
                         echo "<a href=voting-page.php' class='home-btn'>VOTE NOW</a>";

                    } else {
                         echo "<a href='voter_log.php' class='home-btn'>VOTE NOW</a>";
                    }
               ?>
               
               
        </div>   
        <style>
          .bg-img {
               position: absolute;
               left: 0;
               top: 0;
               width: 100%;
               height: 100vh;
               z-index: -1;
          }
        </style>
</body>
</html>