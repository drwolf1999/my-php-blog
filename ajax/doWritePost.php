<?php
require("include/db_info.php");

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$ok = false;
if ($method == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    if (isset($_POST['id'])) {
        $sql = "UPDATE `post` SET `title` = ?, `categoryId` = ?, `content` = ? WHERE `postId` = ?";
        pdo_query($sql, $title, $category, $content, $_POST['id']);
    } else {
        $sql = "INSERT INTO `post` (`title`, `categoryId`, `content`) VALUES (?, ?, ?)";
        pdo_query($sql, $title, $category, $content);
    }
    $ok = true;
}

if ($ok) {
    echo json_encode(array("statusCode" => 201));
} else {
    echo json_encode(array("statusCode" => 400));
}