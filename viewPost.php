<?php
require_once ("include/utility.function.php");
require_once ("Controller/post.php");
require_once ("Controller/comment.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'GET') {
    $error_msg = "REQUEST_METHOD forbidden";
    echo $error_msg;
    exit(0);
}

$id = $_GET['id'];

$post = getPost($id);

$comment = getComments($post['id']);

require ("View/viewPost.php");