<?php
require_once (__DIR__."/../Controller/comment.php");

$method = $_SERVER['REQUEST_METHOD'];

$ok = false;
if ($method == 'POST') {
    $commentId = $_POST['commentId'];
    deleteComment($commentId);
    $ok = true;
}