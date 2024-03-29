<?php 
// intervertit les valeurs en 1 seule ligne avec une "destructuration" à l'aide de "list()"
list($a,$b)= array($b=8,$a=5);

echo "<pre>";
    var_dump("a=".$a,"b=".$b);
echo "</pre>";
// ou avec la destructuration de tableaux...
[$a,$b]= array($b=8,$a=5);

echo "<pre>";
    var_dump("a=".$a,"b=".$b);
echo "</pre>";
?>
<!-- question 2&3 -->
<?php  
$pays= ["Australie", "France", "Zimbabwe"];
echo "<pre>";
    var_dump($pays);
echo "</pre>";
?>

<!-- question 4 -->
<?php  
    for ($i=0; $i <count($pays) ; $i++) { 
        echo $pays[$i]."<br>";
    }
?>
<br>
<!-- Question 5 -->
<?php  
echo "Question5 foreach <br>";
foreach ($pays as $value) {
   echo $value."<br>";
}
?>

<!-- Question 6 -->
<!-- certainement car nous connaissons le nombre d'itérations à réaliser!! même si il y a certainement des solutions...  -->
<br>


<!-- Question 7 & 8 -->
<?php 
//  $pays[]=["capAustralie"=>"Camberra","capFrance"=>"Paris","capZimbabwe"=>"Harare"];
// echo count($pays);
?>
<br>
 <!-- Question 9  -->
<?php  
for ($i=0; $i <3 ; $i++) { 
    switch ($i) {
        case 0:
            # code...
            break;
        
        case 1:
            # code...
            break;
        
        case 2:
            # code...
            break;
        
        default:
            echo "error";
            break;
    }
}
?>
<br>
<!-- Question 10 -->
<?php  
function enumer($t)  {
    foreach($t as $entree)  {
        if (is_array($entree) )  {
            echo "<br>Capitales:<br>";
            foreach($entree as $value) {
                echo  $value."<br>";
            }
        }
        
       else echo $entree."<br>";
    }
} 

enumer($pays);
?>
<br>


<!-- Question 7 & 8 -->
<?php 
$pays["Camberra"]= "Australie";
$pays["Paris"]= "France";
$pays["Harare"]= "Zimbabwe";

echo "<pre>";
    var_dump($pays);
echo "</pre>";

echo "<br>".count($pays);

?>
<br>
<!--  Question 9  -->
<?php
for ($i=0; $i <3 ; $i++) { 
    switch ($i) {
        case 0:
            echo "La capitale de ".$value. " est ".array_keys($pays,"Australie")[1]."<br>";
            break;
        case 1:
            echo "La capitale de ".$value. " est ".array_keys($pays,"France")[1]."<br>";
            break;
        case 2:
            echo "La capitale de ".$value. " est ".array_keys($pays,"Zimbabwe")[1]."<br>";
            break;
       
        default:
           echo "erreur";
            break;
    }  
} ?>

<!-- ou meilleure version -->
<?php  
    foreach($pays as $key=>$value)  {
        if(is_string($key))  echo "La capitale de $value est $key <br>";
    }
?>


<!-- Question 10 -->
<?php  
function enumerer($t)  {
    foreach($t as $key=>$value)  {
               
          echo "Le pays $value a pour clé $key <br>" ;
    }
} 

enumerer($pays);
?>
<br>


<!-- Question 11 -->

<?php  

function ajouter ($t, $capitale, $nom_du_pays)  {  
    $t[$capitale]=$nom_du_pays;
    return $t;
}

$pays= ajouter($pays, "Moscow", "Russie");

echo "<pre>";
    var_dump($pays);
echo "</pre>";
    ?>

    <!-- Ma conclusion est qu'il faut bien connître les portées des variables et que quand celle-ci est un tableau il faut faire attention que dans une fonction c'est simplement la référence qui est transmise ... -->