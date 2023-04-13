<?php
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $rest_name = $_REQUEST['rest_name'];
    $rest_address = $_REQUEST['rest_address'];
    $isUploaded = false;
    if(isset($_FILES["rest_img"]["name"]) && !empty($_FILES["rest_img"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["rest_img"]["name"]);
        if(move_uploaded_file($_FILES["rest_img"]["tmp_name"], $target_file)) {
           $isUploaded = true; 
        }
    }
    if($isUploaded) {
        $ins_query="insert into restaurant (`rest_name`,`rest_img`,`rest_address`)values ('$rest_name','$target_file','$rest_address')";
    } else {
        $ins_query="insert into restaurant (`rest_name`,`rest_address`)values ('$rest_name','$rest_address')";
    }
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" enctype="multipart/form-data" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="rest_name" placeholder="Enter restaurant Name" required /></p>

<p><input type="text" name="rest_address" placeholder="Enter restaurant address" required /></p>
<p><input type="file" name="rest_img" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>