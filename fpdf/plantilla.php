<?php
	require 'fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->SetFont('Arial','B',15);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			$this->Cell(0,5,date('d/m/Y'),0,1,'R');
		}		
	}
?>