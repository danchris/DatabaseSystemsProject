<html>
<head>
<title>Update a Customer</title>
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

<h2>Update a Customer</h2>
<?php
require_once('../root/connect.php');
if(isset($_POST['customer'])){
    $temp = trim($_POST['customer']);
    $query = "SELECT * FROM Customer WHERE Customer_ID='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        echo 'Error';
        mysqli_error($dbc);
        mysqli_close($dbc);
    }
if(!empty($_POST['customer'])) {

        echo '<form method="post" action=',$_PHP_SELF,'>';

        echo '<table  cellscpacing = "5" cellpadding = "8">';
        while($row = mysqli_fetch_array($response)){
            echo'<tr><td align="left"><b>Customer ID</b></td>';
            $id = $row['Customer_ID'];
            echo '<td><input name="id" type="text" size="30" value=',$id,'></td></tr>';
            echo '<tr><td align="left"><b>First Name</b></td>';
            $f_name = $row['First_Name'];
            echo '<td><input name="f_name" type="text" size="30" value=',$f_name,'></td></tr>';
            echo' <tr><td alighn="left"><b>Last Name</b></td>';
            $l_name = $row['Last_Name'];
            echo '<td><input name="l_name" type="text" size="30" value=',$l_name,'></td></tr>';
            echo'    <tr><td align="left"><b>IRS Number</b></td>';
            $irs = $row['IRS'];
            echo '<td><input name="irs" type="text" size="30" value=',$irs,'></td></tr>';
            echo '<tr><td align="left"><b>Social Security Number</b></td>';
            $ssn = $row['Social_Security_Number'];
            echo '<td><input name="ssn" type="text" size="30" value=',$ssn,'></td></tr>';
            echo '<tr><td align="left"><b>Driver License</b></td>';
            $d_lic = $row['Driver_License'];
            echo '<td><input name="d_lic" type="text" size="30" value=',$d_lic,'></td></tr>';
            echo '<tr><td align="left"><b>First Registration</b></td>';
            $f_reg = $row['First_Registration'];
            echo '<td>',$f_reg,'</td>';
            echo '<tr><td align="left"><b>Street</b></td>';
            $street = $row['Street'];
            echo '<td><input name="street" type="text" size="30" value="'.$street.'"></td></tr>';
            echo '<tr><td align="left"><b>Street Number</b></td>';
            $street_number = $row['Street_Number'];
            echo '<td><input name="street_number" type="text" size="30" value=',$street_number,'></td></tr>';
            echo '<tr><td align="left"><b>City</b></td>';
            $city = $row['City'];
            echo '<td><input name="city" type="text" size="30" value=',$city,'></td></tr>';
            echo'<tr><td align="left"><b>Postal Code</b></td>';
            $postal_code = $row['Postal_Code'];
            echo '<td><input name="postal_code" type="text" size="30" value=',$postal_code,'></td></tr>';
        }
        echo '<td><input name="update" type="submit" id="update" value="Update" /></td';
        echo '</table>';
        echo '</form>';
}
else {

                echo 'Error Please Select One';
                mysqli_error($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
                mysqli_close($dbc);
}
}
?>
<!--<td><input name="button" type="button" value="Choose other Customer" onclick="window.location.href='http://localhost/project/php/chooseCustomer.php'"/></td>-->
<?php

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $temp = $id;
        if($id) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Customer_ID = '$id' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update Customer ID';
                mysqli_error($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
                mysqli_close($dbc);
            }
        }
        $f_name = $_POST['first_name'];
        if($f_name) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET First_Name = '$f_name' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update First Name';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $l_name = $_POST['last_name'];
        if($l_name) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Last_Name = '$l_name' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update Last Name';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $irs = $_POST['irs'];
        if($irs) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET IRS = '$irs' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update IRS Number';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $ssn = $_POST['ssn'];
        if($ssn) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Social_Security_Number = '$ssn' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update Social Security Number';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $d_lic = $_POST['d_lic'];
        if($d_lic) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Driver_License = '$d_lic' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update Driver License';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $street = $_POST['street'];
        if($street) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Street = '$street' WHERE Customer_ID = '$temp'");
            if(!$respon) {
                echo 'Error to Update Street';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $street_number = $_POST['street_number'];
        if($street_number) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET Street_Number = '$street_number' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update Street Number';
                mysqli_error($dbc);
                mysqli_close($dbc);
                die($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
            }
        }
        $city = $_POST['city'];
        if($city) {
            $respon = @mysqli_query($dbc,"UPDATE Customer SET City = '$city' WHERE Customer_ID='$temp'");
            if(!$respon) {
                echo 'Error to Update City';
                mysqli_error($dbc);
                mysqli_close($dbc);
                echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Try again" />
            </form>';
                die($dbc);
            }
        }
        echo 'Update data successfully<br>';
        echo "Choose new Customer";
        echo '
            <form action="http://localhost/project/php/chooseCustomer.php">
            <input type="submit" value="Choose" />
            </form>';
//        header("Refresh:0");
        mysqli_close($dbc);
    }
?>
</body>
</html>
