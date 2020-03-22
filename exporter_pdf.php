<?php

require 'vendor/autoload.php';
include('config/config.php');
include('config/fonctions.php');

use Spipu\Html2Pdf\Html2Pdf;

$projet = req_by_id($_GET['id']);

$html2pdf = new Html2Pdf('P', 'A4', 'fr');

ob_start();

?>
    <style>
        table{ width: 100%; line-height: 5mm; border-collapse: collapse; height: 500px; }
        h1{ font-size: 20px; text-transform: uppercase; }
        img{ width: 100%; }
        ul{ padding: 16px 0; }
        li{ padding: 8px 0; }
    </style>
    <page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm">
        <table>
            <tr>
                <td><img src="<?= $projet['illustration']; ?>"></td>
            </tr>
            <tr>
                <td><h1><?= $projet['titre']; ?></h1></td>
            </tr>
        </table>
        <table>
            <tr>
                <?= $projet['contenu']; ?>
            </tr>
        </table>
    </page>

<?php
$html = ob_get_clean();
$html2pdf->writeHTML($html);
$html2pdf->output($projet['slug'].'.pdf', 'D');