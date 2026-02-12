<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
   
   <?php include('asetukset.php'); ?>

    <h2>Lista</h2>

    <?php
    $sql = "INSERT INTO tiedot(sukunimi, etunimi, syntymävuosi) VALUES (?,?,?)";
    #echo $sql;

    // Valmistellaan SQL-lause ja lähetetään palvelimelle odottamaan käyttöä
    $stmt = $pdo->prepare($sql);

    $sukunimi = $_POST['sn'];
    $etunimi = $_POST['en'];
    $syntymavuosi = $_POST['sv'];

    if (empty($sukunimi) || strlen($sukunimi) >= 30 || empty($etunimi) || strlen($etunimi) >= 30 || empty($syntymavuosi) || strlen($syntymavuosi) !== 4) {
    echo "Tarkista antamasi tiedot.<br><br>";
    }else{
    $stmt->execute([$sukunimi, $etunimi, $syntymavuosi]);
    echo "<p>Tiedot tallennettu!</p><br><br>";
    }

    $pdo->connection = null;
    ?>

</body>
</html> 