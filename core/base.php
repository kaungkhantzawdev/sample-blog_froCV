<?php

function conn(){
    return mysqli_connect("localhost", "root", "", "Blog");
}

$info = array(
    "name" => "Sample Blog",
    "short" => "SB",
    "description" => "Sample blog with pure PHP"
);

$role = ["Admin", "Editor", "User"];

$url = "http://$_SERVER[HTTP_HOST]/phpLearning/Sample_Blog";