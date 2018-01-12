<html>
<head>
<title>Update an Employee</title>
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

<h2>Update an Employee</h2>
<?php
require_once('../root/connect.php');
if(isset($_POST['employee'])){
    $temp = trim($_POST['employee']);
    $query = "SELECT * FROM Employee WHERE IRS='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        echo 'Error';
        mysqli_error($dbc);
        mysqli_close($dbc);
    }
    if(!empty($_POST['employee'])) {
        echo '<form method="post" action=',$_PHP_SELF,'>';

        echo '<table  cellscpacing = "5" cellpadding = "8">';
        while($row = mysqli_fetch_array($response)){
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
            echo'<tr><td align="left"><b>Works in Store</b></td>';
            echo '<td align="left"><select name="store_id" id="sel">';
            $res = mysqli_query($dbc,'SELECT City, Store_ID, Street, Street_Number FROM Store st WHERE st.Store_ID IN (SELECT wo.Store_ID FROM Works wo WHERE IRS ='.$temp.' AND wo.Store_ID=st.Store_ID)');
            $r = mysqli_fetch_row($res);
            echo '<option>',$r[0] ,' ', $r[2], ' ', $r[1],'</option>';
            $stmt = $dbc->prepare("SELECT `Store_ID`,`City`, `Street` FROM `Store`");
            $stmt->execute();
            $stmt->bind_result($Store_ID,$City,$Street,$Street_Number);
            while ($stmt->fetch()){
                if($r[1]!=$Store_ID) echo "<option value='$Store_ID'>$City $Street $Street_Number</option>";
            }
            $stmt->close();
            echo '</select></td></tr>';
        }
        echo '<tr><td><input name="update" type="submit" id="update" value="Update"></td>';
?>
    <td><input name="button" type="button" value="Choose other Employee" onclick="window.location.href='http://localhost/project/php/chooseEmployee.php'"/></td></tr>
<?php
        echo '</table>';
        echo '</form>';
    }
    else {

        echo 'Error Please Select One';
        mysqli_error($dbc);
        echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        mysqli_close($dbc);
    }
}
if(isset($_POST['update'])){
  /*  ob_start();
    require_once('chooseEmployee.php');
    $temp = trim($IRS);
    ob_clean();
   */
    $f_name = trim($_POST['f_name']);
    if($f_name) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET First_Name = '$f_name' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update First Name';
            echo $temp;
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $l_name = $_POST['l_name'];
    if($l_name) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET Last_Name = '$l_name' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update Last Name';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $irs = $_POST['irs'];
    if($irs) {
        mysqli_query($dbc,"SET FOREIGN_KEY_CHECKS=0");
        $response = @mysqli_query($dbc,"UPDATE Employee, Works SET Works.IRS = '$irs', Employee.IRS='$irs' WHERE Works.IRS=Employee.IRS AND Works.IRS='$temp'");
        mysqli_query($dbc,"SET FOREIGN_KEY_CHECKS=1");
        $temp = trim($irs);
        if(!$response) {
            printf(mysqli_error($dbc));
            echo 'Error to Update IRS Number';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $ssn = $_POST['ssn'];
    if($ssn) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET Social_Security_Number = '$ssn' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update Social Security Number';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $d_lic = $_POST['d_lic'];
    if($d_lic) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET Driver_License = '$d_lic' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update Driver License';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $street = $_POST['street'];
    if($street) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET Street = '$street' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update Street';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $street_number = $_POST['street_number'];
    if($street_number) {
        $response = @mysqli_query($dbc,"UPDATE Employee SET Street_Number = '$street_number' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update Street Number';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $city = $_POST['city'];
    if($city) {
        $response = @mysqli_query($dbc,"UPDATE Customer SET City = '$city' WHERE IRS='$temp'");
        if(!$response) {
            echo 'Error to Update City';
            mysqli_error($dbc);
            mysqli_close($dbc);
            echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
            die($dbc);
        }
        $store_id = $_POST['store_id'];
        if($store_id) {
            $response = @mysqli_query($dbc,"UPDATE IGNORE Works SET Store_ID = '$store_id' WHERE IRS='$temp'");
            if(!$response) {
                echo 'Error to Update Store';
                mysqli_error($dbc);
                mysqli_close($dbc);
                echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Try again" />
            </form>';
                die($dbc);
            }
        }
    }
    echo 'Update data successfully<br>';
    echo "Choose new Employee";
    echo '
            <form action="http://localhost/project/php/chooseEmployee.php">
            <input type="submit" value="Choose" />
            </form>';
    // header("Refresh:0");
    mysqli_close($dbc);
}

?>
</body>
</html>
