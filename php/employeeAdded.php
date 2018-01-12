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

    if(empty($_POST['finish_date'])){
        $data_missing[] = "Finish Date";
    }
    else{
        $f_date = trim($_POST['finish_date']);
    }
    if(empty($_POST['pos'])){
        $data_missing[] = "Position";
    }
    else{
        $pos = trim($_POST['pos']);
    }
    if(empty($_POST['store_id'])){
        $data_missing[] = "Store";
    }
    else{
        $tmp = trim($_POST['store_id']);
       // echo "store id: ----------", $store_id,"<br>";
        $int = intval(preg_replace('/[^0-9]+/', '', $tmp), 10);
        $store_id = (string)$int;
    }
    if(empty($data_missing)){
        require_once('../root/connect.php');

        $query = "INSERT INTO Employee (IRS, Social_Security_Number, Driver_License, First_Name, Last_Name, Street, Street_Number, Postal_Code,City) VALUES ('$irs', '$ssn', '$d_lic', '$f_name', '$l_name', '$street', '$street_number', '$postal_code', '$city')";

        $result = @mysqli_query($dbc,$query);
        if(!$result) {
            echo 'Error to insert data'; printf(mysqli_error($dbc));
            echo '
                <form action="http://localhost/project/php/addStore.php">
                <input type="submit" value="Try again" />
                </form>';
            die($dbc);
        }

        $query = "INSERT INTO Works (IRS, Store_ID, Start_Date, Finish_Date, Position) VALUES ('$irs', '$store_id' ,CURDATE(),'$f_date', '$pos')";
        $result = @mysqli_query($dbc,$query);

        if(!$result) {
            echo 'Error to insert data'; printf(mysqli_error($dbc));
            //            mysqli_close($dbc);
            echo '
                <form action="http://localhost/project/php/addStore.php">
                <input type="submit" value="Try again" />
                </form>';
            die($dbc);
        }else {
            echo 'Employee Added';
            mysqli_close($dbc);
            echo'<form action="http://localhost/project/php/addEmployee.php">
                <input type="submit" value="Add New Employee" />
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
            <form action="http://localhost/project/php/addEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
    }
}
?>
</body>
</html>
