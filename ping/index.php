
<?php
		
			
			$finaldata['data']='pong';
			$json=json_encode($finaldata);
			$json=str_replace('\/', '/', $json);
			echo $json;
		
      ?>