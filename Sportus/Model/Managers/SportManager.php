<?php

/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 22/01/2017
 * Time: 11:47
 */
include_once $_SERVER["DOCUMENT_ROOT"] . "/Sportus/config.php";
include_once path . "/Model/Managers/Query.php";
include_once path . "/Model/Classes/Sport.php";

class SportManager
{
    public static function createTable()
    {
        $query = "CREATE TABLE `sportus`.`Sport` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(50) NOT NULL , `description` TEXT NOT NULL , `image` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE=InnoDB;";
        Query::run($query);
        $query = "alter table sport add CONSTRAINT fk_Sport_Image FOREIGN key (image) REFERENCES image(id) ON DELETE CASCADE ";
        Query::run($query);
    }


    public static function setter($line)
    {
        $sport = new Sport();
        $sport->setId($line->id);
        $sport->setNom($line->nom);
        $sport->setDescription($line->description);
        $sport->setImage($line->image);
        return $sport;
    }


    public static function getSportById($id)
    {
        $query = "select * from sport where id=" . $id;
        return self::setter(mysqli_fetch_object(Query::run($query)));
    }

    public static function getAll()
    {
        $query = "select * from sport";
        $resultat = Query::run($query);
        $arr = array();
        while ($line = mysqli_fetch_object($resultat)) {
            array_push($arr, self::setter($line));
        }
        return $arr;
    }


    public static function addSport($sport)
    {
        $query = "insert into sport(nom,description,image) values ('" . $sport->getNom() . "','" . $sport->getDescription() . "','" . $sport->getImage() . "')";
        return Query::run($query);
    }

    public static function updateSport($sport)
    {
        $query = "update sport set nom='" . $sport->getNom() . "',description='" . $sport->getDescription() . "',image=" . $sport->getImage() . " where id=" . $sport->getId();
        return Query::run($query);
    }

    public static function deleteSportById($id)
    {
        $query = "delete from sport where id=" . $id;
        return Query::run($query);
    }


}