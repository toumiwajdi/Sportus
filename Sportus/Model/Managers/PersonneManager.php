<?php

/**
 * Created by PhpStorm.
 * User: Wassim
 * Date: 22/01/2017
 * Time: 13:56
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/Sportus/config.php";
include_once path . "/Model/Classes/Personne.php";
include_once path . "/Model/Managers/Query.php";


class PersonneManager
{
    public static function createTable()
    {
        $query = "CREATE TABLE `sportus`.`Personne` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(50) NOT NULL , `prenom` VARCHAR(50) NOT NULL , `naissance` DATE NOT NULL , `sexe` VARCHAR(10) NOT NULL , `telephone` VARCHAR(20) NOT NULL , `nationalite` VARCHAR(30) NOT NULL , `dateAjout` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        return Query::run($query);
    }

    public static function setter($line)
    {
        $personne = new Personne();
        $personne->setId($line->id);
        $personne->setNom($line->nom);
        $personne->setPrenom($line->prenom);
        $personne->setNaissance($line->naissance);
        $personne->setSexe($line->sexe);
        $personne->setTelephone($line->telephone);
        $personne->setNationalite($line->nationalite);
        $personne->setDateAjout($line->dateAjout);
        return $personne;
    }

    public static function addPersonne($personne)
    {
        $query = "insert into personne values(NULL,'" . $personne->getNom() . "','" . $personne->getPrenom() . "','" . $personne->getNaissance() . "','" . $personne->getSexe() . "','" . $personne->getTelephone() . "','" . $personne->getNationalite() . "',CURRENT_TIMESTAMP())";
        return Query::run($query);
    }

    public static function getPersonneById($id)
    {
        $query = "select * from Personne where id=" . $id;
        return self::setter(mysqli_fetch_object(Query::run($query)));
    }

    public static function updatePersonne($personne)
    {
        $query = "update personne set nom='" . $personne->getNom() . "',prenom='" . $personne->getPrenom() . "',naissance='" . $personne->getNaissance() . "',sexe='" . $personne->getSexe() . "',telephone='" . $personne->getTelephone() . "',nationalite='" . $personne->getNationalite() . "' where id=" . $personne->getId();
        return Query::run($query);
    }

    public static function deletePersonneById($id)
    {
        $query = "delete from Personne where id=" . $id;
        return Query::run($query);
    }

    public static function getAll()
    {
        $array = array();
        $query = "select * from Personne ";
        $res = Query::run($query);
        while ($line = mysqli_fetch_object($res)) {
            array_push($array, self::setter($line));
        }
        return $array;
    }


}