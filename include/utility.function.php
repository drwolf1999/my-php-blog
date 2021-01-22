<?php
function dateToString($date) {
    return date("Y/m/d", strtotime($date));
}