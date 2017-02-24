
  <?php
    function getSignupPopup(){
      require "signup.html";

    }
    function getLoginPopup(){
      require "login.html";

    }

    function ifEmailAlready(){
      if (isset($_GET['already'])) {//this already is coming from 
      //if email already exist then a dummy tag to be identified by js
      echo '<span id="already"></span>';
      }
     } 
     function ifLoginFailed(){
      if (isset($_GET['loginfail'])) {//this already is coming from 
      //if email already exist then a dummy tag to be identified by js
      echo '<span id="loginfail"></span>';
      }
     } 
    ?>
    <?php
    function isLogedIn(){
       if(isset($_SESSION['user'])) 
      { //if user is loged in send request to create image 
        echo '<form action = "/action/tshirt.php" method="post">';
      }
      else
      {//if users is not loged in then show login popup
        echo '<form action = "/index.php" method = "post">';
      }
      if (isset($_POST['player'])) {
        echo '<span id = "login-first"></span>';
      }
    }


    function pageContent(){
       
   	  
   	  echo '
        <div id = "content">
          <div id = "info">'.isLogedIn().'
            <select id = "player" name = "player" required>
               <option>SELECT PLAYER</option>
               <option>MALE</option>
               <option>FEMALE</option>
            </select>
            <input type="text" name="name" placeholder="ENTER YOUR NAME" required>
            <select id="position" name="position" required>
              <option>SELECT YOUR POSITION</option>
              <option>Defender</option>
              <option>Striker</option>
              <option>Midfilder</option>
              <option>Coach</option>
              <option>Goalkeeper</option>
            </select>
            <input type="submit" value="KICK OFF" id="kick-off">
            </form>
          </div>
          <div id="tagline">
            <p>A NEW PLAYING FIELD AWAITS YOU AND SO DOES </p>
            <p><b>YOUR OWN <span>JERSEY</span></b></p>
          </div>
        </div> '; }?>