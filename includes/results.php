<?php

include_once 'header.php';
require_once 'dbh.inc.php';

$_SESSION['e_id']="";
$valid=0;

if (isset($_POST['submit'])) {
  $_SESSION['e_id'] = $_POST['search'];
}

// check the elections created under the admin
$access = $conn->prepare("select * from elections_tbl where e_owner = ?");
$access->bind_param('i', $_SESSION['adminid']);
$access->execute();
$result = $access->get_result();

$validation = array();
while ($row = $result->fetch_array()){
$validation[] = $row; }

//e-id input must be under the admin
foreach ($validation as $eresult): 
    if ($eresult['e_id'] == $_SESSION['e_id']){
      $valid= 1;}
endforeach;

//access candidates
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


<table class = "voter-search">
  <form action="results.php" method = "post">
    <tr>
      <td><input type="text" placeholder = "Election ID" name = "search"></td>
      <td><button name="submit" type="submit"> SHOW RESULTS </button></td>
    </form>
  </tr>
</table>

<?php if(isset($_SESSION['adminid'])) { ?>
  <table class = "voter">
    <?php 
      if ($valid==1){
        $counter = 0;
        foreach ($details as $result): 
        ?>
        <td>
          <?php echo "<img class=result-img src='".$result['cand_image_path']."' >";?>
          <p class = "e-name"><?php echo $result['cand_name'];?></p>
          <p class = "res"><?php echo $result['cand_votes'];?></p>

          <?php  $counter = $counter + 1; 
          if (($counter % 3) == 0){
            echo "<tr>";
          } endforeach; 
      }  ?>
        </tr>
      </td>
  </table>


<?php }elseif (isset($_SESSION['voterid'])) { ?>
<table class = "voter">
  <?php $counter = 0; 
        $alphabet = range ('A', 'Z');
    foreach ($details as $result): ?>
  <td>
    <img src="..\img\Candidate.jpeg" class = "result-pic">
    <p class = "e-name"><?php echo "Candidate ". $alphabet[$counter];?></p>
    <p class = "res"><?php echo $result['cand_votes'];?></p>
  </td>
    
  <?php  $counter = $counter + 1;  
    if (($counter % 3) == 0){
      echo "<tr>";
  } endforeach ?>
  </tr>
  </td>
</table>
<?php } ?>

<p class = "footer"><br>For questions and suggestions about this election,</p>
<p class = "footer">please contact electionadmin@gmail.com</p><br><br>
