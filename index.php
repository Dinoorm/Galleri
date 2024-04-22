<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Bildgalleri</title>
</head>
<body>
    <h2>Bildgalleri</h2>
    <div class="container">
        <?php
        // Stapla bilderna från upload.php till "bilder" med hjälp av en array 
        // Och ge filformaterna en förkortnings kommand
        $images = glob('bilder/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        // Gå igenom varje bild och visa den som ett <img>-element
        foreach ($images as $image) {
            echo "<img src='$image' alt='Bild'>";
        }
        ?>
<!-- Formulär för uppladdning av bilder -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Ladda upp bild</button>
    </form>
    </div>
</body>
</html>