<?php

include_once 'header.php';

?>

    <table class = "voter-search">
      <form action="voter-results.php">
        <tr>
          <td><input type="text" placeholder = "Search.." name = "search"></td>
          <td><button type="submit"> SHOW RESULTS </button></td>
        </form>
      </tr>
    </table
    >

<table class = "voter">
  <tr>
    <td>
      <img src="..\img\Candidate.jpeg" class = "result-pic">
      <p class = "e-name"> Candidate A </p>
      <p class = "res"> 50% </p><br>
    </td>
    <td>
      <img src="..\img\Candidate.jpeg" class = "result-pic">
      <p class = "e-name"> Candidate B </p>
      <p class = "res"> 50% </p><br>
    </td>
    <td>
      <img src="..\img\Candidate.jpeg" class = "result-pic">
      <p class = "e-name"> Candidate C </p>
      <p class = "res"> 50% </p><br>
    </td>
  </tr>
</table>

<p class = "footer">For questions and suggestions about this election,</p>
<p class = "footer">please contact electionadmin@gmail.com</p><br><br>
