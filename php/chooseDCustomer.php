<html>
<head>
<title>Delete a Customer</title>
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

<h2>Choose a Customer to delete</h2>
<div id="form">
<form action="http://localhost/project/php/deleteCustomer.php" id="frm" method="post">
<select name="customer" id="sel">
<option  value ="" >---Select---</option>
<?php
require_once('../root/connect.php');
$stmt = $dbc->prepare("SELECT `Customer_ID`,`First_Name`,`Last_Name`, `IRS` FROM `Customer`");
$stmt->execute();
$stmt->bind_result($Customer_ID,$First_Name,$Last_Name,$IRS);
while ($stmt->fetch()){
    echo "<option value='$Customer_ID'>Customer: $First_Name $Last_Name with IRS Number: $IRS</option>";
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
