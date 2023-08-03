<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class ReportController extends BaseController
{
    protected $modelItem;
    protected $modelTransactionDetail;
    protected $modelTransaction;
    protected $currentDateTime;
    public function __construct()
    {
        $this->modelItem = new Item();
        $this->modelTransactionDetail = new TransactionDetail();
        $this->modelTransaction = new Transaction();
        $this->currentDateTime = date('Y-m-d H:i:s');
    }
    public function index()
    {
        return view('/admin/report/index');
    }
    public function generateReport()
    {
        // Load TCPDF library
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', '', 12);

        // Create a table
        $header = array('Column 1', 'Column 2', 'Column 3');
        $data = array(
            array('Row 1 Cell 1', 'Row 1 Cell 2', 'Row 1 Cell 3'),
            array('Row 2 Cell 1', 'Row 2 Cell 2', 'Row 2 Cell 3'),
            array('Row 3 Cell 1', 'Row 3 Cell 2', 'Row 3 Cell 3')
        );

        // Set table header
        $pdf->Cell(40, 10, $header[0], 1);
        $pdf->Cell(40, 10, $header[1], 1);
        $pdf->Cell(40, 10, $header[2], 1);
        $pdf->Ln();

        // Set table data
        foreach ($data as $row) {
            $pdf->Cell(40, 10, $row[0], 1);
            $pdf->Cell(40, 10, $row[1], 1);
            $pdf->Cell(40, 10, $row[2], 1);
            $pdf->Ln();
        }

        // Output the PDF as a downloadable file
        $pdf->Output('report.pdf', 'D');
    }
    public function itemReport($item_id)
    {
        // Load TCPDF library
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set page orientation to landscape
        $pdf->SetPageOrientation('L');

        // Set font
        $pdf->SetFont('times', '', 12);

        // Get the page width and height
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        // Calculate the center coordinates
        $centerX = $pageWidth / 2;
        $centerY = $pageHeight / 2;

        // Set content to center-top
        $content = 'Laporan Barang.';
        $contentWidth = $pdf->GetStringWidth($content); // Get the width of the content
        $contentHeight = 5; // Set the height of the content (adjust as needed)

        $contentX = $centerX - ($contentWidth / 2);
        $contentY = 10; // Set the vertical position of the content (adjust as needed)

        // Add content to the PDF (centered)
        $pdf->SetXY($contentX, $contentY);
        $pdf->Cell($contentWidth, $contentHeight, $content, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        // Create a table
        $headers = array('Nama Barang', 'Tanggal Booking', 'Tanggal Ambil', 'Tanggal Kembali', 'Jumlah', 'Harga', 'Total');
        $data = $this->modelItem
        ->select('items.name, transactions.created_at, transaction_details.start_date, transaction_details.end_date, transaction_details.qty, transaction_details.price, transaction_details.total, transactions.reference_code')
        ->join('transaction_details', 'transaction_details.item_id = items.id')
        ->join('transactions', 'transactions.id = transaction_details.transaction_id')
        ->where('items.id', $item_id)
        ->orderBy('transaction_details.end_date', 'desc')
        ->findAll();


        // Set table header
        foreach ($headers as $header) {
            $pdf->Cell(40, 10, $header, 1);
        }
        $pdf->Ln();

        // Set table data
        foreach ($data as $row) {
            $pdf->Cell(40, 10, $row['name'], 1);
            $pdf->Cell(40, 10, $row['created_at'], 1);
            $pdf->Cell(40, 10, $row['start_date'], 1);
            $pdf->Cell(40, 10, $row['end_date'], 1);
            $pdf->Cell(40, 10, $row['qty'], 1);
            $pdf->Cell(40, 10, $row['price'], 1);
            $pdf->Cell(40, 10, $row['total'], 1);
            $pdf->Ln();
        }

        // Output the PDF as a downloadable file
        $pdf->Output('report_item.pdf', 'D');
    }
    public function transactionDetailReport($transaction_id)
    {
        // Load TCPDF library
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set page orientation to landscape
        $pdf->SetPageOrientation('L');

        // Set font
        $pdf->SetFont('times', '', 12);

        // Get the page width and height
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        // Calculate the center coordinates
        $centerX = $pageWidth / 2;
        $centerY = $pageHeight / 2;

        //get transaction
        $transaction = $this->modelTransaction->find($transaction_id);

        // Set content to center-top
        $content = 'Laporan Transaksi '.$transaction['reference_code'];
        $contentWidth = $pdf->GetStringWidth($content); // Get the width of the content
        $contentHeight = 5; // Set the height of the content (adjust as needed)

        $contentX = $centerX - ($contentWidth / 2);
        $contentY = 10; // Set the vertical position of the content (adjust as needed)

        // Add content to the PDF (centered)
        $pdf->SetXY($contentX, $contentY);
        $pdf->Cell($contentWidth, $contentHeight, $content, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        // Create a table
        $headers = array('Nama Barang', 'Tanggal Ambil', 'Tanggal Kembali', 'Jumlah', 'Harga', 'Total');
        $data = $this->modelTransactionDetail->where('transaction_id', $transaction_id)
        ->join('items', 'items.id = transaction_details.item_id')
        ->findAll();


        // Set table header
        foreach ($headers as $header) {
            $pdf->Cell(40, 10, $header, 1);
        }
        $pdf->Ln();

        // Set table data
        foreach ($data as $row) {
            $pdf->Cell(40, 10, $row['name'], 1);
            $pdf->Cell(40, 10, $row['start_date'], 1);
            $pdf->Cell(40, 10, $row['end_date'], 1);
            $pdf->Cell(40, 10, $row['qty'], 1);
            $pdf->Cell(40, 10, $row['price'], 1);
            $pdf->Cell(40, 10, $row['total'], 1);
            $pdf->Ln();
        }

        // Output the PDF as a downloadable file
        $pdf->Output('report_transaksi.pdf', 'D');
    }
    public function transactionReport()
    {
        // Load TCPDF library
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set page orientation to landscape
        $pdf->SetPageOrientation('P');

        // Set font
        $pdf->SetFont('times', '', 12);

        // Get the page width and height
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        // Calculate the center coordinates
        $centerX = $pageWidth / 2;
        $centerY = $pageHeight / 2;

        // Set content to center-top
        $content = 'Laporan List Transaksi';
        $contentWidth = $pdf->GetStringWidth($content); // Get the width of the content
        $contentHeight = 5; // Set the height of the content (adjust as needed)

        $contentX = $centerX - ($contentWidth / 2);
        $contentY = 10; // Set the vertical position of the content (adjust as needed)

        // Add content to the PDF (centered)
        $pdf->SetXY($contentX, $contentY);
        $pdf->Cell($contentWidth, $contentHeight, $content, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        // Create a table
        $headers = array('Kode Transaksi', 'Total Harga', 'Status', 'Tanggal Pesan');

        // Retrieve start_date and end_date from the form
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        // Perform query to fetch data based on start_date and end_date
        $data = $this->modelTransaction
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->findAll();

        // Set table header
        foreach ($headers as $header) {
            $pdf->Cell(40, 10, $header, 1);
        }
        $pdf->Ln();

        // Set table data
        foreach ($data as $row) {
            $pdf->Cell(40, 10, $row['reference_code'], 1);
            $pdf->Cell(40, 10, 'Rp'.number_format($row['grand_total']), 1);
            $pdf->Cell(40, 10, $row['status'], 1);
            $pdf->Cell(40, 10, $row['created_at'], 1);
            $pdf->Ln();
        }

        // Output the PDF as a downloadable file
        $pdf->Output('report_semua_transaksi.pdf', 'D');
    }

}
