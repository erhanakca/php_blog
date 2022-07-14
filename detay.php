<?php

require "database.php";

$id = (int)$_GET['id'];

$yazi = $db->query("SELECT * FROM yazilar WHERE id=".$id)->fetch(PDO::FETCH_ASSOC);

?>

<h1>
    <?= $yazi['baslik'] ?>
</h1>

<h3>
    <?= $yazi['kisa_aciklama'] ?>
</h3>

<p>
    <?= $yazi['aciklama'] ?>
</p>

<a href="index.php">anasayfa</a>
<a href="duzenle.php?id=<?= $yazi['id']?>">düzenle</a>
<a href="sil.php?id=<?=$yazi['id']?>">sil</a>