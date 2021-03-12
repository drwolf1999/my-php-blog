<?php
function dateToString($date) {
    return date("Y/m/d", strtotime($date));
}

function dateTimeToString($date) {
    return date("Y/m/d H:i:s", strtotime($date));
}

function getPagination($page, $totalItems, $onePage) {
    $ret = array();
    $diff = 2;
    $totalPage = intval(($totalItems + $onePage - 1) / $onePage);

    $firstChunk = array(1, 2, 3);
    $lastChunk = array($totalPage - 2, $totalPage - 1, $totalPage);

    if ($page <= $totalPage) {
        $loopS = $page - $diff;


        $loopE = $loopS + ($diff * 2);
        if ($loopE > $totalPage) {
            $loopE = $totalPage;
            $loopS = $loopE - ($diff * 2);
        }

        if ($loopS < 1) $loopS = 1;

        if (!in_array($loopS, $firstChunk)) {
            foreach ($firstChunk as $i) {
                array_push($ret, $i);
            }

            array_push($ret, '.');
        }

        for ($i = $loopS; $i <= $loopE; $i++) {
            array_push($ret, $i);
        }

        if (!in_array($loopE, $lastChunk)) {
            array_push($ret, '.');

            foreach ($lastChunk as $i) {
                array_push($ret, $i);
            }
        }
    }
    return $ret;
}