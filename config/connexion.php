<?php

try{
    $access = new pdo ("mysql:host=mysql-gaga.alwaysdata.net;dbname=gaga_mstic;charset=utf8", "gaga", "lovelinam");

    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e){
    $e->getMessage();
}

?>