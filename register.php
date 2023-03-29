<?php include "template.php";
/** @var $conn */
?>

<title>User Registration</title>
<h1 class='text-primary'>User Registration</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <!--Customer Details-->

            <div class="col-md-6">
                <h2>Account Details</h2>
                <p>Please enter wanted username and password:</p>
                <p>Email Address<input type="text" name="username" class="form-control" required="required"></p>
                <p>Password<input type="password" name="password" class="form-control" required="required"></p>

            </div>
            <div class="col-md-6">
                <h2>More Details</h2>
                <!--Product List-->
                <p>Please enter More Personal Details:</p>
                        <p>First Name<input type="text" name="firstname" class="form-control" required="required"></p>
                    <p>Second Name<input type="text" name="secondName" class="form-control" required="required"></p>
                 <p>Address<input type="text" name="address" class="form-control" required="required"></p>
                <p>Phone Number<input type="text" name="phoneNumber" class="form-control" required="required"></p>
            </div>
        </div>
    </div>
    <input type="submit" name="formSubmit" value="Submit">
</form>



<?php
// Back End
IF ($_SERVER["REQUEST_METHOD"] == "POST") {    // Will return true when the user presses the submit button
    $username = sanitise_data($_POST['username']);
    $password = sanitise_data($_POST['password']);
    $FirstName = sanitise_data($_POST['firstName']);
    $SecondName = sanitise_data($_POST['secondName']);

    // Check if username/email address already exists in the database
    $query = $conn->query("SELECT COUNT(*) FROM Customers WHERE EmailAddress='$username'");
    $data = $query->fetchArray();
    $numberofUsers = (int)$data[0];  // Username already exists
    echo "Sorry, username exists bro";
        }  else  {
             // the username entered is unique (doesn't already exist)
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlStmt = $conn->prepare("INSERT INTO Customers (EmailAddress, HashedPassword, FirstName) VALUES (:EmailAddress, :HashedPassword, :FirstName)");
    $sqlStmt->bindParam(':EmailAddress', $username);
    $sqlStmt->bindParam(':HashedPassword', $hashedPassword);
    $sqlStmt->bindParam(':FirstName', $FirstName);
    $sqlStmt->bindParam(':SecondName', $FirstName);
    $sqlStmt->bindParam(':Address', $FirstName);
    $sqlStmt->bindParam(':PhoneNumber', $FirstName);
    $sqlStmt->execute();

}
?>