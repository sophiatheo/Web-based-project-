<?php

include 'con_db.php';

//pairnoume to periexomeno tou arxiou
$file  = file_get_contents($file_name);

//anagnorizei tin json domi tou arxeiou
$pois = json_decode($file, true);


//pairnoume tin imeromonia tis teleytaia tropopoihsh tou arxeiou
$last_modified = date("Y-m-d H:i:s.", filemtime($file_name));

//gia kathe poi
for ($i=0;$i<count($pois);$i++)
	

	{
		
			$poi_code = $pois[$i]['id'];

            $pop = $pois[$i]['populartimes'];
						
			$last_query = "SELECT  DISTINCT updated FROM pop WHERE id = '$poi_code'";
			
			
			
			$result_last = $conn->query($last_query);
			
			$row_last = $result_last->fetch_assoc();
			
			$lst_mod = $row_last['updated'];
			
			
			
			
			//gia kathe imera
			for($j=0;$j<7;$j++)
				
			
			{
				//pairnoume to onoma tis imeras
				$day_name = $pop[$j]['name'];
				
				$data = $pop[$j]['data'];
				
				
				for($k=0;$k<24;$k++)
					
					{
						
						$same_pop = "SELECT COUNT(*) as total FROM pop WHERE id = '$poi_code' and day ='$day_name' and hour = '$k'";
						
						$result_same_pop = $conn->query($same_pop);
						
						$row_same_pop = $result_same_pop->fetch_assoc();
						
						$total_pop = $row_same_pop['total'];
						
						//an den yparxei pliroforia gia to point tin sigkkekrimeni imera kai sigkekrimeni ora 
						if ($total_pop==0)
						
						{
						
						$insert_pop ="INSERT INTO pop VALUES ('$poi_code','$day_name','$k', '$data[$k]','$last_modified')";
						
						
						
						
						$apotelesma = $conn->query($insert_pop);
						
						
						if($apotelesma===FALSE)
							
							{
								echo "Error in inserting popularity";
								
							}
						
						}
						
						else 
							
						
						{
							//edo ginetai elegxos gia to ean prepei na tropopoiithei i pliroforia 
							
							//logo pio neas imerominias
							if ($last_modified > $lst_mod)
								
								{
									$sql_update = "UPDATE pop SET value ='$data[$k]', updated = '$last_modified' WHERE id = '$poi_code' and day ='$day_name' and hour = '$k'";
									
									$conn->query($sql_update);
									
									
									
								}
							
							
							
						}
						
						
					}
				
				
				
				
			
		
		
				}
		
	}










?>