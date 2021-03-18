<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//$_POST["email"] = ' ';
//$_POST["street"] = ' ';
//$_POST["streetnumber"] = ' ';
//$_POST["city"] = ' ';
//$_POST["zipcode"] = ' ';
echo $_POST["email"];
echo $_GET["street"];
echo $_GET["streetnumber"];
echo $_GET["city"];
echo $_GET["zipcode"];


$emailErr = $streetErr = $streetNumberErr = $cityErr = $zipcodeErr = "";
$email = $street = $street = $city = $zipcode = "";
 //check if the user enter a valid mail
if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
} else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr= "* Invalid email format";
    }
}
// check if the user enter a valid street
if (empty($_POST["street"])) {
    $streetErr = "* street is required";
} else {
    $street= test_input($_POST["street"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$street)) {
        $streetErr = "Only letters and white space allowed";
    }
}
// check if the user enter a valid street number
if (empty($_POST["streetnumber"])) {
    $streetNumberErr = "* street number is required";
} else {
    $streetNumber= test_input($_POST["streetnumber"]);
    // check if name only contains letters and whitespace
    if (!filter_var($streetNumber, FILTER_SANITIZE_NUMBER_INT)) {
        $streetNumberErr = "Only letters and white space allowed";
    }
}
//check if the user enter a valid city
if (empty($_POST["city"])) {
    $cityErr = "* city is required";
} else {
    $city = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
        $cityErr = "Only letters and white space allowed";
    }
}
//check if the user enter a valid postal code
if (empty($_POST["zipcode"])) {
    $zipcodeErr = "* street number is required";
} else {
    $zipcode= test_input($_POST["zipcode"]);
    // check if name only contains letters and whitespace
    if (!filter_var($zipcode, FILTER_SANITIZE_NUMBER_INT)) {
        $zipcodeErr = "Only letters and white space allowed";
    }
}

///////////
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//your products with their price.
$products = [
    ['name' => 'Margherita', 'price' => 8],
    ['name' => 'Hawaï', 'price' => 8.5],
    ['name' => 'Salami pepper', 'price' => 10],
    ['name' => 'Prosciutto', 'price' => 9],
    ['name' => 'Parmiggiana', 'price' => 9],
    ['name' => 'Vegetarian', 'price' => 8.5],
    ['name' => 'Four cheeses', 'price' => 10],
    ['name' => 'Four seasons', 'price' => 10.5],
    ['name' => 'Scampi', 'price' => 11.5]
];

$products = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];

$totalValue = 0;

require 'form-view.php';

?>