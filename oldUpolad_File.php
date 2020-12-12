<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Documents</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="style2.css">
        <style>
            img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        </style>
</head>
<body>

<div class="header">
	<h2>Upload Documents</h2>
</div>
    <form method="post" action="add_file.php" enctype="multipart/form-data">
    	<div class="input-group">
		<label>Select File</label>
                <input type="file" name="uploaded_file" autocomplete="off" autofocus="" required=""><br>
                <p style="color:red; font-size: 10pt;">Please Select file less than 1MB</p>
        </div>
	<div class="input-group">
		 <input type="text" name="uname" autocomplete="off" autofocus="" required="" value="<?php echo $_SESSION['unm']?>" hidden="">
                 <input type="text" name="pasw" autocomplete="off" autofocus="" required="" value="<?php echo $_SESSION['pas']?>" hidden="">
	</div>
      
	<div class="input-group">
		<button type="submit" class="btn" value="Upload file">Upload</button>
              <!-- <button type="submit" class="btn" name="view">View</button>-->
	</div>
</form>
</body>
</html>
