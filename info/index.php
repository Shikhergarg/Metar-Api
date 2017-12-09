
<?php
		header("Content-Type:application/json");
		include("scrap.php");
		include("temp.php");
		
        if(!empty($_GET['scode'])){
			$scode=$_GET['scode'];
			if(empty($redis->get($scode)))
			{
			$data=get_price($scode);
			
			if(empty($data))
			{
				echo "fuck";
				//deliver_response($scode,NULL);
			}
			else 
			{
				$data=deliver_response($scode,$data);
				$redis->set($scode,$data);
				$redis->expire($scode, 300);
			}
			}
			else 
			{
				echo $redis->get($scode);
				
			}

		}
		else 
		{
			
			$finaldata['data']='pong';
			$json=json_encode($finaldata);
			$json=str_replace('\/', '/', $json);
			echo $json;
		}
        function  deliver_response($scode,$data)
		{
			$arr=explode(" ",$data);
			$response['station']=$scode;
			$response['last_observation']=$arr[0].' at '.$arr[1].'GMT';
			$response['temperature']=$arr[8][0].$arr[8][1].' C';
			foreach($arr as $ele)
			{
				if(endsWith($ele, 'KT')==True)
				{
					$knots=$ele[3].$ele[4];
					$miles=$knots*1.15;
					$response['wind']='S at '.$miles.' mph ('.$knots.' knots)';
					break;
				}
			}
			$finaldata['data']=$response;
			$json=json_encode($finaldata);
			$json=str_replace('\/', '/', $json);
			
			echo $json;
			return $json;
		}
		function endsWith( $str, $sub ) {
		   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
		}
      ?>