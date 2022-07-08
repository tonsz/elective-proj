<?php

  $error ="";
  $success="";
  $msg=""; // message if already voted

  include_once 'header.php';
  require_once 'dbh.inc.php';

  // check if vote_status is set from voting-page.php
  if (isset($_SESSION['vote_status'])) {

    $msg =' <span style= "color:gray;">You have already voted for this election </span>';

  }


  // fetch election details
  $access = $conn->prepare("select * from elections_tbl where e_id = ?");
  $access->bind_param('i', $_SESSION['e_id']);
  $access->execute();
  $e_result = $access->get_result();
  // store election details in $elec
  if ($e_result->num_rows > 0){
    $elec = $e_result -> fetch_assoc();
  }

  // fetch candidate details
  $access = $conn->prepare("select * from candidates_tbl where cand_election = ?");
  $access->bind_param('i', $_SESSION['e_id']);
  $access->execute();
  $result = $access->get_result();
// there are multiple rows, so the records are to be stored in an array
// accessed via foreach loop
  $details = array();
  while ($row = $result->fetch_array()){
    $details[] = $row; // storing every row in details array



    // if the any of the vote buttons are clicked
    // each one of them is identifiable by original cand_id in name='' attribute
    if (isset($_POST[$row['cand_id']])){
      $e_id = $row['cand_election'];
      $c_id = $row['cand_id'];
      $v_id = $_SESSION['voterid'];

        // store receipt or voting transaction, useful to check if already voted for something
        $store = $conn->prepare("insert into receipt_tbl (e_id, v_id, c_id) values(?,?,?)");
        $store->bind_param("iii", $e_id, $v_id, $c_id);
        $store->execute();
        $success = ' <span style= "color:green;">You have successfully casted your vote! </span>';
        $error ="";

        // update candidate's number of votes
        $sum = $row['cand_votes'] + 1;
        $access = $conn->prepare("update candidates_tbl set cand_votes = ? where cand_id = ?");
        $access->bind_param('ii', $sum, $c_id);
        $access->execute();
        $res = $access->get_result();
        $access->close();

    }

    }


  $conn->close();

?>

<div class = "election">

<!-- Cancel Button, to be improved.
If possible, unset $_SESSION['e_id'] when this is clicked -->
  <button onclick="window.location.href='voting-page.php'" class="cancel-btn">Back</button>


  <!-- Display election details -->
    <div class = "election-title">
    <?php echo $elec['e_name'] . " (ID: ";?>
    <?php echo $elec['e_id'] . ")" ;?>
  </div>




  <!-- Display error/success messages, to be improved -->
  <p><?=$success?></p>
  <p><?=$error?></p>
  <p><?=$msg?></p>



  <!-- Display candidates -->
  <center><form action="voter_vote.php" method = "post">
    <table class>
      <tr>
        <!-- Displaying info -->
        <td class = "e-subtitle"><i>Name</i></td>
        <td class = "next-subtitle"><i>Information</i></td>
      </tr>


      <table class>
        <?php foreach ($details as $det): ?>
        <tr>
          <td class = "back1"><?php echo "<img height=250 width=250 src='".$det['cand_image_path']."' >";?></td>
          <td class = "back2">
            <p class = "text"><?php echo  $det['cand_name'];?></p><br>
          </td>
          <td class = "back3">
            <ul class = "textlist">
              <li><?php echo $det['cand_desc1'];?></li>
						  <li><?php echo $det['cand_desc2'];?></li>
						  <li><?php echo $det['cand_desc3'];?></li>
						  <li><?php echo $det['cand_age'] . " years old";?></li>
            </ul>
          </td>
          <td class = "back4">

          <!-- Display buttons for each candidate -->
               <?php
                // check if vote_status is set or voter had already voted
               if (isset($_SESSION['vote_status'])) {
                // disabled buttons if yes, pls change class/color for design
                echo "<input value='Voted' name='".$det['cand_id'] ."'class = 'voteButton' type='submit' disabled />";

               } else {
                // working button if not yet set
                echo "<input value='Vote' name='".$det['cand_id'] ."'class = 'voteButton' type='submit' />" ;

               }

               ?>

             </form>
           </center>
          </td>

        </tr>
      <?php endforeach ?>
    </table>

</div>
