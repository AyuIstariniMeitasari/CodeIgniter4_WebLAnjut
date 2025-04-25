<?php 

namespace App\Controllers;

use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function generate()
    {
        $dompdf = new Dompdf();

        $data['title'] = 'Laporan PDF';
        $data['content'] = 'Ini adalah isi laporan PDF yang digenerate dari CodeIgniter 4.';

        $html = view('pdf_template', $data);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan.pdf", ["Attachment" => false]); // tampilkan di browser
    }
}
