<?php
$title = "Liste des Stagiaires";
ob_start();
?>
<h1>Liste des Stagiaires</h1>
    <table class="montableau">
        <tr>
            <th> ID Membre </th>
            <th> Prénom Membre </th>
            <th> Nom Membre </th>
            <th> Suppression </th>
            <th> Modification </th>
        </tr>
        <?php
            foreach($stagiaires as $stagiaire){
                echo "<tr>";
                echo "<td class='colid'> $stagiaire[id_membre] </td>";
                echo "<td> $stagiaire[login_membre] </td>";
                echo "<td> $stagiaire[nom_membre] </td>";
                echo "<td class='colsuppr'><a href=index.php?action=suppr&id=$stagiaire[id_membre]>Supprimer</a></td>";
                echo "<td class='colmodif'><a href=templates/modifForm.php?action=null&id=$stagiaire[id_membre]&name=$stagiaire[nom_membre]&firstname=$stagiaire[login_membre] >Modifier</a></td>";
                echo "</tr>";
            }  
            ?>
        <tr><td colspan="5" class="ajout"><a href="templates/ajoutForm.php?">Ajouter un stagiaire</a></td></tr>  
    </table>

    
<?php
$content = ob_get_clean();
include "baselayout.php";
?>