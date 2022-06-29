<?php
	include_once 'header.php';
	require_once 'dbh.inc.php';	
    
		$result = $conn->query("select * from help_tbl");	
		$conn->close();
	
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