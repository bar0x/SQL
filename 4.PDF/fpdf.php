<?php
    //Documentazione: http://fpdf.org/it/doc/index.php



    Require("fpdf/fpdf.php");

    //creo un nuovo oggetto PDF
    $mypdf = new FPDF();

    //aggiungo una pagina 
    $mypdf->AddPage();
    
    //imposto un carattere Arial a 14pt
    $mypdf->SetFont('Arial','IB',16);
    $mypdf->SetFillColor(40,150,200);
    $mypdf->Cell(190,15,'Dump DataBase caso studio',1,1,'C',1);
    

    $db = new mysqli("localhost","root","root","scuola_2324");
    $sql ="SELECT * FROM citta ORDER BY nomeCitta ASC";
    $mypdf->SetFont('Arial','B',14);
    $mypdf->cell(50,10,'Citta',0,1,'C');
    $mypdf->cell(10,10,'ID',1,0,'C');
    $mypdf->cell(40,10,'Nome',1,1,'C');
    
    $rs = $db->query($sql);
    while($record = $rs->fetch_assoc()){
        $mypdf->setFont('Arial','B',12);
        $mypdf->Cell(10,10,$record['id'],1,0,'C');
        $mypdf->setFont('Arial','',12);
        $mypdf->Cell(40,10,$record['nomeCitta'],1,1);
    }
    //seconda tabella: dipendente
    $mypdf->SetXY(80,25);
    $mypdf->SetFont('Arial','B',16);
    $mypdf->cell(50,10,'Dipendente',0,1,'C');

    $mypdf->SetFont('Arial','B',14);
    $mypdf->SetXY(80,35);
    $mypdf->cell(50,10,'Citta',1,1,'C');
    $mypdf->cell(10,10,'ID',1,0,'C');
    $mypdf->cell(40,10,'Nome',1,1,'C');
    
    //chiudo il pdf e genero il documento
    $mypdf->Output();
?>