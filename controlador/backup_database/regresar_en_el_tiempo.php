
<?php
try {

    $filename = basename($_FILES["fileToUpload"]["name"]);
    $templine = '';
    $usuario = 'u917997591_andres';
    $contraseña = 'CSBS2022db';
    $mbd = new PDO('mysql:host=localhost;dbname=u917997591_classic_street', $usuario, $contraseña);

    $fp = fopen($filename, 'r');
   
    // Loop through each line
    while (($line = fgets($fp)) !== false) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == ''){
            continue;
            echo $line;
        }
        // Add this line to the current segment drop table usuarios; drop table ventas; drop table cargo; drop t
        $templine .= $line;
    
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            $mbd->query($templine);
            // Reset temp variable to empty
            $templine = '';
        }
    }
    
    fclose($fp);
    echo 'BASE DE DATOS IMPORTADA CON CORRECTAMENTE';
    header("location:backup.php");
    




    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>