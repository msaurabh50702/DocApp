<?php 
/* Main page with two forms: sign up and log in */
    session_start(); 
    include('dbcon.php');
    include('functn.php');
    //include('noti.php');
?>
<?php
    //session_start();
    if(!isset($_SESSION['unm']))
        
    { ?>
        <script>
            window.open("Dashboard.php","_self");
        </script><?php
        //header('location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/style_2.css">
        <style>
        img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;}
        /*Logout Button Style*/
             .butnn {
                 background-color: #5F9EA0; /* Green */
                 width: 75%;
                 border: none;
                 color: white;
                 padding: 16px 32px;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 font-size: 16px;
                 margin: 4px 2px;
                 -webkit-transition-duration: 0.4s; /* Safari */
                 transition-duration: 0.4s;
                 cursor: pointer;
            }
            .butnn:hover {
                 background-color: #870e0e;
                 color: white;
                -webkit-transition-duration: 0.4s; /* Safari */   
            }
            
        /*get mail Button Style*/
             .butnnn {
                 background-color: #5F9EA0; /* Green */
                 width: 75%;
                 border: none;
                 color: white;
                 padding: 16px 32px;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 font-size: 16px;
                 margin: 4px 2px;
                 -webkit-transition-duration: 0.4s; /* Safari */
                 transition-duration: 0.4s;
                 cursor: pointer;
            }
            .butnnn:hover {
                 background-color: #14870e;
                 color: white;
                -webkit-transition-duration: 0.4s; /* Safari */   
            }
            
        </style>
</head>
<body>

        <div class="btnheader">
            <hr size="20%" color="#5F9EA0">
            <h2>DocApp</h2>
            
            <hr size="25%" color="#5F9EA0"><hr><hr size="25%" color="#5F9EA0">
                <div class="input-group">
                    <button class="butn" onclick="window.location.href='MyDoc.php'">My Documents</button>
                    <!--<hr  style="align-content: center; width: 20% ">-->
                </div>
           
                 <div class="input-group">
                    <button class="butn" onclick="window.location.href='Upolad_File.php'">Upload Documents</button>                   
                </div>
            
                <div class="input-group">
                    <button class="butn" onclick="window.location.href='Remove_doc.php'">Remove Documents</button> 
                </div>
                
                 <div class="input-group">
                    <button class="butnnn" onclick="window.location.href='alrt.php'">Get Mail</button> 
                </div>
                
                <div class="input-group">
                    <button class="butnn" onclick="window.location.href='logout.php'">Logout</button> 
                </div>
                
                 <div align="left">
                     <font>&nbsp;&nbsp;&nbsp;Last Refill on :- <?php echo $odt.' ==> '.$daycnt. ' Day'; ?></font><br>
                     <font>&nbsp;&nbsp;&nbsp;Last OPC Drum Changed on :- <?php echo $oodt.' ==> '.$odaycnt. ' Day'; ?></font>
                </div>
        </div> 
        <div><br><br><br></div>

        <!-- PROMPT-->
        <form method="post" action="temp.php" id="myForm">
           <input type="hidden" id="demo" name="frm">
        </form>
        <script>
            function openColorBox(){
             var cnt = prompt("Hello\nTodays Date:- <?php echo date("d/m/y");?> \nPlease Enter Monthly Count");
                document.getElementById("demo").value=cnt;
                if(cnt!=0){
                document.getElementById("myForm").submit();
                alert("your form submitted");}
             }
             if (new Date().getDate()== 1) {
                 setTimeout(openColorBox, 5);   
             }
        </script>
    </body>
</html>
