<html>
<head>
<title>Update a Store</title>
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
<h2>Update a Store</h2>
<?php
require_once('../root/connect.php');
if(isset($_POST['store'])){
    $temp = trim($_POST['store']);
    $query = "SELECT * FROM Store WHERE Store_ID='$temp'";
    $response = @mysqli_query($dbc, $query);
    if(!$response) {
        echo 'Error';
        mysqli_error($dbc);
        mysqli_close($dbc);
    }
    if(!empty($_POST['store'])) {
        echo '<form method="post" action=',$_PHP_SELF,'>';

        echo '<table  cellscpacing = "5" cellpadding = "8">';
        while($row = mysqli_fetch_array($response)){
            echo '<tr><td align="left"><b>Store ID</b></td>';
            $id = $row['Store_ID'];
            echo '<td>'.$id.'</td>';
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
            echo '<tr><td align="left"><b>Phone Number</b></td>';
            $res = @mysqli_query($dbc,'SELECT Phone_Number FROM Phone_Number WHERE Store_ID='.$temp.'');
            if(!$res)printf(mysqli_error($dbc));
            $phone_number = mysqli_fetch_row($res)[0];
            echo '<td><input name="phone_number" type="text" size="30" value=',$phone_number,'></td></tr>';
            echo' <tr><td alighn="left"><b>E-mail Address</b></td>';
            $res = mysqli_query($dbc,'SELECT Email_Address FROM Email_Address WHERE Store_ID='.$temp.'');
            $e_mail = mysqli_fetch_row($res)[0];
            echo '<td><input name="email" type="text" size="30" value=',$e_mail,'></td></tr>';
            echo '</select></td></tr>';
        }
        echo '<tr><td><input name="update" type="submit" id="update" value="Update"></td>';
?>
    <td><input name="button" type="button" value="Choose other Store" onclick="window.location.href='http://localhost/project/php/chooseStore.php'"/></td></tr>
<?php
        echo '</table>';
        echo '</form>';
    }
    else {

        echo 'Error Please Select One';
        mysqli_error($dbc);
        echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
        mysqli_close($dbc);
    }
}
if(isset($_POST['update'])){
  //  ob_start();
 //   require_once('chooseStore.php');
  //  $temp = trim($Store_ID);
//    ob_clean();
    $street = $_POST['street'];
    if($street) {
        $response = @mysqli_query($dbc,"UPDATE Store SET Street = '$street' WHERE Store_ID='$temp'");
        if(!$response) {
            echo 'Error to Update Street';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $street_number = $_POST['street_number'];
    if($street_number) {
        $response = @mysqli_query($dbc,"UPDATE Store SET Street_Number = '$street_number' WHERE Store_ID='$temp'");
        if(!$response) {
            echo 'Error to Update Street Number';
            mysqli_error($dbc);
            mysqli_close($dbc);
            die($dbc);
            echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
        }
    }
    $city = $_POST['city'];
    if($city) {
        $response = @mysqli_query($dbc,"UPDATE Store SET City = '$city' WHERE Store_ID='$temp'");
        if(!$response) {
            echo 'Error to Update City';
            mysqli_error($dbc);
            mysqli_close($dbc);
            echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
            die($dbc);
        }
    }
    $phone_number = $_POST['phone_number'];
    if($phone_number) {
        $response = @mysqli_query($dbc,"UPDATE IGNORE Phone_Number SET Phone_Number = '$phone_number' WHERE Store_ID='$temp'");
        if(!$response) {
            printf(mysqli_error($dbc));
            echo 'Error to Update Phone Number2';
            mysqli_error($dbc);
            mysqli_close($dbc);
            echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
            die($dbc);
        }
    }
    $e_mail = $_POST['email'];
    if($e_mail) {
        $response = @mysqli_query($dbc,"UPDATE IGNORE Email_Address SET Email_Address = '$e_mail' WHERE Store_ID='$temp'");
        if(!$response) {
            echo 'Error to Update E-mail Address';
            printf(mysqli_error($dbc));
            echo $e_mail;
            mysqli_error($dbc);
            mysqli_close($dbc);
            echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Try again" />
            </form>';
            die($dbc);
        }
    }
    echo 'Update data successfully<br>';
    echo "Choose new Store";
    echo '
            <form action="http://localhost/project/php/chooseStore.php">
            <input type="submit" value="Choose" />
            </form>';
    // header("Refresh:0");
    mysqli_close($dbc);
}

?>
</body>
</html>
