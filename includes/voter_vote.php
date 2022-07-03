<?php

  $error ="";
  $success="";

  include_once 'header.php';
  require_once 'dbh.inc.php';


  $access = $conn->prepare("select * from elections_tbl, candidates_tbl where e_id = ? AND cand_election = ?");
  $access->bind_param('ii', $_SESSION['e_id'], $_SESSION['e_id']);
  $access->execute();
  $res = $access->get_result();

  $both = array();
  while ($row = $res->fetch_array()){
    $both[] = $row;
  }

  $access = $conn->prepare("select * from elections_tbl where e_id = ?");
  $access->bind_param('i', $_SESSION['e_id']);
  $access->execute();
  $e_result = $access->get_result();

  $data = array();
  while ($row = $e_result->fetch_array()){
    $data[] = $row;
  }

  $access = $conn->prepare("select * from candidates_tbl where cand_election = ?");
  $access->bind_param('i', $_SESSION['e_id']);
  $access->execute();
  $result = $access->get_result();

  $details = array();
  while ($row = $result->fetch_array()){

    if (isset($_POST[$row['cand_id']])){
      echo "TEEEEEEEEEHHHHH";
      $e_id = $row['cand_election'];
      $v_id = $_SESSION['voterid'];
      $c_id = $row['cand_id'];

      $access = $conn->prepare("select * from receipt_tbl where e_id = ? AND v_id = ? ");
      $access->bind_param('ii', $_SESSION['e_id'], $_SESSION['voterid']);
      $access->execute();
      $fetched = $access->get_result();

      if ($fetched->num_rows == 1){
        $error = "You have already voted.";
        $success = "";
      }else{
        $store = $conn->prepare("insert into receipt_tbl (e_id, v_id, c_id) values(?,?,?)");
        $store->bind_param("iii", $e_id, $v_id, $c_id);
        $store->execute();
        $success = "You have successfully casted your vote!";
        $error ="";
        $store->close();

        $sum = $row['cand_votes'] + 1;
        $access = $conn->prepare("update candidates_tbl set cand_votes = $sum where cand_election = $_SESSION[e_id]");
        $access->bind_param('ii', $_SESSION['e_id'], $_SESSION['voterid']);
        $access->execute();
        $res = $access->get_result();
        $res->close();
      }
    }
        $details[] = $row;
    }


  $conn->close();

?>

<div class = "election">
  <button onclick="window.location.href='voting-page.php'" class="cancel-btn">CANCEL</button>
    <form action="voter_vote.php" method = "post">
    <?php foreach ($data as $elec): ?>
    <div class = "election-title">
      <?php echo $elec['e_name'] . " (ID: ";?>
      <?php echo "<input value='" . $elec['e_id'] . "' name ='".$elec['e_id'] . "' class = 'election-title' type = 'number' />";?></div>
  <?php endforeach ?>

    <table>
      <tr>
        <td class = "e-subtitle"><i>Name</i></td>
        <td class = "next-subtitle"><i>Information</i></td>
      </tr>

      <table class>
        <?php foreach ($details as $det): ?>
        <tr>
          <td class = "back"><?php echo "<img height=130 width=130 src='".$det['cand_image_path']."' >";?></td>
          <td class = "back">
            <p class = "text"><?php echo $det['cand_name'];?></p><br>
          </td>
          <td class = "back">
            <ul class = "textlist">
              <li><?php echo $det['cand_desc1'];?></li>
						  <li><?php echo $det['cand_desc2'];?></li>
						  <li><?php echo $det['cand_desc3'];?></li>
						  <li><?php echo $det['cand_age'] . " years old";?></li>
            </ul>
          </td>
          <td class = "back">
               <?php echo "<input value='" . $det['cand_id'] . "' name='submit'". "class = 'voteButton' type='submit' />";?>
               <button name = "submit" type = "submit" class="voteButton">VOTE</button>

             </form>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

</div>
