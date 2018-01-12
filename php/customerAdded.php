<html>
<head>
<title>Add Customer</title>
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

<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['first_name'])){
        $data_missing[] = "First Name";
    }
    else {
        $f_name = trim($_POST['first_name']);
    }

    if(empty($_POST['last_name'])){
        $data_missing[] = "Last Name";
    }
    else{
        $l_name = trim($_POST['last_name']);
    }

    if(empty($_POST['irs'])){
        $data_missing[] = "IRS Number";
    }
    else{
        $irs = trim($_POST['irs']);
    }

    if(empty($_POST['ssn'])){
        $data_missing[] = "Social Security Number";
    }
    else{
        $ssn = trim($_POST['ssn']);
    }

    if(empty($_POST['driver_license'])){
        $data_missing[] = "Driver License";
    }
    else{
        $d_lic = trim($_POST['driver_license']);
    }

    if(empty($_POST['city'])){
        $data_missing[] = "City";
    }
    else{
        $city = trim($_POST['city']);
    }

    if(empty($_POST['street'])){
        $data_missing[] = "Street";
    }
    else{
        $street = trim($_POST['street']);
    }

    if(empty($_POST['street_number'])){
        $data_missing[] = "Street Number";
    }
    else{
        $street_number = trim($_POST['street_number']);
    }

    if(empty($_POST['postal_code'])){
        $data_missing[] = "Postal Code";
    }
    else{
        $postal_code = trim($_POST['postal_code']);
    }

    if(empty($data_missing)){
        require_once('../root/connect.php');

        $query = "INSERT INTO Customer (IRS, Social_Security_Number, Last_Name, First_Name, Driver_License, First_Registration, City, Postal_Code,Street,Street_number) VALUES (?,?,?,?,?,NOW(),?,?,?,?)";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt,"isssssisi", $irs, $ssn, $l_name, $f_name, $d_lic, $city, $postal_code, $street, $street_number);
        mysqli_stmt_execute($stmt);

        $addected_rows = mysqli_stmt_affected_rows($stmt);

        if($addected_rows == 1){
            echo 'Customer Added with id: ';
            echo array_values(mysqli_fetch_array($dbc->query("SELECT Customer_ID FROM Customer WHERE Social_Security_Number='$ssn'")))[0];
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        echo'<form action="http://localhost/project/php/addCustomer.php">
        <input type="submit" value="Add New Customer" />
        </form>';
        }
        else {
            echo 'Error Occured<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        echo '
            <form action="http://localhost/project/php/addCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    else {
        echo 'The following field required<br />';
        echo '<ul>';
        foreach($data_missing as $missing){
            echo "<li>$missing</li>";
        }
        echo '<ul>';
        echo '
            <form action="http://localhost/project/php/addCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
    }
}
?>
</body>
</html>
