<html>
<head>
<title>Delete a Store</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<?php include '../css/default.css'; ?>
</style>
</head>
<body>
<div id="logo">
    <h1>PROJECT</h1>
</div>
<?php include("menu.html");?>

<h2>Delete a Store</h2>
<div id="form">
<form action="http://localhost/project/php/deleteStore.php" id="frm" method="post">
<select name="store" id="sel">
<option  value ="" >---Select---</option>
<?php
require_once('../root/connect.php');
$stmt = $dbc->prepare("SELECT `Store_ID`,`City`, `Street`, `Street_Number` FROM `Store`");
$stmt->execute();
$stmt->bind_result($Store_ID,$City,$Street,$Street_Number);
while ($stmt->fetch()){
    echo "<option value='$Store_ID'>$City $Street $Street_Number</option>";
}
$stmt->close();
?>
</select>

<p>
<input type="submit" name="submit" value="Delete" />
</p>
</form>
</div>

</body>
</html>
