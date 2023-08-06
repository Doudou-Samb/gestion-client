<?php
require('fpdf.php'); // Assurez-vous d'avoir la bibliothèque FPDF incluse
global $connect;
class PDF extends FPDF {
    function Header() {
        // En-tête du PDF
    }
    function Footer() {
        // Pied de page du PDF
    }
}


?>