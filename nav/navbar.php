<?php
include_once 'assets/database.php';
          $db = new MyDB();

          $result = $db->readUsersInfo();

          if (isset ($_POST ['your_name'])) {
            $enteredUsername = $_POST ['your_name'];
            $enteredPassword = $_POST ['entered'];
            foreach($result as $r){
              if ($r->username == $enteredUsername && $r->password == $enteredPassword){
                //echo "The name is " . $r->first_name;
                $_SESSION["firstName"] = $r->first_name;
                $_SESSION["username"] = $r->username;
                $_SESSION["userid"] = $r->id;
                //echo "The name is " . $_SESSION["username"];

              
              }
              else {$_SESSION ['error'] = true;}
            }
    
          }
        ?>
        
			<div class="top">
				<h1 style="margin-left:5%;">Mountain</h1>
				<h1 style="margin-left:10%;">Bike</h1>
				<h1 style="margin-left:15%;">Hub</h1>
			</div>
      <div class="login">

        <?php if (isset($_SESSION["firstName"])){
        //echo '<a href="profile.php">' . $_SESSION["firstName"] . '\'s account</a>';
        echo '<button type="button" class="btn btn-sm btn-primary" onclick="location.href=\'profile.php\';">' . $_SESSION["firstName"] . '\'s Profile</button>';
        echo '<button type="button" class="btn btn-sm btn-primary" onclick="location.href=\'logout.php\';">LogOut</button>';
        }
        else {
        echo '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Login</button>';
        echo '<button type="button" class="btn btn-primary btn-lg" onclick="location.href=\'makeprofile.php\';">
        Make Profile</button>';
} ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login Form</h4>
      </div>
      <div class="modal-body">
        <p style="font-size:20px;">Insert your username and password please:</p><br>
                <form action="index.php" method="post">
                    Username:<br>
                    <input type="text" name="your_name" /><br>
                    Password:<br>
                    <input type="password" name="entered" />
                    <button type="submit" value="Submit" class="btn btn-primary">Login</button>
                   
                </form>
                <?php
                    if (isset($_SESSION ['error'])){
                        print "<font color='red'>Invalid username or password</font>";
                    }
                ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!--<?php

      //session_start();
      if (isset($_SESSION["firstName"])){
        echo '<a href="profile.php">' . $_SESSION["firstName"] . '\'s account</a>';
      }
      else {
        echo '<a href="makeprofile.php">Sign Up</a>
          <a href="login.php"> Login</a>';
        }
      ?>-->
      </div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div><!--navbar header-->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="trails.php">Trails</a></li>
            <li><a href="#contact">Discussion</a></li>
            <li><a href="#">News</a></li>
                    </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>