<?php
function getUsers(){
	global $conn;
echo'<div class="user_list">
     <h1>Users List</h1>
	 <table>
	 <tr>
		<th>User Name</th>
		<th>Email</th>
		<th>Edit</th>
	 </tr>';
	
	
      echo "<tr>";
	  $sql = 'SELECT * FROM users ';
	  $result = $conn->query($sql);
	  foreach ($result as $row)
	  { $user_id=$row['user_id'];
	    echo '<td>'.$row["name"].'</td>';
	    echo '<td>'.$row["email"].'</td>';
	    echo '<td><a class="edit" href="/action/edit.php/'.$user_id.'" >Edit Profile</a></td>';
	    echo "</tr>";
	    } 
	  echo'</tr>
	  	  </table>
	  	  </div>';}
	  	  ?>
