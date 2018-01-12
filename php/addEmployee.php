<html>
<head>
<title>Add Employee</title>
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
<div id="form">
<form action="http://localhost/project/php/employeeAdded.php" method="post">

<h2> Add a New Employee </h2>
<p>First Name:
<input type = "text" name = "first_name" size="30" value=""/>
</p>

<p>Last Name:
<input type = "text" name = "last_name" size="30" value=""/>
</p>

<p> IRS Number:
<input type = "text" name = "irs" size="30" value=""/>
</p>

<p>Social Security Number:
<input type = "text" name = "ssn" size="30" value=""/>
</p>

<p>Driver License:
<input type = "text" name = "driver_license" size="30" value=""/>
</p>

<p>City:
<input type = "text" name = "city" size="30" value=""/>
</p>

<p>Street:
<input type = "text" name = "street" size="30" value=""/>
</p>

<p>Street Number:
<input type = "text" name = "street_number" size="30" value=""/>
</p>

<p>Postal Code:
<input type = "text" name = "postal_code" size="30" value=""/>
</p>

<p>Works in Store:
<select name="store_id">
<option value = "">---Select---</option>
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
</p>

<p>Position:
<input type = "text" name = "pos" size="30" value=""/>
</p>

<p>Finish Date:
<input type = "date" name = "finish_date" value=""/>
</p>

<p>
<input type="submit" name="submit" value="Submit" />
</p>

</form>
</div>
</body>
</html>
