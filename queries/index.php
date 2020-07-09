<?php
	include 'plantilla.php';
	require 'conexion.php';
	$query = "SELECT id, nombre, apellido, correo, materias FROM usuario";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Image('images/logo.png', 15, 10, 30 );
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(200,30, 'Universidad Don Bosco',0,0,'C');
	$pdf->Cell(-182);
	$pdf->SetTextColor(60,164,218);
	$pdf->SetLineWidth(1);
	$pdf->SetDrawColor(60,164,218);
	$pdf->Line(25.6,65,180.5,65);
	$pdf->Cell(150,100, 'Reporte De Alumnos',0,0,'L');
	$pdf->Ln(60);
	$pdf->SetX(25);
	$pdf->SetFillColor(60,164,218);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(11,10,'#',0,0,'C',1);
	$pdf->Cell(40,10,'NOMBRE',0,0,'C',1);
	$pdf->Cell(40,10,'APELLIDO',0,0,'C',1);
	$pdf->Cell(40,10,'CORREO',0,0,'C',1);
	$pdf->Cell(25,10,'MATERIAS',0,1,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(240,240,240);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->SetX(25);
		$pdf->Cell(11,10,$row['id'],0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['nombre']),0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['apellido']),0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['correo']),0,0,'C',1);
		$pdf->Cell(25,10,utf8_decode($row['materias']),0,1,'C',1);
	}
	$pdf->Output('Reporte_Alumnos'.'.pdf','I');
?>