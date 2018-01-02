<?php
include_once("connect.php");
$sql = "select id FROM tbl_access LIMIT 10";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
require('fpdf.php');
 require('helveticab.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
while ($field_info = mysqli_fetch_field($resultset)) {
    $pdf->Cell(47,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
    $pdf->SetFont('Arial','',12);   
    $pdf->Ln();
    foreach($rows as $column) {
        $pdf->Cell(47,12,$column,1);
    }
}
$pdf->Output();
?>