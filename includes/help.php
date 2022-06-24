<?php
	include_once 'header.php';
	$link = new mysqli ('localhost', 'root', '', 'user_account');
	if ($link->connect_error){
            die ('Connection Failed : ' .$link->connect_error);
        }
    else {	
		$result = $link->query("select * from help_tbl");	
		$link->close();
	}
	
?>

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
			
		</div>

     <style>
          #help {
               color: #1b2459;
               border: 10px solid transparent;
               background-color: #e2e3eb;
               border-color: #e2e3eb;
              
          }
</body>
</html>