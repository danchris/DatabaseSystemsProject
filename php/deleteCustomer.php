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

<h2>Delete a Customer</h2>
<?php
require_once('../root/connect.php');
if(isset($_POST['customer'])){
    $temp = trim($_POST['customer']);
    $query = "DELETE FROM Customer WHERE Customer_ID='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        echo 'Error to Delete';
        mysqli_error($dbc);
        mysqli_close($dbc);
        die($dbc);
    }
    else{
        echo "Customer with id: ", $temp, " deleted successfully<br>";
        mysqli_close($dbc);
        echo "Select other to Delete\t";
        echo'
                <form action="http://localhost/project/php/chooseDCustomer.php">
                <input type="submit" value="Choose" />
                </form>';
    }
}
else{
    echo' Please selece one';
    echo'
            <form action="http://localhost/project/php/chooseDCustomer.php">
            <input type="submit" value="Choose" />
            </form>';
}
?>
</body>
</html>
