<html>
<head>
<title>Add Vehicle</title>
<link rel = "stylesheet" type ="text/css" href="../css/default.css">
</head>
<body>
<div id="logo">
    <h1>PROJECT</h1>
</div>
<div id="form">
<form action="http://localhost/project/php/vehicleAdded.php" method="post">

<h2> Add a New Vehicle </h2>
<p>License Plate:
<input type = "text" name = "plate" size="30" value=""/>
</p>

<p>Model:
<input type = "text" name = "model" size="30" value=""/>
</p>
<p>Type:
<?php
require_once('../root/connect.php');
$table_name = "Vehicle";
$column_name = "Type";

echo "<select name=\"$column_name\"><option>---Select Type---</option>";
$q = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
$r = mysqli_query($dbc, $q);

$row = mysqli_fetch_array($r);

$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
foreach($enumList as $value)
    echo "<option value=\"$value\">$value</option>";

echo "</select>";
?>
</p>
<p>Make:
<input type = "text" name = "make" size="30" value=""/>
</p>
<p> Year:
<?php
//get the current year
$Startyear=date('Y');
$endYear=$Startyear-50;

// set start and end year range i.e the start year
$yearArray = range($Startyear,$endYear);
?>
<!-- here you displaying the dropdown list -->
<select name="year">
    <option value="">---Select Year---</option>
    <?php
    foreach ($yearArray as $year) {
        // this allows you to select a particular year
      //  $selected = ($year == $StartYear) ? 'selected' : '';
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    }
    ?>
</select>
</p>
<p>Kilometers:
<input type = "text" name = "khm" size="30" value=""/>
</p>

<p>Cylinder Capacity:
<input type = "text" name = "cc" size="30" value=""/>
</p>

<p>Horse Power:
<input type = "text" name = "hp" size="30" value=""/>
</p>

<p>Damages:
<input type="text" name = "damages" size = "30" value=""/>
</p>

<p>Malfuctions:
<input type="text" name = "mal" size = "30" value=""/>
</p>

<!--
<p>Damages:
<textarea name = "damages"></textarea>
</p>

<p>Malfuctions:
<textarea name = "mal"></textarea>
</p>
-->
<p>Next Service:
<input type = "date" name = "next_service" value=""/>
</p>

<p>Last Service:
<input type = "date" name = "last_service" value=""/>
</p>

<p>Insurance Exp Date:
<input type = "date" name = "iexp" value=""/>
</p>

<p>Store:
<select name="store_id">
<option value = "">---Select---</option>
<?php
require_once('../root/connect.php');
$stmt = $dbc->prepare("SELECT `Store_ID`,`City` FROM `Store`");
$stmt->execute();
$stmt->bind_result($Store_ID,$City);
while ($stmt->fetch()){
    echo "<option value='$City $Store_ID'>$City $Store_ID</option>";
}
$stmt->close();
?>
</select>
</p>


<p>
<input type="submit" name="submit" value="Submit" />
</p>

</form>
</body>
</html>
