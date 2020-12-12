<!DOCTYPE html>
<html>
<head>
	<title>Remove Document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="style2.css">
        <style>
            img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        </style>
</head>
<body></body>
</html>
<?php
// Connect to the database
session_start();
$dbLink = new mysqli('localhost', 'root', '', 'docapp');
$user=$_SESSION['unm'];
$pas=$_SESSION['pas'];
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
//$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
$sql = "SELECT `id`, `name`, `mime`, `size`, `created` FROM `file` WHERE `username`='$user' AND `pass`='$pas'";
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<body><br>
                <div class="header">
                <h2>Remove Document</h2>
            <table align="center" width="80%" border="0" style="margin-top:50px;">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Type</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Oploaded On</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='Remove_File.php?id={$row['id']}' style='color:white;'>Remove</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table></div></body>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection
$dbLink->close();
?>