<?php
	include_once 'header.php';
	$link = new mysqli ('localhost', 'root', '', 'user_account');
    if (isset($_POST['submit'])){
        // Store input values into a variable
        $question = $_POST['question'];
        $answer = $_POST['answer'];
       
        // Database
       
        if ($link->connect_error){
            die ('Connection Failed : ' .$link->connect_error);
        }
        else {
            $store = $link->prepare("insert into help_tbl (question, answer) values(?,?)");
            $store->bind_param("ss", $question, $answer);
            $store->execute();			
			header("Location: admin-help.php");
        } //storing
    }
	if ($link->connect_error){
            die ('Connection Failed : ' .$link->connect_error);
        }
    else {	
		$result = $link->query("select * from help_tbl");	
		$link->close();
	}
	
?>

		<!-- layout for form to add FAQ -->
		<div class="help"> 
            <div class="subtitle">
                FAQ
            </div>  
			
			<?php foreach ($result as $faq): ?>
			<div class="question">
                Q: <?php echo $faq["question"]; ?>				
				<div class="answer">
					A: <?php echo $faq["answer"]; ?>
				</div> 
            </div>  	
			<?php endforeach; ?>	
			
			<br><br><button id="addQuestBtn" onclick="formHide()">+</button><span id="addQuestion"> Add Question</span> 
			<div id="myform" class="form" style="display:none" >
					<form action="admin-help.php" method ="POST">
						<div>
						<input class="adinputs" type="text" name="question" id="question" required>
						<br>
						
						<label class="adlabels" for="answer"><b>Answer</b></label><br>
						<textarea class="adtextBox" type="text" name="answer" id="answer" rows="8" required></textarea>
						</div>

						<input class="adsubmitButton" type="submit" name="submit" value="Add FAQ">
					</form>
			</div>
		</div>

     <style>
          #help {
               color: #1b2459;
               border: 10px solid transparent;
               background-color: #e2e3eb;
               border-color: #e2e3eb;
              
          }
		  			
     </style>
      <script>
	  function formHide() {
		  var form = document.getElementById("myform");
		  var addQuestionBtn = document.getElementById("addQuestBtn");
		  if (form.style.display === "none") {
			form.style.display = "block";
			addQuestionBtn.innerText = '-';
		  } else {
			form.style.display = "none";
			addQuestionBtn.innerText = '+';
		  }
		}
	  </script>
</body>
</html>
