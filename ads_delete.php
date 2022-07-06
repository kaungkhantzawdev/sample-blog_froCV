<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$id = $_GET['id'];
$deleteFile = adsOne($id)['photo'];

unlink("store/$deleteFile");

if(adsDelete($id)){
    linkTo("ads_add.php");
}
