<?php 
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<DOCTYPE html!>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="main-header">
        <div class="search">
            <div class="logo">
        <img src="img/nklogo.png"></div>
        <div class="searchme">
            <form><input type="search" id="name" name="name" placeholder="Search" autofocus autocomplete="on">
            </form>
        </div>
        </div>
		
        <div class="main-content">
         <div class="primary col">
                <h1>Today Jobs</h1>
                <img src="img/database.png">
                <p>Sync now</p>
             <div class="button">
             <input type="button"name="send" value="Sync"/>
        </div>
             </div>
        <div class="secondary col">
                <h1>Upcoming Jobs</h1>
                <img src="img/database.png">
                <p>Sync now</p>
            <div class="button">
             <input type="button"name="send" value="Send"/>
        </div>
        </div>
        <div class="third col">
                <h1>To-do list</h1>
                <img src="img/database.png">
                <p>Sync now</p>
            <div class="button">
             <input type="button"name="send" value="Send"/>
        </div>
        </div>
        </div>
        <div class="sub-content">
        <div class="primary col">
                <h1>Draw</h1>
                <img src="img/database.png">
                <p>Sync now</p>
             <div class="button">
             <input type="button"name="send" value="Sync"/>
        </div>
        </div>
        <div class="secondary col">
                <h1>Sync</h1>
                <img src="img/database.png">
                <p>Sync now</p>
             <div class="button">
             <input type="button"name="send" value="Sync"/>
        </div>
        </div>
         <div class="third col">
                <h1>Backup</h1>
                <img src="img/database.png">
                <form method="post" enctype="multipart/form-data">
                    <br/>
                    <input type="file" name="image" />
                    <br/><br/>
             
             <div class="button">
             <input type="submit"name="submit" value="Upload"/>
        </div>
        </form>
             <?php
                if(isset($_POST['submit'])){
                    if(getimagesize($_FILES['image']['tmp_name'])){
                        echo "Please select an image.";
                    }
                    else{
                        $image=addslashes($_FILES['image']['tmp_name']);
                        $name=addslashes($_FILES['image']['name']);
                        $image=file_get_contents($image);
                        $image=base64_encode($image);
                        saveimage($name,$image);
                    }
                }
             displayimage();
             function saveimage($name,$image){
                   $mysql_hostname="lifeofaris.se.mysql";
	               $mysql_user="lifeofaris_se";
	               $mysql_password="mRARIS1990";
	               $mysql_database="lifeofaris_se";
	
	               $bd=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or die("Bad Connection");
	               mysql_select_db($mysql_database,$bd)or die("Bad Connection");
                   $qry="insert into images (name,image) values ('$name','$image')";
                   $result=mysql_query($qry,$bd);
                   if($result){
                       echo "<br/>Image Uploaded.";
                   }
                   else{
                       echo "<br/>Image not Uploaded.";
                   }
             }
             function displayimage(){
                   $mysql_hostname="lifeofaris.se.mysql";
	               $mysql_user="lifeofaris_se";
	               $mysql_password="mRARIS1990";
	               $mysql_database="lifeofaris_se";
	
	               $bd=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)or die("Bad Connection");
	               mysql_select_db($mysql_database,$bd)or die("Bad Connection");
                   $qry="select * from images";
                   $result=mysql_query($qry,$bd);
                   while($row = mysql_fetch_array($result)){
                       echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
                   }
                   mysql_close($bd);
             }
             ?>
        </div>
        </div>
        </header>

</body>
</html>
