<?php session_start(); ?>
<?php require "connectdb.php";
      if(isset($_GET['action']))
      {
        if(!isset($_SESSION['user'])){
          header('Location:/index.php');
        }
      }
?>
<!DOCTYPE html>
<html>
<head>
  <title>asdfgh</title>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script type = "text/javascript" src="/js/header.js" ></script>
  <link rel="stylesheet" type="text/css" href="/sass/stylesheets/top.css">
  <link rel="stylesheet" type="text/css" href="/sass/stylesheets/index.css">
</head>
<body>

  <?php require "header.php";
        //Returns Admin Menu 
        getAdminMenu();
        //Returns navigation links
        getNavigation();
    ?>
   <?php 
    if (!isset($_GET['action'])) {
      echo '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/home-page.css">';
      echo '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/signup.css">';
      echo '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/login.css">';
      echo '<script type = "text/javascript" src="/js/home-page.js" ></script>';
      require 'home-page.php';
      //Includes Hidden Signup Popup on home page which will be shown on clicking signup  link
      getSignupPopup();
      //Includes Hidden login Popup on home page which will be shown on clicking login  link
      getLoginPopup();
      //to show error message if someone if someone is signingup with same email  
      ifEmailAlready();
      //to show error message if login failed
      ifLoginFailed();
      //Returns page content
      pageContent();
    }




    elseif ($_GET['action'] == 'signup.php')
    {
      require 'signup.php';
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $player = $_POST['player'];
      //To send error message on Home page
      isEmailAlready($email);
      //To create user Account
      createAccount($name,$email,$password,$player);
      //Transfer request on home page after Successfull signup
      header('Location: /index.php');     
    }



    else if ($_GET['action']=='logout.php')
    { //Sessaion End on Logout
      session_destroy(); 
      header('Location: /index.php');
    }



    else if ($_GET['action']=='login.php')
    {
      require 'login.php';
      $email = $_POST["email"];
      $password = $_POST["password"];
      //Creating sessaion after varifying Email and password
      login($email,$password);
    }



    else if ($_GET['action']=='tshirt.php')
    { require 'tshirt.php';

      $player = $_POST['player'];
      $name = strtoupper($_POST['name']);
      $position = $_POST['position'];
      $user_id = $_SESSION['user'];
      //Creating Tshirt
      tshirt($name,$player,$position,$user_id); 
    }



    else if ($_GET['action']=='show.php')
    {
      echo '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/show.css">';
      require 'show.php';
      //Returns image Url
      $imgurl=getImgurl();
      //Sets metatags to share on twitter
      setMetatags($imgurl);
      //Returns page content
      getPageContent($imgurl);
    }



    else if ($_GET['action']=='positions.php')
    {
      echo   '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/positions.css">';
      require 'positions.php';
      //Displays Positions on screen
      getPositions();
    } 



    else if ($_GET['action']=='update-positions.php')
    {
      echo   '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/positions.css">';
      require 'positions.php';
      //Update Positions in Database
      updatePositions();
    }



    else if ($_GET['action']=='users.php')
    { echo   '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/users.css">';
      require "users.php";
      //Displays List of Users on screen
      getUsers();
    }



    else if ($_GET['action']=='edit.php')

    { 
      echo   '<link rel="stylesheet" type="text/css" href="/sass/stylesheets/edit.css">';
      require "edit.php";
      //To avoid permissions to nonroot users
      if($_SESSION['role'] == 'Admin')
      { 
        $user_id=$_GET['id'];
      }
      else
      {
        $user_id = $_SESSION['user'];
      }
      if(isset($_POST["name"]))
      { //Updating  User Info
        updateInfo($user_id);
      }
      //Displaying UserInfo on Screen
      getUserInfo($user_id,$_SESSION['role']);

    }



    else if ($_GET['action']=='image-gallery.php')
    {
      echo '<link rel = "stylesheet" type = "text/css" href = "/sass/stylesheets/image-gallery.css">';
      require 'image-gallery.php';
      //Display Images On screen
      getImages();

    } 



    else if ($_GET['action']=='update.php')
    { require 'update.php';
      //Activate Block and Delete Users
      activateAndBlock();
      header('Location: /action/users.php');
    }
  ?>

</body>
</html>