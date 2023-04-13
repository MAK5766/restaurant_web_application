<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Id</strong></th>
<th><strong>Restaurant Name</strong></th>
<th><strong>Restaurant Image</strong></th>
<th><strong>Restaurant Address</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php

$count=1;
$sel_query="Select * from restaurant ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["rest_name"]; ?></td>
<td align="center"><?php echo base64_encode($row["rest_img"]); ?></td>
<td align="center"><?php echo $row["rest_address"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>

<?php $count++; } ?>


</tbody>
</table>
</div>
</body>
</html>