<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="single.php">Article</a></li>
        <li style="display:<?php if ($connect) echo 'block'; else echo 'none'; ?>;"><a href="admin_single.php">Admin articles</a></li>
    </ul>
</nav>