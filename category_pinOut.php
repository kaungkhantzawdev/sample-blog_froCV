<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

if(categoryPinOut($_GET['id'])){
    return linkTo("category_add.php");
}