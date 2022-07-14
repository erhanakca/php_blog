<?php

require 'database.php';

if (isset($_POST['baslik']) && isset($_POST['aciklama']) && isset($_POST['kisa_aciklama'])){
    $yapicam = $db->prepare('INSERT INTO yazilar (baslik, aciklama, kisa_aciklama) VALUES (:baslik, :aciklama, :kisa_aciklama)');
    $yapiyorum = $yapicam->execute([
        'baslik'=>$_POST['baslik'],
        'aciklama'=>$_POST['aciklama'],
        'kisa_aciklama'=>$_POST['kisa_aciklama']
    ]);

    $sonEklenenid = $db->lastInsertId();

    header('Location: detay.php?id=' . $sonEklenenid);

    die();
}

?>

<form method="POST">
    <label for="baslik">başlık</label>
    <input type="text" name="baslik" id="baslik">
    <label for="aciklama">açıklama</label>
    <textarea name="aciklama" id="aciklama"></textarea>
    <label for="kisa">kısa açıklama</label>
    <textarea name="kisa_aciklama" id="kisa"></textarea>
    <button type="submit">Ekle</button>
    <a href="index.php">vazgeç</a>
</form>
