<?php
    session_start();
    if(!isset($_SESSION['unm']))
    { ?>
        <script>
          window.open("index.php","_self");
        </script><?php
        //header('location: dashboard.php');
    }
    include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  
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
    <h1>Dashboard</h1><span>Welcome <?php echo $_SESSION['full_name']; ?></span>
  </div>
</div>
<div class="form" >
  <div class="thumbnail"><img src="img/hat.svg"/></div>
  <!-- CREATE USER-->
  <!-- DASHBOARD -->
      <button  onclick="window.location.href='MyDoc.php'">My Documents</button><br><hr>
      <button  onclick="window.location.href='Upolad_File.php'">Upload Documents</button><br><hr>
      <button  onclick="window.location.href='Remove_doc.php'">Remove Documents</button><br><hr>
      <button class="butnn" onclick="window.location.href='logout.php'">Logout</button>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
