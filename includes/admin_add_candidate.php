<?php 

include_once 'header.php';
$error = "";
$success = "";

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
             <br><input class = "input" type="text" for ="candidate_name" maxlength="30">  

            <!-- candidate age -->
            <br><label class = "sub" for="candidate_age">Age</label>               
            <br><input class = "date" type = "number" for = "candidate_age" min = "1" max = "200">

            <!-- candidate description -->
            <br>
            <br><label class = "sub" for = "description">Description</label>
            <br><input class = "input" type="text" for ="description" maxlength="30">

            <!-- candidate photo  -->
                <br><label class="sub">Photo of Candidate</label>
                <input class="photo-upload"type="file" name="fileToUpload" id="fileToUpload">
                <br><input class="photo-submit"type="submit" value="Upload Image" name="submit">
            
            </td>
       <td>
           <input class = "create-btn" type="submit" value="CREATE">
         </form>
           <button onclick="window.location.href='admin_new_election.php'" class="back-btn">CANCEL</button>
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