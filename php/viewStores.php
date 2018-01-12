<html>
<head>
<title>View Stores</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<?php include '../css/default.css'; ?>
</style>
</head>
<body>
<div id="logo">
    <h1>PROJECT</h1>
</div>
<?php


require_once('../root/connect.php');

include ('menu.html');
$query = "SELECT Store_ID, Street, Street_Number, Postal_Code, City FROM Store";
$query1 = "SELECT Phone_Number FROM Phone_Number";
$query2 = "SELECT Email_Address FROM Email_Address";
$response = @mysqli_query($dbc, $query);

$response1 = @mysqli_query($dbc, $query1);
$response2 = @mysqli_query($dbc, $query2);
if($response && $response1 && $response2){
    echo '<table align = "left" cellscpacing = "5" cellpadding = "8">
        <tr><td align="left"><b>Store ID</b></td>
        <td align="left"><b>Street</b></td>
        <td align="left"><b>Street Number</b></td>
        <td align="left"><b>Zip</b></td>
        <td align="left"><b>City</b></td>
        <td align="left"><b>Phone Number</b></td>
        <td align="left"><b>E-mail Address</b></td></tr>';
    while(($row = mysqli_fetch_array($response)) && ($row1 = mysqli_fetch_array($response1)) && ($row2 = mysqli_fetch_array($response2))){
            echo '<tr><td align="left">' .
            $row['Store_ID'] . '</td><td align="left">' .
            $row['Street'] . '</td><td align="left">' .
            $row['Street_Number'] . '</td><td align="left">' .
            $row['Postal_Code'] . '</td><td align="left">' .
            $row['City'] . '</td><td align="left">' .
            $row1['Phone_Number'] . '</td><td align="left">' .
            $row2['Email_Address'] . '</td>';
        echo '</tr>';

    }
    echo '</table>';
}
else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
}
mysqli_close($dbc);
?>
</body>
</html>
