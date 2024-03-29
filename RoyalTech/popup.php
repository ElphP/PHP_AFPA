<?php  
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup de suppression</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="titre">
                <img src="./img/logo_societe.png" alt="logo">
                <h2>Supprimer un article?</h2>
                <img src="./img/cross.jpg" alt="bouton_fermeture" id="btn_ferm" width="15px" height="15px">
            </div>
            <hr>
            <p> Souhaitez-vous vraiment supprimer l'article avec l'ID: <span class="gras">
            <?= $_SESSION["id_article"] ?></span></p>
            <hr>
            <div class="form">
            
                <button id="btn_valid" width="50px" onclick="supp('<?php echo $_SESSION['id_article']?>')">OK</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("btn_ferm").addEventListener("click", ()=>  {
            window.close("popup.php");
        })
       
         function supp(id)  {
            window.location="./suppArticle.php?id="+id; 
            alert("Enregistrement supprimé!");
               
            window.close(); 
    }
    </script>
</body>
</html>