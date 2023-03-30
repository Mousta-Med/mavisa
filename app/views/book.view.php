<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/MaVisa/public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/MaVisa/public/css/main.min.css" />
    <script src="/mavisa/public/js/main.min.js"></script>

</head>


<body>
    <div id="app">
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
                            <a role="button" class="nav-link" @click="resetForm()">logout</a>
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
            <div id="calendar"></div>
            <?php
            if (isset($_SESSION['user_token'])) { ?>
                <p id="token"><?= $_SESSION['user_token'] ?></p>
            <?php } ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chose time</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="resrvation_time">Resrvation Time</label>
                            <select class="form-control" name="resrvation_time" v-model="time" id="resrvation_time">

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="book" type="button" @click="Valid()" class="btn btn-primary">Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/mavisa/public/js/script.js"></script>
</body>

</html>