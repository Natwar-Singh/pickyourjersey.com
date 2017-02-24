<?php
  
    
  
  function varify($email,$password)
  {
    GLOBAL $conn;
    echo "asbdm\n";
     $match = 'false';
    $sql = 'SELECT * FROM users where email = "'.$email.'" and password = "'.md5($password).'"';
    $result = $conn->query($sql);
    foreach ($result as $row)
      { //to match the state
        if($row['state'] == "active")
        {
        $_SESSION['user'] = $row['user_id'];
        $match = $row['role_id'];
        }
      }
    return $match;
  }
   
    
    

  function login($email,$password)

  { global $conn;
    echo $role_id = varify($email,$password);
    if ($role_id=='false') 
    {
      header('Location:/index.php/loginfail');
    }
    else{
    $sql = 'SELECT * FROM role where role_id= "'.$role_id.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    $_SESSION['role'] = $set['role_name'];
    //setting role name in session variable
    header('Location: /index.php');
    }
  }
 ?>


