<?php
ob_start();
require('./pdf/fpdf.php');

if(isset($_POST["btn-print"])){
    class myPDF extends FPDF{
        function header(){
            $this->Image('./assets/img/icons/brand.PNG',10,6);
            $this->SetFont('Arial','B',20);
            $this->Cell(350,5,'E M P L O Y E E   A T T E N D A N C E',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',15);
            $this->Cell(350,10,'BRIGHT N SHINE CAR WASH & DETALING',0,0,'C');
            $this->Ln(20);
        }
    
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
    
        }
    
        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(35,10,'Date',1,0,'C');
            $this->Cell(25,10,'ID',1,0,'C');
            $this->Cell(60,10,'Name',1,0,'C');
            $this->Cell(50,10,'Location In',1,0,'C');
            $this->Cell(30,10,'Clock In',1,0,'C');
            $this->Cell(50,10,'Location Out',1,0,'C');
            $this->Cell(30,10,'Clock out',1,0,'C');
            $this->Ln();
    
        }

        function viewTable(){
            require('config.php');
            $this->setFont('Times','',12);
            $sql='SELECT * FROM print';
            $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_array($result)){
                $this->Cell(35,10,$row['adate'],1,0,'C');
                $this->Cell(25,10,$row['empID'],1,0,'L');
                $this->Cell(60,10,$row['name'],1,0,'L');
                $this->Cell(50,10,$row['location'],1,0,'L');
                $this->Cell(30,10,$row['clockin'],1,0,'L');
                $this->Cell(50,10,$row['locationout'],1,0,'L');
                $this->Cell(30,10,$row['clockout'],1,0,'L');
                $this->Ln();



            }



        }
    
    
    
    }
    
    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
    
    




}

ob_end_flush();





?>