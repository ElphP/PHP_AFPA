<?php

require("./fpdf/fpdf.php");
require("./Database.php");

class PDF extends FPDF
{


    // En-tête
    function Header()
    {

        // Logo
        $this->Image('./img/logo_societe.png', 10, 6, 60);
        // Police Arial gras 15



        // Décalage à droite
        $this->Cell(120);
        $this->SetFont('Arial', 'B', 10);

        setlocale(LC_TIME, "");
        date_default_timezone_set('Europe/Paris');
        $date_du_jour = utf8_encode(strftime('%A %d %B %Y'));
        $this->Cell(0, 10, ucfirst($date_du_jour), 0, 0, 'L');
        $this->LN(20);


        $this->Cell(120);
        // Titre
        $this->Cell(80, 5, Database::entetePDF($_GET["id_comm"])["Civ"], 0, 2, 'L');
        // $this->Cell(120);
        $this->Cell(80, 5, Database::entetePDF($_GET["id_comm"])["adresse"], 0, 2, 'L');
        // $this->Cell(120);
        $this->Cell(80, 5, Database::entetePDF($_GET["id_comm"])["CPV"], 0, 2, 'L');
        // $this->Cell(120);
        $this->Cell(80, 5, Database::entetePDF($_GET["id_comm"])["mail"], 0, 2, 'L');
        // Saut de ligne
        $this->Ln(20);
    }



    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function Titre()
    {

        $this->SetTextColor(255, 255, 255);
        $this->SetFillColor(81, 85, 88);
        $this->Cell(10);
        $this->Cell(40, 10, 'FACTURE', 1, 1, "C", 1);

        $this->Ln(3);
        $this->Cell(10);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-2', 'Numéro de la commande: ') . $_GET['id_comm'], 0, 1, "C", 0);
    }




    function Table($header, $data)
    {
        // constante qui permet l'affichage du signe € 
        define('EURO', chr(128));
        // décalage en X
        $this->Cell(10);
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(222, 222, 222);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-tête
        $w = array(40, 35, 45, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données

        foreach ($data as $row) {
            $prix_unit = number_format($row[1], 2, ',', ' ') . " " . EURO;
            $prix_tot = number_format($row[3], 2, ',', ' ') . " " . EURO;
            $this->Cell(10);
            $this->Cell($w[0], 6, $row[0], 'LRTB', 0, 'C');
            $this->Cell($w[1], 6, $prix_unit, 'LRTB', 0, 'C');
            $this->Cell($w[2], 6, number_format($row[2], 0), 'LRTB', 0, 'C');
            $this->Cell($w[3], 6, $prix_tot, 'LRTB', 0, 'C');
            $this->Ln();
        }
    }

    function TableTotal($dataTotal)
    {
        // décalage en X
        $this->Cell(10);
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(222, 222, 222);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');

        // Restauration des couleurs et de la police
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        //  Données
        $this->Cell(120);
        $this->SetFillColor(222, 222, 222);
        $this->SetTextColor(0);
        $this->SetFont('', 'B');
        $this->Cell(40, 6, "Total", 'LRTB', 0, 'C', true);
        $this->LN(6);
        $this->SetFont('');

        $this->Cell(90);
        $this->Cell(40, 6, "prix HT", 'LRTB', 0, 'C');
        $prix_totHT = number_format($dataTotal[0], 2, ',', ' ') . " " . EURO;
        $this->Cell(40, 6, $prix_totHT, 'LRTB', 0, 'C');
        $this->LN(6);

        $this->Cell(90);
        $this->SetFillColor(222, 222, 222);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->Cell(40, 6, "prix TTC", 'LRTB', 0, 'C', true);
        $this->SetFont('', 'B');

        $prix_totTTC = number_format($dataTotal[0] * 1.2, 2, ',', ' ') . " " . EURO;
        $this->Cell(40, 6, $prix_totTTC, 'LRTB', 0, 'C', true);
    }
}

// Instanciation de la classe dérivée
$pdf = new PDF();

$header = array(iconv('UTF-8', 'ISO-8859-2', 'Désignation Article'), 'Prix Unitaire', iconv('UTF-8', 'ISO-8859-2', 'Quantité'), 'Prix Total HT');
$data = DataBase::listArtByComm($_GET["id_comm"]);
$dataTotal = Database::totalFacture($_GET["id_comm"]);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->LN(20);
$pdf->Titre();
$pdf->LN(20);
$pdf->Table($header, $data);
$pdf->LN(20);
$pdf->TableTotal($dataTotal);

$pdf->Output();
