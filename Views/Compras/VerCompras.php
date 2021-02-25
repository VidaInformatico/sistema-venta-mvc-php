<?php
require_once "Assets/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', array(105, 148));
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14);
$pdf->setTitle("Reporte de Compra");
$pdf->image(base_url().'Assets/img/logo.jpg', 70, 5, 30, 30, 'JPG');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(50, 5, utf8_decode($alert['nombre']), 0, 1, 'L');
$pdf->Cell(20, 5, utf8_decode("Ruc"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($alert['ruc']), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($alert['telefono']), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode($alert['direccion']), 0, 1, 'L');
$pdf->Ln();
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(80, 8, utf8_decode("Detalle de los Productos"), 0, 1, 'C');
$pdf->setFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(45, 5, utf8_decode('Descripción'), 1, 0, 'L', 1);
$pdf->Cell(10, 5, 'Cant.', 1, 0, 'L', 1);
$pdf->Cell(15, 5, 'Precio', 1, 0, 'L', 1);
$pdf->Cell(20, 5, 'Sub Total', 1, 1, 'L', 1);

foreach ($data as $compras) {
    $subtotal = $compras['cantidad'] * $compras['precio'];
    $total = $total + $subtotal;
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(45, 5, utf8_decode($compras['producto']), 1, 0, 'L');
    $pdf->Cell(10, 5, $compras['cantidad'], 1, 0, 'L');
    $pdf->Cell(15, 5, $compras['precio'], 1, 0, 'L');
    $pdf->Cell(20, 5, number_format($subtotal, 2, '.', ','), 1, 1, 'L');
}
$pdf->Ln();
$pdf->Cell(90, 5, 'Total S/.'. number_format( $total, 2, '.', ','), 0, 1, 'R');

$pdf->Output();
?>