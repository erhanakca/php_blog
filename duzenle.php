<?php

require "database.php";

if (isset($_POST['id']) && isset($_POST['baslik']) && isset($_POST['aciklama']) && isset($_POST['kisa_aciklama'])){
    $yapicam = $db->prepare("UPDATE yazilar SET baslik=:baslik, aciklama=:aciklama, kisa_aciklama=:kisa_aciklama WHERE id=:id");
    $yapiyorum = $yapicam->execute([
       'id'=>(int)$_POST['id'],
       'baslik'=>$_POST['baslik'],
       'aciklama'=>$_POST['aciklama'],
       'kisa_aciklama'=>$_POST['kisa_aciklama']
    ]);
    header('Location: detay.php?id=' . $_POST['id']);

    die();
}

$yazi = $db->query("SELECT * FROM yazilar WHERE id=" . (int)$_GET['id'])->fetch(PDO::FETCH_ASSOC);

?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $yazi['id']?>">
    <label for="baslik">baslik</label>
    <input id="baslik" type="text" name="baslik" value="<?=$yazi['baslik'] ?>">
    <label for="aciklama">aciklama</label>
    <textarea id="aciklama" name="aciklama"><?= $yazi['aciklama']?></textarea>
    <label for="kisa">kısa açıklama</label>
    <textarea id="kisa" name="kisa_aciklama"><?= $yazi['kisa_aciklama']?></textarea>
    <button type="submit">düzenle</button>
    <a href="index.php">vazgeç</a>
</form>
