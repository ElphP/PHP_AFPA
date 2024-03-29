<?php
require_once("./Database.php");
class Article
{
    private $id_article;
    private $designation;
    private $prix;
    private $categorie;

    public function __construct($id, $text, $price, $cat)
    {
        $this->id_article = $id;
        $this->designation = $text;
        $this->prix = $price;
        $this->categorie = $cat;
    }

    public function ajouterArticle()
    {
        $sql1 = "SELECT id_article FROM article ";
        $pdo = Database::connect();
        $reponse = $pdo->prepare($sql1);
        $reponse->execute();
        $result = $reponse->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            $tabExist[] = in_array($this->id_article, $value);
        };
        if (!in_array(true, $tabExist)) {
            $sql2 = "INSERT INTO article VALUE (:id,:design,:price,:cat)";
            $pdo = Database::connect();
            $reponse = $pdo->prepare($sql2);
            $reponse->bindValue(":id",  $this->id_article, PDO::PARAM_STR);
            $reponse->bindValue(":design",  $this->designation, PDO::PARAM_STR);
            $reponse->bindValue(":price",  $this->prix, PDO::PARAM_STR);
            $reponse->bindValue(":cat",  $this->categorie, PDO::PARAM_STR);
            $reponse->execute();
        } else
            return "Ajout impossible: Cet article existe déjà dans la base de données!";
    }



    public static function modifierArticle($id, $designation, $prix, $cat)
    {
        $sql = 'UPDATE article SET designation=:design, prix=:price, categorie=:cat WHERE id_article=:id';
        $pdo = Database::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->bindValue(":design",  $designation, PDO::PARAM_STR);
        $reponse->bindValue(":price",  $prix, PDO::PARAM_STR);
        $reponse->bindValue(":cat",  $cat, PDO::PARAM_STR);
        $reponse->bindValue(":id",  $id, PDO::PARAM_STR);
        $reponse->execute();
        return "L'article a bien été modifié!";
    }

    public static function supprimerArticle($id)
    {
        $sql = 'DELETE FROM article WHERE id_article=:id';
        $pdo = Database::connect();
        $reponse = $pdo->prepare($sql);
        $reponse->bindValue(":id",  $id, PDO::PARAM_STR);
        $reponse->execute();
        return "L'article a bien été supprimé!";
    }
}