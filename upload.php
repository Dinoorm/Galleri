<?php
// Kollar om formuläret har skickats in och en fil har laddats upp
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    // Definiera folder där uppladdade filer ska lagras
    $uploadDir = 'bilder/';

    // Hämta den uppladdade filinformationen
    $file = $_FILES["file"];

    // Definiera tillåtna formater
    $allowedFormats = array("jpg", "jpeg", "png", "gif");

    // Få reda på formatet av filen
    $format = pathinfo($file["name"], PATHINFO_EXTENSION);

    // Kollar om den uppladade filen har en format
    if (in_array($format, $allowedFormats)) {
        // Definiera sökvägen dit den uppladdade filen ska laddas up 
        $uploadPath = $uploadDir . basename($file["name"]);

        // Flytta den uppladdade filen till den specifika foldern
        if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
            // Visar att filen har laddas upp
            echo "Bilden har laddats upp.";
        } else {
            // Visar fel om ett fel uppstod när filen laddades up
            echo "Det uppstod ett fel vid uppladdning av bilden.";
        }
    } else {
        // Visar fel om den uppladdade bilden har en ogiltigt filformat
        echo "Endast JPG, JPEG, PNG och GIF-filer är tillåtna.";
    }
}
?>

<!-- Knapp för att hjälpa dig tillbaka till index-sidan för att se bilderna -->
<button onclick="window.location.href= 'index.php';"> Tillbaka till Index: Click Here</button>

