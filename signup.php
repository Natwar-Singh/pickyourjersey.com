<?php
  function isEmailAlready($email)
  { global $conn;
    $sql = 'select user_id from users where email="'.$email.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    if (isset($set['user_id'])) 
    {
      header('Location:/index.php/already');
    }
  }


  function createAccount($name,$email,$password,$player)
  { 
    global $conn;
    $role_id = 2;
    $stmt = $conn->prepare("INSERT INTO users (name,email,password,player,role_id,state) 
    VALUES (:name, :email, :password, :player,:role_id,:state)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':player', $player);
    $stmt->bindParam(':role_id', $role_id);
    $state="active";
    $stmt->bindParam(':state', $state);
    $stmt->execute();
    $sql = 'SELECT * FROM users where email = "'.$email.'" and password = "'.$password.'"';
    $result = $conn->query($sql);
    foreach ($result as $row)
    {   
      $_SESSION['user'] = $row['user_id'];
    }
  }
?>