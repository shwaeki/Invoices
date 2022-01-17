<?php
/**
  * This file is part of consoletvs/invoices.
  *
  * (c) Erik Campobadal <soc@erik.cat>
  *
  * For the full copyright and license information, please view the LICENSE
  * file that was distributed with this source code.
  */

namespace ConsoleTVs\Invoices\Classes;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

/**
 * This is the PDF class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class PDF
{
    /**
     * Generate the PDF.
     *
     * @method generate
     *
     * @param ConsoleTVs\Invoices\Classes\Invoice $invoice
     * @param string                              $template
     *
     * @return Dompdf\Dompdf
     */
    public static function generate(Invoice $invoice, $template = 'default')
    {
        $template = strtolower($template);


        $GLOBALS['with_pagination'] = $invoice->with_pagination;
		$pdf = PDF::loadView(View::make('invoices::'.$template, ['invoice' => $invoice]));
        $pdf->render();

        return $pdf;
    }
}
