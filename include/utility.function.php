<?php
function dateToString($date) {
    return date("Y/m/d", strtotime($date));
}

function dateTimeToString($date) {
    return date("Y/m/d H:i:s", strtotime($date));
}