<html>
<head>
<title>Add Store</title>
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

    if(empty($_POST['p_number'])){
        $data_missing[] = "Phone Number";
    }
    else{
        $p_number = trim($_POST['p_number']);
    }

    if(empty($_POST['e_mail'])){
        $data_missing[] = "E-mail Address";
    }
    else{
        $e_mail = trim($_POST['e_mail']);
    }

    if(empty($data_missing)){
        require_once('../root/connect.php');

        $query = "INSERT INTO Store (Street, Street_Number, Postal_Code, City) VALUES ('$street','$street_number','$postal_code','$city')";

        $result = mysqli_query($dbc,$query);
        if(!$result) {
            echo 'Error to insert data store';
            mysqli_close($dbc);
            echo '
                <form action="http://localhost/project/php/addStore.php">
                <input type="submit" value="Try again" />
                </form>';
        }
        $store_id = array_values(mysqli_fetch_array($dbc->query("SELECT Store_ID FROM Store WHERE (Street='$street' AND Street_Number='$street_number' AND City='$city' AND Postal_Code='$postal_code')")))[0];

        $query = "INSERT INTO Phone_Number (Store_ID, Phone_Number) VALUES ('$store_id','$p_number')";

        $result = mysqli_query($dbc,$query);
        if(!$result) {
            echo 'Error to insert data phone';
            mysqli_close($dbc);
            echo '
                <form action="http://localhost/project/php/addStore.php">
                <input type="submit" value="Try again" />
                </form>';
        }

        $query = "INSERT INTO Email_Address (Store_ID, Email_Address) VALUES ('$store_id','$e_mail')";

        $result = mysqli_query($dbc,$query);
        if(!$result) {
            echo 'Error to insert data email';
            mysqli_close($dbc);
            echo '
                <form action="http://localhost/project/php/addStore.php">
                <input type="submit" value="Try again" />
                </form>';
        }

        echo 'Store Added with id: ',$store_id;
        mysqli_close($dbc);
        echo'<form action="http://localhost/project/php/addStore.php">
            <input type="submit" value="Add New Store" />
            </form>';
}
else {
    echo 'The following field required<br />';
    echo '<ul>';
    foreach($data_missing as $missing){
        echo "<li>$missing</li>";
    }
    echo '<ul>';
    echo '
            <form action="http://localhost/project/php/addStore.php">
            <input type="submit" value="Try again" />
            </form>';
}
}
?>
</body>
</html>
