<?php

  include_once 'header.php';
	require_once 'dbh.inc.php';

  $access = $conn->prepare("select * from elections_tbl where e_owner = ?");
  $access->bind_param('i', $_SESSION['adminid']);
  $access->execute();
  $result = $access->get_result();

  $data = array();
  while ($row = $result->fetch_array()){
    $data[] = $row;

    if (isset($_POST[$row['e_id']])) {
      $_SESSION['e_id'] = $row['e_id'];
      header('Location: admin_election_details.php');
    }
  }

?>

<form action="admin_manage_elections.php" method="post">
  <div class="template">
    <table>
      <?php foreach ($data as $row): ?>
        <tr>
          <td>
            <?php echo "<input value='" . $row['e_id'] . "'name='". $row['e_id'] . "'class='picture' type='submit' src='../img/addbtn.png' height='100' width='100'/>"; ?>

          </td>
          <td>
            <p class = "ename"><?php echo $row['e_name'];?></p>
            <ul class = "edesc">
                <li><?php echo $row['e_start'] . " - " . $row['e_end'];?></li>
                <li><?php echo $row['cand_count'] . " Candidates";?></li>
              </ul>
          </td>
      </tr>
      <?php endforeach ?>
    </div>

</form>

      <div class="template">
            <table>
              <tr>
                <td>
                  <a href="admin_new_election.php"><img class = "picture" type = "button" src="..\img\addbtn.png">
                </td>
                <td class="desc">
                  <p>Add New Election</p>
                </td>
              </tr>
          </div>


           <!-- para mahighlight ung page sa navigation bar -->
     <style>
          #manage-elec {
               color: #1b2459;
               border: 10px solid transparent;
               background-color: #e2e3eb;
               border-color: #e2e3eb;
          }
     </style>
