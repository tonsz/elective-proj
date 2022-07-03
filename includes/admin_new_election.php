<?php

include_once 'header.php';
$error = "";
$success = "";

if (isset($_POST['create'])) {
    // Store input values into variable
    $e_name = $_POST['e_name'];
    $e_id = $_POST['e_id'];
    $e_start = $_POST['e_start'];
    $e_end = $_POST['e_end'];
    $cand_count = $_POST['cand_count'];
    $e_owner = $_SESSION['adminid'];

    require_once 'dbh.inc.php';
    // Check if election ID already exists
    $access = $conn->prepare("select * from elections_tbl where e_id = ?");
    $access->bind_param('i', $e_id);
    $access->execute();
    $check = $access->get_result();

    if ($check->num_rows > 0) { // If it exists
        $error="Election ID already exists. Pick another one.";
        $success="";
    } else { // Store election in elections_tbl 
        $store = $conn->prepare("insert into elections_tbl (e_id,e_name,e_start,e_end,cand_count,e_owner) values(?,?,?,?,?,?)");
        $store->bind_param("isssii", $e_id, $e_name, $e_start, $e_end, $cand_count, $e_owner);
        $store->execute();
        $_SESSION['e_id'] = $e_id; 
        $success = "Election created!";
        header('Location: admin_add_candidate.php');
        $error="";
        $store->close();
        $conn->close();

    }
  

}

?>

<div class="election">
    <table>
      <tr>
        <td>
          <div>
                <div class="election-title">Create New Election</div><br>
                <form action="admin_new_election.php" method="post">
                <label class="left-sub" for="e_name"> Name of Election </label>
                <label class="right-sub" for = "e_id"> Election ID </label>
                <br>
                <input class="right-input" type="text" id="e_name" name="e_name" maxlength="30">
                <input class="left-input" type = "number" id="e_id"name="e_id" min="1" max="99999">
                <br>
                <p class="sub">Date of Election</p>
                <input class = "date" type="date" id="e_start" name="e_start">
                <label class = "subscript" for="e_start"><sub>START</sub></label>
                <br>
                <input class = "date" type="date" id="e_end" name="e_end">
                <label class ="subscript" for="e_end"><sub>END</sub></label>
                <br>
                <p class = "sub" for = "cand_count">Number of Candidates</p>
                <input class = "date" type = "number" id = "cand_count" name="cand_count" min = "1" max = "50">
        </td>
        <td>
          <input class = "create-btn" type="submit" name="create" value="CREATE">
        </form>
        <button onclick="window.location.href='admin_manage_elections.php'" class="back-btn">CANCEL</button>
        
        </td>
      </tr>
    </table>
    <p><?=$success?></p>
  </div>
</div>


<style>
     #manage-elec {
          color: #1b2459;
          border: 10px solid transparent;
          background-color: #e2e3eb;
          border-color: #e2e3eb;
     }
</style>
