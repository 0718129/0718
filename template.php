<?php session_start(); ?>

    <!doctype html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<nav class="navbar navbar-expand-sm bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="https://www.logolynx.com/images/logolynx/d3/d3d6d7529b8fa267ddacf9c3e91186ab.jpeg" width="100rem" height="100rem"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Log-In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Find us</a>
                </li>


                <?php
                if (isset($_SESSION["FirstName"])) {
                    echo '<li class="nav-item" ><a class="nav-link" href = "orderForm.php"> Order Form </a ></li >';
                    echo '<li class="nav-item" ><a class="nav-link" href = "invoicehistory.php"> Invoice list</a ></li >';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                }
                if (isset($_SESSION["AccessLevel"])) {
                    if ($_SESSION["AccessLevel"] == 1) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Product Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="productAdd.php">Add Products</a></li>
                                <li><a class="dropdown-item" href="productList.php">Product List</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                }

                ?>

            </ul>
        </div>
        <?php
        if (isset($_SESSION["FirstName"])) {
            echo '<div class="bg-primary">Welcome, ' . $_SESSION["FirstName"] . '!<a class="nav-link" href="logout.php">Logout</a></div>';
        }
        ?>
    </div>
</nav>
<?php
if (isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
//    echo $message;
    ?>
    <div class="position-absolute bottom-0 end-0">
        <?= $message ?>

    </div>


    <?php
}
?>
<script src="js/bootstrap.bundle.min.js"></script>

<?php


$conn = new SQLite3("DB") or die("Unable to open database");


$productNames = array("product1" => "Jordan 1s", "product2" => "Jordan 4s", "product3" => "Air jordans HighTop", "product4" => "Air Force 1s", "product5" => "Jordan 3s");
$productPrices = array("product1" => 299.0, "product2" => 32.95, "product3" => 219.95, "product4" => 24.95, "product5" => 25.95);
function footer(): string
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}

function sanitiseData($unsanitisedData): string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}