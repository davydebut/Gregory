<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Acceuil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="single.php">Article</a>
                </li>
                <li class="nav-item" style="display:<?php if ($connect) echo 'block';
                                                    else echo 'none'; ?>;">
                    <a class="nav-link" href="admin_single.php">Admin articles</a>
                </li>
            </ul>
            <form class="d-flex row g-3" action="index.php" method="post">
                <div class="form-floating mb-3 col">
                    <input id="floatingInput" name="pseudo" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                    <label for="floatingInput">Pseudo</label>
                </div>
                <div class="form-floating mb-3 col">
                    <input id="floatingInput" name="password" class="form-control me-2" type="password" placeholder="Search" aria-label="Search">
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-floating col">
                    <input id="floatingInput" name="connect" class="btn btn-outline-dark" type="submit" value="Connexion">
                </div>
                <div class="form-floating col">
                    <input id="floatingInput" name="submit" class="btn btn-outline-dark" type="button" value="Inscription" data-bs-toggle="modal" data-bs-target="#exampleModal">
                </div>
                <p class="thank-you" style="display:<?php if ($isSuccess) echo 'block';
                                                    else echo 'none'; ?>;">Vous êtes bien inscrit !</p>
                <p class="thank-you" style="display:<?php if ($connect) echo 'block';
                                                    else echo 'none'; ?>;">Vous êtes connecté <?php echo $pseudo; ?> !</p>
            </form>
        </div>
    </div>
</nav>