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

<div id="form">
<form action="http://localhost/project/php/storeAdded.php" method="post">

<h2> Add a New Store </h2>

<p>Street:
<input type = "text" name = "street" size="30" value=""/>
</p>

<p>Street Number:
<input type = "text" name = "street_number" size="30" value=""/>
</p>

<p>City:
<input type = "text" name = "city" size="30" value=""/>
</p>

<p>Postal Code:
<input type = "text" name = "postal_code" size="30" value=""/>
</p>

<p>Phone Number:
<input type = "text" name = "p_number" size="30" value=""/>
</p>

<p>E-mail Address:
<input type = "text" name = "e_mail" size="30" value=""/>
</p>

<p>
<input type="submit" name="submit" value="Submit" />
</p>

</form>
</div>
</body>
</html>
