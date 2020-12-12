<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'docapp');
        //$dbLink = new mysqli('127.0.0.1', 'user', 'pwd', 'myTable');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
        $uname=$_POST['uname'];
        $pasw=$_POST['pasw'];
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`, `username`, `pass`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW(),'{$uname}','{$pasw}'
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {?>
         <script>
            alert('Success! Your file was successfully added!');
        </script>
        <script>
            window.open("Upolad_File.php","_self");
        </script><?php
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {?>
        <script>
            alert('An error accured while the file was being uploaded');
        </script><?php
    }
 
    // Close the mysql connection
    //$dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
//echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>
 
 