<!DOCTYPE html>
<html>
<head>
	<title>My Documents</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/newstyle.css">
        <style>
            img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        </style>
</head>
<body>
    <br>
<div class="header">
	<h2>My Documents</h2>
</div><form>
    <!-- Table-->
    <div style=" align-content: center;">    
        <table float="center" border="0" style="margin-top:5px; width:auto; font-size: 1vw; margin-left:auto; margin-right:auto;" >
        <tr>
                    <td><b>Name</b></td>
                    <td><b>Type</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Oploaded On</b></td>
                    <td><b>&nbsp;</b></td>
        </tr>
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
        // Print each file
        while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mime']; ?></td>
                        <td><?php echo $row['size']; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <?php echo "<td><a href='get_file.php?id={$row['id']}' style='color:#07ac03;'>Download</a></td>";?>
                        <!--td><a href="get_file.php?id=$row['id'];" style="color:#07ac03;">Download</a></td-->
                    </tr>     
                <?php
                }
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
    </table>
    
    </div>
    </form>
    <!--/Table-->
        <script src="js/index.js"></script>
</body>
</html>
