<?php
/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 21/01/2017
 * Time: 18:00
 */

include_once("Model/Managers/Query.php");
include_once("Model/Managers/ImageManager.php");
/*
 */
$image = ImageManager::getImageById(3);
$array = ImageManager::getAll();
    foreach ($array as $t) {
    var_dump($t);
}

