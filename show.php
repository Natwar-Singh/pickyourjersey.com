<?php
 function getImgurl()
 {
    global $conn;
    $f_id=$_GET['id'];
    $sql = 'SELECT url FROM images where f_id ="'.$f_id.'" AND user_id='.$_SESSION['user'];
    $result=$conn->query($sql);
    $set=$result->fetch();
    return $set['url']; 
 }
 function setMetatags($imgurl)
 { 
   echo '
   <meta property="og:image" content="/'.$imgurl.'" >
   <meta property="og:image:width" content="600">
   <meta property="og:image:height" content="315">
   <meta property="og:site_name" content="jerseylelo.com">
   <meta property="og:url" content="https://www.jerseylelo.com/'.$imgurl.'">'; 
  
 }
    
function getPageContent($imgurl)
 {
  echo '
  <style type="text/css">
    body
     {
      background-image: url("/'.$imgurl.'");
     }
  </style>
  <a class="twitter-share-button"
  href="http://twitter.com/share?url=http://jerseylelo.com/show.php"
  >Tweet</a>
  <a download="custom-filename.jpg" id="download" href= "/'.$imgurl.'" title="ImageName">download</a>';
    }
?>