<?php
      include_once 'header.php';
      require_once 'dbh.inc.php';

      $_SESSION['e_id']="";

      if (isset($_POST['submit'])) {
        $_SESSION['e_id'] = $_POST['search'];
        header('Location: voter_vote.php');
      }

      $conn->close();

?>
        <img class="bg-img" src="../img/bg.png" alt="Election Hand Voting">
        <div class="container">
               <h2 class="vote">
                    Every vote counts.
               </h2>
               <p> The Online Election System is a platform for institutions to conduct their own elections or voting event polls. Register, know your election ID and let your choice count. </p>
                 <table class = "voters">
                   <form action="voting-page.php" method = "post">
                     <tr>
                       <td><input type="text" placeholder = "Election ID" name = "search"></td>
                       <td><button name="submit" type="submit"> VOTE NOW </button></td>
                     </form>
                   </tr>
                 </table>

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
