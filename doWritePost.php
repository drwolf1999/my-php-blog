<?php
require ("include/db_info.php");

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$ok = false;
if ($method == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO `post` (`title`, `content`) VALUES (?, ?)";
    pdo_query($sql, $title, $content);
    $ok = true;
}

if ($ok) {
    echo json_encode(array("statusCode" => 201));
} else {
    echo json_encode(array("statusCode" => 400));
}