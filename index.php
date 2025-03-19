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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar PDF</title>
</head>
<body>
    <h1>Formulario para generar PDF</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>

        <button type="submit">Generar PDF</button>
    </form>
</body>
</html>