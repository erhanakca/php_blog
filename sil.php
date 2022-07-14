<?php

require 'database.php';

$id = (int)$_GET['id'];

$sayac = $db->exec("DELETE FROM yazilar WHERE id=" . $id);

if ($sayac == 0){

    die("hiç bir şey silinmedi gardaş");
}

header('Location: index.php');

die();