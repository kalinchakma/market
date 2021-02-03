<?php
define('ROOT',dirname(dirname(__FILE__)));

function getHeader() {
    require_once(ROOT.'/views/header footer/header.php');
}

function getFooter() {
    require_once(ROOT.'/views/header footer/footer.php');
}