<?php
require_once (__DIR__."/../include/db_info.php");
require_once (__DIR__."/../include/utility.function.php");

function getComments($postId) {
    $sql = "SELECT `commentID`, `parentComment`, `username`, `password`, `updateAt`, `body` FROM `comment` WHERE `postId` = ? AND `active` = 1";
    $result = pdo_query($sql, $postId);
    $ret = array();
    foreach ($result as $r) {
        $ele = array();
        $ele['commentID'] = $r['commentID'];
        $ele['username'] = $r['username'];
        $ele['password'] = $r['password'];
        $ele['updateAt'] = dateTimeToString($r['updateAt']);
        $ele['body'] = $r['body'];
        if ($r['parentComment'] == null) {
            $ele['child'] = array();
            $ret[$r['commentID']] = $ele;
        } else {
            array_push($ret[$r['parentComment']]['child'], $ele);
        }
    }
    return $ret;
}

function addComment($parentComment, $username, $password, $body, $postId) {
    $sql = "INSERT INTO `comment` (`parentComment`, `username`, `password`, `body`, `postId`) VALUES (?, ?, ?, ?, ?)";
    pdo_query($sql, $parentComment, $username, $password, $body, $postId);
}

function deleteComment($commentId) {
    $sql = "UPDATE `comment` SET `active` = 0 WHERE `parentComment` = ? OR `commentID` = ?";
    pdo_query($sql, $commentId, $commentId);
}