<html>
<head>
<title>Delete an Employee</title>
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

<h2>Delete a Customer</h2>
<?php
require_once('../root/connect.php');
if(isset($_POST['employee'])){
    $temp = trim($_POST['employee']);
    $q = @mysqli_query($dbc,'SET FOREIGN_KEY_CHECKS=0');
    if(!$q) echo "Error to Disable FK";
    $query = "DELETE FROM Employee WHERE IRS='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        printf(mysqli_error($dbc));
        echo 'Error to Delete';
        mysqli_error($dbc);
        mysqli_close($dbc);
        die($dbc);
    }
    $q = @mysqli_query($dbc,'SET FOREIGN_KEY_CHECKS=0');
    if(!$q) echo "Error to Disable FK";
    $query = "DELETE FROM Works WHERE IRS='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        printf(mysqli_error($dbc));
        echo 'Error to Delete';
        mysqli_error($dbc);
        mysqli_close($dbc);
        die($dbc);
    }
    else{
        echo "Employee with IRS Number: ", $temp, " deleted successfully<br>";
        $q = @mysqli_query($dbc,'SET FOREIGN_KEY_CHECKS=1');
        if(!$q) echo "Error to Enable FK";
        mysqli_close($dbc);
        echo "Select other to Delete\t";
        echo'
                <form action="http://localhost/project/php/chooseDEmployee.php">
                <input type="submit" value="Choose" />
                </form>';
    }
}
else{
    echo' Please selece one';
    echo'
            <form action="http://localhost/project/php/chooseDEmployee.php">
            <input type="submit" value="Choose" />
            </form>';
}
?>
</body>
</html>
