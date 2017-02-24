
   <?php 
     function updateInfo($user_id)
	   { global $conn;
	     if(isset($_POST['role']))
	     { //role is only updated by admin this is to prevent error because when non admin updates there is no role field so it will be an error
	  	   $role_name=$_POST['role'];
		   $sql='UPDATE users
           SET role_id = (select role_id from role where role_name="'.$role_name.'")
           WHERE user_id ="'.$user_id.'"';
           $conn->query($sql);
		  }
		  if(!$_POST['password']==null)
	  	   //if password field is empty then password shoud not change
	     { 
	  	   $password=md5($_POST['password']);
		   $sql='UPDATE users
           SET password ="'.$password.'" 
           WHERE user_id ="'.$user_id.'"';
           $conn->query($sql);
		  }
		  //update rest of the information
		  $stmt = $conn->prepare('UPDATE users
		  SET name = :name,email=:email,player=:player
		  WHERE user_id ="'.$user_id.'"');
		  $stmt->bindParam(':name',$_POST["name"]);
		  $stmt->bindParam(':email',$_POST["email"]);
		  $stmt->bindParam(':player',$_POST["player"]);
		  $stmt->execute();
		}
	?> 
	<?php 
	function getUserInfo($user_id,$logedin_role_name) {
		global $conn;
	echo '<form id="content" action="/action/edit.php/'.  $user_id.'"  method="post"> 
	             <h1>Edit Profile</h1>';
	
	  $sql = 'SELECT * FROM users where user_id="'.$user_id.'"';
	  $result=$conn->query($sql);
	  foreach ($result as $row)
	  {    
	  $role_id=$row['role_id'];
      $state=$row['state'];
	  echo "<P class='edit-field'>Name:</p>";
      echo '<input type="text" class="edit-input" name="name"value="'.$row["name"].
	       '"></br>';
	  echo "<P class='edit-field'>Email:</p>";
      echo '<input type="text" class="edit-input" name="email"value="'.$row["email"].
	       '"></br>';
	  echo "<P class='edit-field'>password:</p>";
      echo '<div id="password"><input type="text" class="edit-input"  name="password" 
	        ></br> 
	        <span id="tooltip">Leave empty if donot watnt to change Password</span>
	        </div>';
	  echo "<P class='edit-field'>Player:</p>";
      echo '<input type="text" class="edit-input" name="player"value="'.$row["player"].
	          '"></br>';
	  }

	  //exit;
	  // Extra permitions for Admin
      if($logedin_role_name == "Admin")
      { echo "<P class ='edit-field'>Role:</p>";
        $role_id;
    	$sql = 'select role_name from role where role_id ='.$role_id;
    	$result = $conn->query($sql);
        $set = $result->fetch();
        $role_name = $set['role_name'];
        if ($role_name == "Admin")
	    { //to show default selected optin for role in select list
          echo '<select  name ="role" class ="edit-input">
           <option selected ="selected">Admin</option>
           <option >User</option>
           </select>';
	    }
	    else
	    { 
	      echo '<select  name ="role" class ="edit-input">
           <option>Admin</option>
           <option selected ="selected">User</option>
           </select>';
	    }
	    
      }
    
    echo '<div class = "abc">  
          <input type = "submit" name = "submit" value = "Apply" class = "permission">';
	
	
	if ($logedin_role_name == "Admin"){
		echo '<a href ="/action/update.php/'.$user_id.'/1" class ="permission">delete</a>';
	    if($state == "active")
	    {
	      echo '<a href = "/action/update.php/'.$user_id.'/2" class = "permission">Block</a>' ;
	    }
	    else
	    {
	      echo '<a href = "/action/update.php/'.$user_id.'/3" class = "permission">Activate</a>' ;
	    }
	  }
		echo    '</div>
				</form>';
				}
		?>
 </body>
 </html>