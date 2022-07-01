<?php

  include_once 'header.php';
	require_once 'dbh.inc.php';

  $result = $conn->query("select * from candidates_tbl where cand_election = ?");
  $access->bind_param('i', $_SESSION['adminid']);
  $access->execute();
  $result = $access->get_result();

  $data = array();
  while ($row = $result->fetch_array()){
    $data[] = $row;
  }

 ?>

<div class = "election">
    <div class = "election-title">Election Name (ID: 12345)</div><br>

    <table>
      <tr>
        <td class = "e-subtitle"><i>Name</i></td>
        <td class = "next-subtitle"><i>Information</i></td>
      </tr>

    <!--- loop ata dito mare? ---->
      <table class = "back">
        <tr>
          <td class = "spacing">
            <img src="..\img\Candidate.jpeg" class = "elec-pic">
          </td>
          <td class = "spacing">
            <p class = "text"> Name </p><br>
          </td>
          <td class = "spacing">
            <ul class = "textlist">
              <li> Description</li>
            <!--- loop me thinks
              <li> Description</li>
              <li> Description</li> -->
            </ul>
          </td>
          <td class = "spacing">
            <button class="voteButton">VOTE</button>
          </td>
        </tr>
      </table>

</div>
