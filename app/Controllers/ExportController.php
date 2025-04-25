<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends BaseController
{
    public function pdf()
    {
        $dompdf = new Dompdf();
        $data['title'] = "Contoh Laporan PDF";
        $data['items'] = ['Tugas 1', 'Tugas 2', 'Tugas 3'];

        $html = view('export_pdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Unduh langsung
        $dompdf->stream("laporan.pdf", ["Attachment" => false]);
    }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Tugas');

        $tugas = ['Tugas 1', 'Tugas 2', 'Tugas 3'];
        $row = 2;
        foreach ($tugas as $i => $nama) {
            $sheet->setCellValue("A$row", $i + 1);
            $sheet->setCellValue("B$row", $nama);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        // Unduh langsung
        $filename = 'laporan_excel.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $writer->save("php://output");
        exit;
    }
}
