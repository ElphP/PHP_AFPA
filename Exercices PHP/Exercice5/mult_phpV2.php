
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplications Version2</title>
    <link rel="stylesheet" href="mult.css">
</head>

<body>



    <?php
 
   $tab= [1,2,3,4,5,6,7,8,9,10];
    for ($i = 0; $i < sizeof($tab); $i++) {
        $results="";
        for ($j = 0; $j < sizeof($tab); $j++) {
          $var= $tab[$i]*$tab[$j];
           
          if(($var)<10)  {
            echo "&nbsp" .$var. "&nbsp&nbsp&nbsp";
          }
          else  {
            echo "&nbsp" .$var."&nbsp";
          }
            
           
        }
        echo  nl2br("\n");
       
    }
    ?>
</body>