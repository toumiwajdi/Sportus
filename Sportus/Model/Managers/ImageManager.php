<?php

/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 21/01/2017
 * Time: 18:52
 */
include_once("Model/Managers/Query.php");
include_once("Model/Classes/Image.php");

class ImageManager
{
    public static function createTable()
    {
        $query = "CREATE TABLE `sportus`.`Image` ( `id` INT NOT NULL AUTO_INCREMENT , `url` VARCHAR(150) NOT NULL , `extension` VARCHAR(15) NOT NULL , `taille` DOUBLE NOT NULL , `dateAjout` DATETIME NOT NULL , `nom` VARCHAR(100) NOT NULL , `description` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";
        Query::run($query);
    }

    public static function setter($line)
    {
        $image = new Image();
        if ($line != null) {
            $image->setExtension($line->extension);
            $image->setTaille($line->taille);
            $image->setDescription($line->description);
            $image->setUrl($line->url);
            $image->setId($line->id);
            $image->setNom($line->nom);
            $image->setDateAjout($line->dateAjout);
            return $image;
        }
        return null;
    }


    public static function getImageById($id)
    {
        $query = "select * from image where id=" . $id;
        $result = Query::run($query);
        return self::setter(mysqli_fetch_object($result));
    }

    public static function getAll()
    {
        $lines = array();
        $query = "select * from image";
        $result = Query::run($query);
        while ($line = mysqli_fetch_object($result)) {
            array_push($lines, self::setter($line));
        }
        return ($lines);
    }

    public static function addImage($image)
    {
        $query = "insert into Image values(NULL,'" . $image->getUrl() . "','" . $image->getExtension() . "'," . $image->getTaille() . ",CURRENT_TIMESTAMP(),'" . $image->getNom() . "','" . $image->getDescription() . "')";
        return Query::run($query);
    }

    public static function updateImage($image)
    {
        $query = "update Image set url='" . $image->getUrl() . "',extension='" . $image->getExtension() . "',taille=" . $image->getTaille() . ", dateAjout = CURRENT_TIMESTAMP()" . ",nom = '" . $image->getNom() . "',description = '" . $image->getDescription() . "' where id = " . $image->getId();
        return Query::run($query);
    }

    public static function deleteImage($id)
    {
        $query = "delete from image where id=" . $id;
        return Query::run($query);
    }


}