<?php

// $a = [1, 2, 3, 4];
// $a[] = 20;
// array_push($a, -20, 100, 'mehdi', 3);

// var_dump($a);
require 'includes/database.php';

$db = new Dbh;
$pdo = $db->connect();
$sql = 'SELECT firstname, lastname, Users.id
        FROM Users
        JOIN Roles ON Users.role_id = Roles.id
        WHERE Roles.name LIKE "writer"
        ;';
$result = $pdo->query($sql);
foreach ($result->fetchAll() as $category) {
    // echo "<option value='{$category['id']}'>{$category['name']}</option>\n";
    var_dump($category);
    echo '<br>';
}