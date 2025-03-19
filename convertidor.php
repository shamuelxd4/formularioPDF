<?php
require('fpdf/fpdf.php'); // Asegúrate de descargar FPDF desde http://www.fpdf.org/ y colocarlo en la carpeta "fpdf/"

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Crear el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Datos del formulario', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
    $pdf->MultiCell(0, 10, 'Mensaje: ' . $mensaje, 0, 1);

    // Descargar el PDF
    $pdf->Output('D', 'formulario.pdf');
    exit;
}
?>
