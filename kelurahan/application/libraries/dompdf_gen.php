<?php
require_once APPPATH . 'libraries/dompdf/autoload.inc.php'; // Sesuaikan path jika perlu

use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_gen {
    protected $dompdf;

    public function __construct() {
        $options = new Options();
        $options->set('defaultFont', 'Arial'); // Atur font default
        $this->dompdf = new Dompdf($options);
    }

	public function generate($html, $filename = 'Dokumen_PDF.pdf', $stream = true) {
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
	
		if ($stream) {
			// Menampilkan PDF sebagai preview (inline) di browser tanpa mendownload
			$this->dompdf->stream($filename, array("Attachment" => false)); 
		} else {
			return $this->dompdf->output(); // Outputkan sebagai string
		}
	}
	
    }

