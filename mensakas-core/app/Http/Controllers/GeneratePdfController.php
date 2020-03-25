<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratePdfController extends Controller
{
    function downloadPdf(){
        $pdf = \PDF::loadView('pdfTemplate/businessInvoice');
        return $pdf->download('pdf.pdf');
    }
}