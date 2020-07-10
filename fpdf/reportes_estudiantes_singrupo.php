<?php
	include("plantilla.php");
	require '../database/conn.php';
	$num=0;
	$query = "SELECT Nombres_estudiante, Apellidos_estudiante, Usuario_estudiante, Correo, Grupo_proyecto FROM estudiante WHERE Grupo_proyecto='0'";
	$resultado = $con->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Image('../img/logo.png', 15, 10, 30 );
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(178,30, 'Universidad Don Bosco',0,0,'C');
	$pdf->Cell(-182);
	$pdf->SetTextColor(60,164,218);
	$pdf->SetLineWidth(1);
	$pdf->SetDrawColor(60,164,218);
	$pdf->Line(7.8,65,202.5,65);
	$pdf->Cell(150,100, 'Alumnos sin grupo',0,0,'L');
	$pdf->Ln(60);
	$pdf->SetX(25);
	$pdf->SetFillColor(60,164,218);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(5,10,'#',0,0,'C',1);
	$pdf->Cell(40,10,'NOMBRE',0,0,'C',1);
	$pdf->Cell(40,10,'APELLIDO',0,0,'C',1);
	$pdf->Cell(30,10,'USUARIO',0,0,'C',1);
	$pdf->Cell(40,10,'CORREO',0,1,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(240,240,240);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->SetX(25);
		$pdf->Cell(5,10,(++$num),0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['Nombres_estudiante']),0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['Apellidos_estudiante']),0,0,'C',1);
		$pdf->Cell(30,10,utf8_decode($row['Usuario_estudiante']),0,0,'C',1);
		$pdf->Cell(40,10,utf8_decode($row['Correo']),0,1,'C',1);
	}
	$pdf->Output('Reporte_Estudiantes_SinGrupo'.'.pdf','I');
?>