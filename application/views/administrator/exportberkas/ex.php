<?php
require(APPPATH . 'views/administrator/exportberkas/fpdf_merge.php');

$merge = new FPDF_Merge();
// $merge->add('../upload/berkas_pelamar/doc1.pdf');
$merge->add('./upload/berkas_pelamar/doc2.pdf');
$merge->output();

// echo 'halooo';
