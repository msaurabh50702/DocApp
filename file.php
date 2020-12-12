<?php 
    session_start(); 
    include('dbcon.php');
    include('functn.php');
    $link = mysqli_connect('localhost', 'root', '', 'docapp') or die ("Error".mysqli_error($link));

?>
<!DOCTYPE html>
<html>
<body>

<form action="file.php" method="post" enctype="multipart/form-data">
File: <input type="file" name="pdf" id="pdf" accept="application/pdf" title="Choose File" /><br />
<input type="submit" name="upload" id="upload" value="Upload" /><br />
<input type="submit" name="read" id="read" value="Read" />
</form>

</body>
</html>

<?php
if(isset($_POST['upload']))
{

// extract file name, type, size and path
$file_path=$_FILES['pdf']['tmp_name']; //pdf is the name of the input type where we are uploading files
$file_type=$_FILES['pdf']['type'];
$file_size=$_FILES['pdf']['size'];
$file_name=$_FILES['pdf']['name'];

// checks whether selected file is a pdf file or not
if ($file_name != "" && $file_type == 'application/pdf')
{

//extracts data of file in $data variable
$data=mysqli_real_escape_string($link, file_get_contents($file_path));
// query to insert file in database
//$query="INSERT INTO document SET doc = '".$data."'"; //”field_name” is the name of the field where we are uploading pdf files
$query="INSERT INTO document (doc)VALUES ('".$data."')";
$result = mysqli_query($link, $query); //query execution
// Check if it was successful
if($result)
echo 'Success! Your file was successfully added!';
else
echo 'Error!';
} else {
echo 'Not a pdf file';
}
}

// for reading uploaded file
if(isset($_POST['read']))
{

//Query to fetch field where we are saving pdf file
$sql = "SELECT field_name FROM pdf_table WHERE file_id = '1'";
$result2 = mysqli_query($link, $sql);    // query execution
$row = mysqli_fetch_object($result2); // returns the current row of the resultset
$pdf_content = $row->field_name; // Put contents of pdf into variable
$fileName = time().".pdf"; // create the unique name for pdf generated
//download file from database and allows you to save in your system
header("Content-type: application/pdf");
header("Content-disposition: attachment; filename=".$fileName);
print $pdf_content;
}
?>
