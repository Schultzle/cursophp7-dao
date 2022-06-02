<?php
    require_once("config.php");

    $jose = new Usuario();

    $jose->loadById(3);

    echo $jose;
    