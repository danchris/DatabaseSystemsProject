<html>
<head>
<title>View Customers</title>
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
$query = "SELECT Customer_ID, First_Name, Last_Name, IRS, Street, City,
    Street_Number, Postal_Code, First_Registration FROM Customer";

$response = @mysqli_query($dbc, $query);

if($response){
    echo '<table align = "left" cellscpacing = "5" cellpadding = "8">
        <tr><td align="left"><b>Customer ID</b></td>
        <td align="left"><b>First Name</b></td>
        <td align="left"><b>Last Name</b></td>
        <td align="left"><b>IRS</b></td>
        <td align="left"><b>Street</b></td>
        <td align="left"><b>City</b></td>
        <td align="left"><b>Street Number</b></td>
        <td align="left"><b>Zip</b></td>
        <td align="left"><b>First_Registration</b></td></tr>';
    while($row = mysqli_fetch_array($response)){
            echo '<tr><td align="left">' .
            $row['Customer_ID'] . '</td><td align="left">' .
            $row['First_Name'] . '</td><td align="left">' .
            $row['Last_Name'] . '</td><td align="left">' .
            $row['IRS'] . '</td><td align="left">' .
            $row['Street'] . '</td><td align="left">' .
            $row['City'] . '</td><td align="left">' .
            $row['Street_Number'] . '</td><td align="left">' .
            $row['Postal_Code'] . '</td><td align="left">' .
            $row['First_Registration'] . '</td>';
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
