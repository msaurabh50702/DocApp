<?php
session_start(); 
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Upload Documents</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	
        <style>
            img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        </style>
</head>
<body>
    <br>
<div class="header">
	<h2>Upload Documents</h2>
</div>
    <form method="post" action="add_file.php" enctype="multipart/form-data">
 
        <div class="content">
            <div >
                <input type="file" name="uploaded_file" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
                <label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>
            </div>
        </div>
        <script src="js/custom-file-input.js"></script>
        
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
