<?php
    //Documentazione: http://fpdf.org/it/doc/index.php



    Require("fpdf/fpdf.php");

    //creo un nuovo oggetto PDF
    $mypdf = new FPDF();

    //aggiungo una pagina 
    $mypdf->AddPage();
    
    //imposto un carattere Arial a 14pt
    $mypdf->SetFont('Arial','B',14);
    
    //creo una cella    Parametri: Larghezza, altezza, stringa da stampare, bordo, nuova linea 
    $mypdf->Cell(80,15,'Cella 1', 1, 0);
    $mypdf->Cell(80,15,'Cella 2', 1, 1);
    $mypdf->Cell(160,30,'Cella 3', 1, 0);

    //chiudo il pdf e genero il documento
    $mypdf->Output();
?>