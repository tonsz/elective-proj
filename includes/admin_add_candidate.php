<?php 

include_once 'header.php';
$error = "";
$success = "";

if (isset($_POST['add'])) {

  require_once 'upload.inc.php';
   // Store input values into variables
   $cand_name = $_POST['cand_name'];
   $cand_age = $_POST['cand_age'];
   $cand_desc1 = $_POST['cand_desc1'];
   $cand_desc2 = $_POST['cand_desc2'];
   $cand_desc3 = $_POST['cand_desc3'];
   $cand_election = $_SESSION['e_id'];
   $cand_image_path = upload_img();
   
   if ($cand_image_path == 0) {
    $error = "Candidate image upload failed.";
    $success = "";
    exit();
   }

   require_once 'dbh.inc.php';

   $access = $conn->prepare("select * from candidates_tbl where cand_name = ? and cand_election = ?");
   $access->bind_param('si', $cand_name, $cand_election);
   $access->execute();
   $check = $access->get_result();

   if ($check->num_rows > 0) { // Check if candidate is already in that election
    $error="Candidate is already in the election.";
    $success="";
    exit();
   } 
   
   // Check if no. of candidates limit reached
   $access = $conn->prepare("select cand_count from elections_tbl where e_id = ?");
   $access->bind_param('i', $cand_election);
   $access->execute();
   $check = $access->get_result();

   if ($check->num_rows > 0) { 
    $data = $check->fetch_assoc();
    $data = $data["cand_count"];
   }

    $access = $conn->prepare("select * from candidates_tbl where cand_election = ?");
    $access->bind_param('i', $cand_election);
    $access->execute();
    $check = $access->get_result();

    if($check->num_rows >= $data) {
      $error="Candidate count limit reached.";
      $success="";
      exit();
    } else { 
  
    $store = $conn->prepare("insert into candidates_tbl (cand_name,cand_age,cand_desc1,cand_desc2,cand_desc3,cand_image_path, cand_election) values(?,?,?,?,?,?,?)");
    $store->bind_param("sissssi", $cand_name, $cand_age, $cand_desc1, $cand_desc2, $cand_desc3, $cand_image_path, $cand_election);
    $store->execute();
    unset($_SESSION['e_id']);
    $success = "New candidate added!";
    header('Location: admin_manage_elections.php');
    $error="";
    $store->close();
    $conn->close();


    } 

  }

?>

<div class = "election">
   <div class="election-title">Add Candidate</div><br>
   <table class="addcand-tbl">
     <tr>
        <div class="addcand-div">
       <td>
          <form action = "admin_add_candidate.php" method = "post" enctype="multipart/form-data">
            <!-- candidate name -->
            <label class = "left-sub" for="candidate_name">Name of Candidate</label>
             <br><input class = "input" type="text" for ="candidate_name" id="cand_name" name="cand_name"maxlength="30">  

            <!-- candidate age -->
            <br><label class = "sub" for="candidate_age">Age</label>               
            <br><input class = "input-age" type = "number" for = "candidate_age" id="cand_age" name="cand_age"min = "1" max = "200">

            <!-- candidate description -->
            <br>
            <br><label class = "sub" for = "description">Description</label>
            <br><input class = "input-desc" type="text" for ="description"  id="cand_desc1" name="cand_desc1" maxlength="30">
            <br><input class = "input-desc" type="text" for ="description"  id="cand_desc2" name="cand_desc2" maxlength="30">
            <br><input class = "input-desc" type="text" for ="description"  id="cand_desc3" name="cand_desc3" maxlength="30">

            <!-- candidate photo  -->
                <br><label class="sub">Photo of Candidate</label>
                <input class="photo-upload"type="file" name="fileToUpload" accept=".png,.gif,.jpg,.webp">
                <p class= "error"> <?=$error?> </p>
                <!-- <br><input class="photo-submit"type="submit" value="Upload Image" name="submit"> -->
            
            </td>
       <td>
           <input class = "create-btn" type="submit" name="add" value="ADD">
         </form>
           <button onclick="window.location.href='admin_new_election.php'" class="back-btn">CANCEL</button>
           <p class= "error"> <?=$error?> </p>
       </td>
     </tr>
   </table>
     </div>

<style>
     #manage-elec {
          color: #1b2459;
          border: 10px solid transparent;
          background-color: #e2e3eb;
          border-color: #e2e3eb;
     }
</style>