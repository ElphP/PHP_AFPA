<?php
if (isset($_POST["jour"])) {
    $d = $_POST["jour"];
    verifier($d);
}


?>

<br>
<p>TP Date</p>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="jour" id="jour">
    <button type="submit">Envoyer</button>

</form>


<?php 
function verifier($var)  {
    $pattern= "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
    if(preg_match($pattern, $var))  {
        
        $tab_verif= explode("/",$var);
        
        algo_verif_date((int)$tab_verif[0],(string)$tab_verif[1],(int)$tab_verif[2]);
    }
    else echo "Vous devez respecter le format \"jj/mm/yyyy\"";
} 


function algo_verif_date($jour,$mois,$annee)  {
    $bool=0;
    $bissBool=0;
    if(($mois=="01" || $mois=="03"|| $mois=="05"|| $mois=="07"|| $mois=="08"|| $mois=="10"|| $mois=="12") && $jour>00 && $jour<=31)  {
        $bool=1;
    } 
    elseif(($mois=="04" || $mois=="06"|| $mois=="09"|| $mois=="11")&& $jour>0 && $jour<=30) {
        $bool=1;
    }
    elseif($annee%400==0 || !($annee==0)&& $annee%4==0 )  {
        $bissBool=1;
    }
    else  {
        $bissBool=0;
    }

    // février
    if($mois=="2" && $bissBool==0 && $jour>0 && $jour<=28) {
        $bool=1;
    }
    if($mois=="2" && $bissBool==1 && $jour>0 && $jour<=29)  {
        $bool=1;
    }

    if(!$bool==1)  {
        echo "Cette date {$_POST["jour"]} n'est pas valide!!!";
    }
}
?>
