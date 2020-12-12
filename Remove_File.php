<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
       $dbLink = new mysqli('localhost', 'root', '', 'docapp');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "DELETE FROM `file`
                   WHERE  `id` = {$id}";
          
        $result = $dbLink->query($query);
 
        if($result) {?>
         <script>
            alert('File Removed Successfully.');
        </script>
        <script>
            window.open("Remove_doc.php","_self");
        </script><?php
        }
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>