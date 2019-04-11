<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['firstName']) && empty($_POST['lastName'])){
        $fnameErr = "Name is required";
        $lnameErr = "Name is required";
    }elseif(empty($_POST['firstName'])){
        $fnameErr = "Name is required";

    }elseif(empty($_POST['lastName'])){
        $lnameErr = "Name is required";

    }else{
        $_POST['firstName'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
        $_POST['lastName'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

        $stmt = $conn->prepare("INSERT INTO users (fname, lname) VALUES(?,?)");
        $stmt->bind_param("ss", $firstName, $lastName);

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
        $conn->close();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>This is the basic form you can replace related to the client</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First name:<br>
    <input type="text" name="firstName" placeholder="First Name"><br>
    <span class="error">* <?php echo $fnameErr;?></span><br><br>
    Last name:<br>
    <input type="text" name="lastName" placeholder="Second Name"><br>
    <span class="error">* <?php echo $lnameErr;?></span><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>