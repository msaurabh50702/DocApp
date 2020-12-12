<?php
    session_start();
    if(isset($_SESSION['unm']))
    { ?>
        <script>
            window.open("Dashboard.php","_self");
        </script><?php
        //header('location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>-->

      <link rel="stylesheet" href="css/Login_style.css">
      <style>
        img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
     </style>

  
</head>

<body>

  
<div class="container">
  <div class="info">
    <h1>Login Form</h1>
  </div>
</div>
<div class="form">
    <div><img src="img/loginicon.png" style="  background: #EF3B3A;
  width: 130px;
  height: 130px;
 
  border-top-left-radius: 100%;
  border-top-right-radius: 100%;
  border-bottom-left-radius: 100%;
  border-bottom-right-radius: 100%;
  box-sizing: border-box;"/></div>
  <!-- CREATE USER-->
  <form class="register-form" method="post" action="sign_in.php">
    <!--<input type="text" placeholder="name"/>-->
     <input type="text" name="fnm" autocomplete="off" autofocus="" required="" placeholder="Full Name"> 
    <!--<input type="password" placeholder="password"/>-->
     <input type="text" name="unm" autocomplete="off" autofocus="" required="" placeholder="Username">
    <!--<input type="text" placeholder="email address"/>-->
     <input type="password" name="pass" autocomplete="off" required="" placeholder="password">
     <input type="number" name="mob"  autocomplete="off" required="" placeholder="Mobile No.">
     <input type="email" name="eml" autocomplete="off" required="" placeholder="email address">
    <!--<button>create</button>-->
    <button type="submit" name="insrt">Create user</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
  </form>
  
  <!-- LOGIN  -->
  <form class="login-form"  method="post" action="index.php" autocomplete="off">
    <!--<input type="text" placeholder="username"/>-->
    <input type="text" name="username" required="" autocomplete="off" autofocus="" placeholder="username">
    <!--<input type="password" placeholder="password"/>-->
    <input type="password" name="password" required="" autocomplete="off" placeholder="password">
    <!--<button>login</button>-->
    <button type="submit" name="login_btn">Login</button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>

<?php
    //PHP FOR LOGIN FORM
    if(isset($_POST['login_btn']))
    {
       // include('dbcon.php');
        //include('functn.php');
        $db = mysqli_connect('localhost', 'root', '', 'docapp');
        //mysqli_connect("localhost","my_user","my_password","my_db");

	// grap form values
	$username = $_POST['username'];
	$password = $_POST['password'];

            $sql = "SELECT * FROM login_info WHERE U_Name='$username' AND pass='$password' LIMIT 1"; 
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            if($row["U_Name"]==$username && $row["Pass"]==$password)
            {
                session_start();
                $_SESSION['unm']=$username;
                $_SESSION['pas']=$password;
                $_SESSION['full_name']=$row["F_Name"]
                ?><script>
                    window.open("Dashboard.php","_self");</script><?php
                   // header('location: Dashboard.php');             
            }
            else { ?>
                        <script>
                                alert('Enter Correct Username And Password');
                        </script>
                        <?php
            }
        }
           
 
?>

<?php
//PHP FOR SIGNUP
if(isset($_POST['insrt']))
 {
    $fnm=$_POST['fnm'];
    $unm=$_POST['unm'];
    $pass=$_POST['pass'];
    $mob=$_POST['mob'];
    $eml=$_POST['eml'];
    
 
    $sql="INSERT INTO login_info (F_Name,U_Name,Pass,e_mail,mob)VALUES ('$fnm','$unm','$pass','$eml','$mob')";
    $run= mysqli_query($db, $sql);
    
    if($run == true)
    {
        ?>
        <script>
            alert('User Created Successfully.');
        </script>
        <script>
            window.open("index.php","_self");
        </script>
        <?php
    }
     else
    {
        ?>
        <script>
            alert('error');
        </script>
        <?php
    }
 }


?>