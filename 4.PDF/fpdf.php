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
    $mypdf->SetXY(80,30);
    $mypdf->cell(50,10,'Citta',0,1,'C');
    $mypdf->SetXY(80,40);
    $mypdf->cell(10,10,'ID',1,0,'C');
    $mypdf->cell(40,10,'Nome',1,1,'C');
    
    $rs = $db->query($sql);
    $cnt = 50;
    while($record = $rs->fetch_assoc()){
        $mypdf->SetXY(80,$cnt);
        $cnt = $cnt +10;
        $mypdf->setFont('Arial','B',12);
        $mypdf->Cell(10,10,$record['id'],1,0,'C');
        $mypdf->setFont('Arial','',12);
        $mypdf->Cell(40,10,$record['nomeCitta'],1,1);
    }
    //seconda tabella: dipendente
    $mypdf->SetXY(80,100);
    $mypdf->SetFont('Arial','B',16);
    $mypdf->cell(50,20,'Dipendente',0,1,'C');

    $db = new mysqli("localhost","root","root","scuola_2324");
    $sql ="SELECT * FROM dipendente ORDER BY Cognome ASC";
    $rs = $db->query($sql);

    $mypdf->SetFont('Arial','B',14);
    $mypdf->SetXY(10,120);
    $mypdf->cell(10,10,'ID',1,0,'r');
    $mypdf->cell(40,10,'Nome',1,0,'r');
    $mypdf->cell(50,10,'Cognome',1,0,'r');
    $mypdf->cell(40,10,'idReparto',1,0,'r');
    $mypdf->cell(50,10,'idCittaResidenza',1,1,'r');

    while($record = $rs->fetch_assoc()){
        $mypdf->setFont('Arial','B',12);
        $mypdf->Cell(10,10,$record['id'],1,0,'C');
        $mypdf->setFont('Arial','',12);
        $mypdf->cell(40,10,$record['Nome'],1,0,'r');
        $mypdf->cell(50,10,$record['Cognome'],1,0,'r');
        $mypdf->cell(40,10,$record['idReparto'],1,0,'r');
        $mypdf->cell(50,10,$record['idCittaResidenza'],1,1,'r');

        
    }

    $db = new mysqli("localhost","root","root","scuola_2324");
    $sql ="SELECT * FROM dipendente ORDER BY Cognome ASC";
    $rs = $db->query($sql);

    
    //chiudo il pdf e genero il documento
    $mypdf->Output();
?>