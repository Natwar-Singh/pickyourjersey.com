<?php 
function getImages()
{ global $conn;
  echo '<h1>Image Gallery</h1>';
  $sql = 'SELECT url,f_id FROM images where user_id ="'.$_SESSION['user'].'"';
  $result = $conn->query($sql);
  foreach ($result as $row)
    { //to itrate image urls and showing image in img tag   
      $url = $row['url'];
      $f_id = $row['f_id'];
      echo '<a class="image" href="/action/show.php/'.$f_id.'"><img src=/'.$url.'></img></a>';
    }
}
?>
