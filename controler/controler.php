<?php
include_once("welcomePage/welcomePage.php");
$html = "";

if (isset($_GET['p'])) {
    if ($_GET['p'] == 'graphique') {
        $html .= head() . nav($_GET['p']) . body('grahpique') . footer();
    } elseif ($_GET['p'] == 'connexion') {
        $html .= head() . nav($_GET['p']) . body('connexion') . footer();
    }
} else {
    $html .= head() . nav('') . body() . footer();
}