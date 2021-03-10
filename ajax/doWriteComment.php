<?php
require_once(__DIR__."/../Controller/comment.php");

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

$ok = false;

if ($method == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $body = $_POST['body'];
    $parentComment = $_POST['parentComment'];
    if ($parentComment == '') $parentComment = null;
    $postId = $_POST['postId'];
    addComment($parentComment, $username, $password, $body, $postId);
    $ok = true;
}

if ($ok) {
    echo json_encode(array("statusCode" => 201));
} else {
    echo json_encode(array("statusCode" => 400));
}