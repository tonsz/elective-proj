<?php
	include_once 'header.php';
    if (isset($_POST['submit'])){
        // Store input values into a variable
        $email = $_POST['email'];
        $comment = $_POST['comment'];
       
        // Database
        $link = new mysqli ('localhost', 'root', '', 'user_account');
        if ($link->connect_error){
            die ('Connection Failed : ' .$link->connect_error);
        }
        else {
            $store = $link->prepare("insert into contact_tbl (email, comment) values(?,?)");
            $store->bind_param("ss", $email, $comment);
            $store->execute();
            $success = "Your feedback has been submitted successfully.";
            $store->close();
            $link->close();
            } //storing
        }
?>
		<div class="contact"> 
            <div class="subtitle">
                What do you think of our service?
            </div>   
			<div class="form">
					<form action="contact.php" method ="post">
						<div>
						<label class="labels" for="email"><b>Email</b></label><br>
						<input class="inputs" type="text" name="email" id="email" required>
						<br>

						<label class="labels" for="comment"><b>Add Comment or Question</b></label><br>
						<textarea class="textBox" type="text" name="comment" id="comment" rows="8" required></textarea>
						</div>

						<input class="submitButton" type="submit" name="submit" value="SUBMIT">
					</form>
			</div>
		</div>
		
     <style>
          #contact {
               color: #1b2459;
               border: 10px solid transparent;
               background-color: #e2e3eb;
               border-color: #e2e3eb;
              
          }
     </style>
</body>
</html>