<?php

// This is how you can display the image of the candidate 
require_once 'dbh.inc.php';

$access = $conn->prepare("select cand_image_path from candidates_tbl where cand_name = 'Calliope'");
// $access->bind_param('i', $cand_election);
// Sample query only, will still use bind_param for insertion of variables in sql
$access->execute();
$check = $access->get_result();

if ($check->num_rows > 0) { 
    $data = $check->fetch_assoc();
    $result = $data["cand_image_path"];
}

// display image
$ext = pathinfo($result, PATHINFO_EXTENSION);
$img = base64_encode(file_get_contents($result));
echo "<img src='data:image/jpg;base64,".$img."'/>";


?>



