<?php
  function  urlExists($imgname,$user_id)
  { global $conn;
    $sql = 'SELECT f_id FROM images where url ="'.$imgname.'"and user_id = "'.$user_id.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    if(isset($set['f_id']))
    {  
      return 'exist';
    }
    echo "natwar";
    return 'no'; 
  } 
  function tshirt($name,$player,$position,$user_id)
  { global $conn;
    if ($player == "SELECT PLAYER") 
    {
      $player = "MALE";
      
    }
    $text = $name;
    //getting position no from table
    $sql = 'SELECT position_no FROM position where position_name = "'.$position.'"';
    $result = $conn->query($sql);
    foreach ($result as $row)
    {   
      $position_no=$row['position_no'];
    }
    // creating image url
    $imgname="images/".$name.$position_no.$player.$user_id;
    $status=urlExists($imgname,$user_id);
    if (!($status=='exist')) 
    {
      //to create image including image processing code
      require 'image.php';
      createImage($player,$position_no,$text,$imgname);
      //inserting image information into image
      $stmt = $conn->prepare("INSERT INTO images (user_id, url,date) 
      VALUES (:user_id, :url, :date)");
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':url', $imgname);
      $date = new DateTime();
      $stmt->bindParam(':date',$date->format('Y-m-d H:i:s'));
      $stmt->execute();
    }
    //geting the image id to show that image
    $sql = 'SELECT f_id FROM images where url ="'.$imgname.'"';
    $result = $conn->query($sql);
    $set = $result->fetch();
    $id = $set['f_id'];
    header('Location:/action/show.php/'.$id);

  }
  
    
?>
