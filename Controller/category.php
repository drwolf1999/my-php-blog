<?php
require_once ("include/db_info.php");

function getCategory() {
    $ret = array();
    $sql = "SELECT `id`, `name` FROM `category`";
    $result = pdo_query($sql);

    array_push($ret, array(
        'id' => null,
        'name' => '전체'
    ));

    foreach ($result as $r) {
        array_push($ret, array(
            'id' => $r['id'],
            'name' => $r['name']
        ));
    }

    return $ret;
}