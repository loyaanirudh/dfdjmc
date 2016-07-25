<!DOCTYPE html>
<html>
<head>
  <title>login page</title>

  <link rel="stylesheet" href="mm/css/normalize.css">
  <link rel="stylesheet" href="mm/css/main.css">
  <script src="mm/js/vendor/modernizr-2.6.2.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mm/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="mm/css/materialize.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="mm/js/materialize.min.js"></script>
  <script src="mm/js/materialize.js"></script>

    <style>
body  {
    background-image: url("education/d.jpg");
    background-repeat: no-repeat;
}

#okok{
  top: 50%;
  left: 50%;
}
  </style>



</head>
<body background="d.jpg">

<?php
if(isset($_POST['submit']))
  {
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "csv_db";
        alert("HI");
     	//$start=$_GET["start"];
		//$end=$_GET["end"];
		//$chart=$_GET["chart"];
$selected = new mysqli($servername, $username, $password, $dbname);
if ($selected->connect_error) {
            die("Connection failed: " . $selected->connect_error);
        }
//execute query
$uid=$_POST['uid'];
$password=$_POST['password'];
$sql = "SELECT uid FROM login WHERE uid='$uid' AND password='$password'";
$result = $conn->query($sql);
$type="";
//alert($result);
if ($result->num_rows > 0) {
				if(substr($result,0,1)=="T")
					header('Location : dashboard.html');
				else
					header('Location : sdashboard.php');
			}	


mysqli_close($selected);
}
?>


<div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

    </div>

<div class="row ">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1 " id="okok">
            <div class="card-content white-text">
              <span class="card-title">SIGN IN</span>
              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                  <input placeholder="Username" id="uid" type="text" class="validate">
                  <input id="password" type="password" placeholder="Password" class="validate">
                  <input type="submit" name="submit" class="btn-submit" value="Send Now">
              </form>
            </div>
            <div class="card-action">
            </div>
            
          </div>
        </div>
      </div>

<script>
  $( document ).ready(function(){
    $(".button-collapse").sideNav();});
	
 
  </script>
  



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="mm/js/main.js"></script>
  
</body>
</html>
