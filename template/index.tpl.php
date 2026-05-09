<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $ablakcim['cim'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-light p-3 border-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 m-0"><?= $fejlec['cim'] ?></h1>
            <div class="text-right">
                <?php if(isset($_SESSION['login'])) { ?>
                    <span>Bejelentkezett: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong></span>
                <?php } else { ?>
                    <span>Nincs bejelentkezve</span>
                <?php } ?>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <?php foreach ($oldalak as $url => $oldal_info) { ?>
                        <?php 
                        if(
                            (isset($_SESSION['login']) && $oldal_info['menun'][0]) || 
                            (!isset($_SESSION['login']) && $oldal_info['menun'][1])
                        ) { ?>
                            <li class="nav-item <?= ($oldal == $oldal_info) ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= ($url == '/') ? '.' : $url ?>">
                                    <?= $oldal_info['szoveg'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4 min-vh-100">
        <?php include("./template/pages/{$oldal['fajl']}.tpl.php"); ?>
    </main>

    <!-- Lábléc -->
    <footer class="bg-dark text-white text-center p-3 mt-4">
        <div class="container">
            <?= $lablec['copyright'] ?> <?= $lablec['ceg'] ?>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>