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
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style_1.css">
	 <style>
        img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
    </style>
</head>
<body>
         <div class="nm">	
            <p  width="50%"><h2>Canon 4820</h2></p>
         </div>    
    <hr>
    <hr height="1000" color="red">
        <div class="header">
            <h2>Login</h2>
	</div>
    <form method="post" action="index.php" autocomplete="off">
        
		<div class="input-group">
			<label>Username</label>
                        <input type="text" name="username" required="" autocomplete="off" autofocus="">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required="" autocomplete="off">
		</div>
            
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
	</form>
</body>
</html>

<?php

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