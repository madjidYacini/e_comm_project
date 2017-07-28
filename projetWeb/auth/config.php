<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "/projetWeb/login.php",
    "logout" => "/projetWeb/logout.php",
    "adduser" => "/projetWeb/adduser.php",
    "root"   => "/projetWeb/" ,
    "acc"=> "/projetWeb/acVN.php",
    "vendeur"=>"/projetWeb/espacevendeur.php",
    "modif"=>"/projetWeb/modif.php",
    "ajoutsucc"=>"/projetWeb/ajoutsucc.php",
    "acheteur"=>"/projetWeb/espaceacht.php",

];

const SKEY = '_Redirect';