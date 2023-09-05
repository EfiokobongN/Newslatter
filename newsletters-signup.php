<?php

// Connect to database
try {
    $db = new PDO('mysql:host=localhost;dbname=newsletters', 'root', '');
} catch (PDOException $e) {
    // echo '<pre>';
    // print_r($e);
    // echo '</pre>';
    echo '<p>Whoops, something went wrong</p>';
    echo '<br>';
    echo '<a href="/NewsLatter/">Try Again</a>';
    exit();
    print_r($db);
}

$customer = [
    'name' => isset($_POST['name']) ? $_POST['name'] : NULL,
    'email' => isset($_POST['email']) ? $_POST['email'] : NULL,
    // php date function - https://www.php.net/manual/en/function.date.php
    'created_at' => date("Y-m-d"), 
];

$db->prepare("
    INSERT INTO newsletter (name, email, created_at) VALUES (:name, :email, :created_at)
")->execute($customer);

// Redirect browser
header("Location: http://localhost/NewsLatter/thanks.php"); 
exit();
?>


