<?php

require "database.php";

$yazilar = $db->query("SELECT * FROM yazilar ORDER BY id ASC ")->fetchAll(PDO::FETCH_ASSOC);

?>
<a href="ekle.php">Yeni Yazı Ekle</a>
<ul>
    <?php foreach ($yazilar as $yazi): ?>
    <li>
        <a href="detay.php?id=<?= $yazi['id']?>"><?= $yazi['baslik'] ?></a>
    </li>
    <?php endforeach; ?>
</ul>
