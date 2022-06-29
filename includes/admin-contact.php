<?php
	include_once 'header.php';
	require_once 'dbh.inc.php';
	
		$result = $conn->query("select * from contact_tbl");	
		$conn->close();
	
?>

		<div class="contact"> 
            <div class="subtitle">
                What do you think of our service?
            </div>  
			
			<?php foreach ($result as $feedback): ?>
			<div class="email">
				<?php echo $feedback['email'];?>
				<div class="comment">
					<?php echo $feedback['comment'];?>
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
		  			
     </style>
</body>
</html>
