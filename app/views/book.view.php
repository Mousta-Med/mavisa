<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/MaVisa/public/css/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">Mavisa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="file">File</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (!empty($_SESSION['alert'])) {
    ?>
        <div class="msg">
            <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
                <?= $_SESSION['alert']['msg'] ?>
            </div>
        </div>
    <?php
    }
    unset($_SESSION['alert']);
    ?>
    <div class="book">
        <div id="app">
            <?php
            if (!empty($_SESSION['token'])) {
            ?>
                <div class="msg">
                    <div class="text-center">
                        <h1>Copy Your Token Now You Will Need It</h1>
                        <h3 id="token"><?= $_SESSION['token'] ?></h3>
                        <button class="btn bg-dark text-white" @click="copytoclipboard()">Copy token</button>
                    </div>
                </div>
            <?php
            }
            unset($_SESSION['token']);
            ?>
            <div ref="calendar"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/mavisa/public/js/script.js"></script>
</body>

</html>