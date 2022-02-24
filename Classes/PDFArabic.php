<?php

namespace ConsoleTVs\Invoices\Classes;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as MPDF;


class PDFArabic
{

    public static function generate(Invoice $invoice, $template = 'default')
    {

		$pdf = MPDF::loadView('invoices::'.$template, ['invoice' => $invoice]);
        return $pdf;
    }
}
