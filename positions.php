
  <?php 
    function updatePositions()
    { global $conn;
      //to update positions in position table
      $sql = 'SELECT * FROM position ';
      $result=$conn->query($sql);
      foreach ($result as $row) 
      {
        $stmt = $conn->prepare('UPDATE position
        SET position_no = :position_no
        WHERE position_name ="'.$row["position_name"].'"'); 
        $stmt->bindParam(':position_no',$_POST[$row["position_name"]]);
        $stmt->execute();
      }
      header('location:/action/positions.php');
    }
	    
	function getPositions(){
	global $conn;
  echo '<h1>Positions</h1><br>
    <form action="/action/update-positions.php" method="post" class="positions">';
   
    $sql = 'SELECT * FROM position ';
    $result=$conn->query($sql);
    foreach ($result as $row)
    { if ($row["position_no"]==null) {
      //to avoid default position to be changeable
     continue;
    }
      echo '<p class="position-name">'.$row["position_name"].
            '</p><input type="text" name="'
	        .$row["position_name"].
	        '" value='.
	        $row["position_no"].'></br>';
	   }

	
	
	echo '<input type="submit" id="update" value="Update">
        </form>';
        }
  ?>
