<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD,$option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

function enregUser($userName,$pwd,$email,$fctn)  {
    
    $connexion = connect_db();
    $sql= "SELECT email_user, login_user FROM utilisateurs";
    foreach ($connexion->query($sql, PDO::FETCH_ASSOC) as $row) {
        if(($row["email_user"]==$email) && $row["login_user"]==$userName)  {
            return false;
        }
    }
    $hash=password_hash($pwd,PASSWORD_DEFAULT);
    // si il n'y a pas 2 mails identiques on enregistre!
    $sql= "INSERT INTO  utilisateurs VALUES (NULL, :email, :userName, :pwd, :fctn)";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":email", $email, PDO::PARAM_STR);
    $reponse->bindValue(":userName", $userName, PDO::PARAM_STR);
    $reponse->bindValue(":pwd", $hash, PDO::PARAM_STR);
    $reponse->bindValue(":fctn", $fctn, PDO::PARAM_STR);
    $reponse->execute();
    return true;
}

function verify($userName,$pwd,$email)  {
     
    $connexion = connect_db();
    $sql= "SELECT email_user, login_user, pwd_user FROM utilisateurs";
    foreach ($connexion->query($sql, PDO::FETCH_ASSOC) as $row) {
        if(($row["email_user"]==$email) && $row["login_user"]==$userName && password_verify($pwd,$row["pwd_user"]))  {
            return true;
        }
    }
    return false;
}

?>