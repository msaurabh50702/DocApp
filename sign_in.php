<?php 
    session_start(); 
    include('dbcon.php');
    include('functn.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign_In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="style2.css">
        <style>
            img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        </style>
</head>
<body>

<div class="header">
	<h2>Registraction Form</h2>
</div>
    <form method="post" action="sign_in.php">
    <?php echo display_error(); ?>
    	<div class="input-group">
		<label>Full Name</label>
                <input type="text" name="fnm" autocomplete="off" autofocus="" required="">
	</div>
	<div class="input-group">
		<label>Username</label>
                <input type="text" name="unm" autocomplete="off" autofocus="" required="">
	</div>
    
	<div class="input-group">
		<label>Password</label>
                <input type="password" name="pass" autocomplete="off" required="">
	</div>
    
	<div class="input-group">
		<label>Mobile Number</label>
                <input type="number" name="mob"  autocomplete="off" required="" >
	</div>
    
	<div class="input-group">
		<label>Email Id</label>
                <input type="email" name="eml" autocomplete="off" required="">
	</div>
      
	<div class="input-group">
		<button type="submit" class="btn" name="insrt">Insert</button>
              <!-- <button type="submit" class="btn" name="view">View</button>-->
	</div>
</form>
</body>
</html>

<?php
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