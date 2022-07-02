<?php

  include_once 'header.php';
  require_once 'dbh.inc.php';

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
    $details[] = $row;
  }

  $conn->close();

?>

        <div class="electionDet">
				<button onclick="window.location.href='admin_manage_elections.php'" class="back-btn">Back</button>
				<?php foreach ($data as $row): ?>
				<div class="ename">
					<?php echo $row['e_name'];?>
				</div>
				<div class="elecId">
					ID: <?php echo $row['e_id'] ;?>
				</div>
				<div class="elecDate">
					<?php echo $row['e_start'] . " - " . $row['e_end'];?>
				</div>
				<?php endforeach ?>
			<table class = "candTable">
				<?php foreach ($details as $candDet): ?>
				<tr>
				<td> <?php echo "<img height=130 width=130 src='".$candDet['cand_image_path']."' >";?></td>
				<td>
					  <p class = "cname"><?php echo $candDet['cand_name'];?></p>
						<ul class = "cdesc">
						  <li><?php echo $candDet['cand_desc1'];?></li>
						  <li><?php echo $candDet['cand_desc2'];?></li>
						  <li><?php echo $candDet['cand_desc3'];?></li>
						  <li><?php echo $candDet['cand_age'] . " years old";?></li>
						</ul>
				<?php endforeach ?>
				</td>
				</tr>
				<tr>
                <td>
					<a href="admin_add_candidate.php"><img class = "picture" type = "button" src="..\img\addbtn.png">
                </td>
                <td>
					<p class="desc">Add New Candidate</p>
                </td>
				</tr>
			</table>
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
