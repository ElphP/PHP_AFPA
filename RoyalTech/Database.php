<?php
class Database
{


    private static $dbName = 'royal_tech';
    private static $dbHost = 'localhost:3306';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $connexion = null;

    public function __construct()
    {
        die("La fonction d'initialisation n'est pas permise !!!");
    }



    public static function connect()
    {
        if (null == self::$connexion) {
            try {
                self::$connexion = 
                new PDO("mysql:host=" . self::$dbHost . ";"
                 . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connexion;
    }

    public static function disconnect()
    {
        self::$connexion = null;
    }


    public static function Sanitize($data)
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function verifUtilisateur($log, $mdp)
    {
        $sql = "SELECT * FROM utilisateur WHERE login=:log";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->bindValue(":log", $log, PDO::PARAM_STR);
        $reponse->execute();
        $arrayReponse = $reponse->fetch(PDO::FETCH_ASSOC);

        if ($arrayReponse != NULL) {
            if ($arrayReponse["mdp"] == $mdp) {
                return $arrayReponse["id_role"];
            } else return NULL;
        } else return NULL;
    }

    public static function listeArticleByQte()
    {
        $sql = "CALL `get_qteTotaleVendueByArticle`()";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $arrayReponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $arrayReponse;
    }

    public static function gainParCat($cat)
    {
        $sql = " CALL `get_gainParCat`(:categorie)";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->bindValue(":categorie",  $cat, PDO::PARAM_STR);
        $reponse->execute();

        $valeur = $reponse->fetch(PDO::FETCH_ASSOC)["SUM(prix*quantite)"];
        return $valeur;
    }

    public static function ArtNC()
    {
        $sql = " CALL `get_ArtNC`";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $valeur;
    }
    public static function ListeComm()
    {
        $sql = " CALL `listeComm`";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $valeur;
    }

    public static function entetePDF($id)
    {
        $sql = " CALL `get_entetePDF`($id)";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetch(PDO::FETCH_ASSOC);
        return $valeur;
    }

    public static function listArtByComm($id)
    {
        $sql = " CALL `tableauFact`($id)";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetchAll(PDO::FETCH_NUM);
        return $valeur;
    }
    
    public static function totalFacture($id)
    {
        $sql = " CALL `get_totalFacture`($id)";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetch(PDO::FETCH_NUM);
        return $valeur;
    }
    
    public static function Articles()
    {
        $sql = "SELECT * FROM article";
        $pdo = self::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->execute();
        $valeur = $reponse->fetchAll(PDO::FETCH_NUM);
        return $valeur;
    }
}