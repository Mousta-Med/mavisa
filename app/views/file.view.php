<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File</title>
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
          <?php
          if (!empty($_SESSION['user'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="logout">logout</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="file">
    <?php
    if (!empty($_SESSION['alert'])) {
    ?>
      <div class="msg">
        <div class="alert text-center alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
          <?= $_SESSION['alert']['msg'] ?>
        </div>
      </div>
    <?php
    }
    unset($_SESSION['alert']);
    ?>
    <div id="app">
      <h1 class="text-center mt-5">Create File</h1>
      <div class="mt-5 container">
        <form class="row g-3">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="user_firstname" v-model="user_firstname" placeholder="Entrez votre nom" required>
          </div>
          <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="user_lastname" v-model="user_lastname" placeholder="Entrez votre prénom" required>
          </div>
          <div class="col-md-6">
            <label for="dateNaissance" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="dateNaissance" name="user_birthdate" v-model="user_birthdate" required>
          </div>
          <div class="col-md-6">
            <label for="nationalite" class="form-label">Nationalité</label>
            <input type="text" class="form-control" id="nationalite" name="user_nationality" v-model="user_nationality" placeholder="Entrez votre nationalité" required>
          </div>
          <div class="col-md-6">
            <label for="situationFamiliale" class="form-label">Situation familiale</label>
            <input type="text" class="form-control" id="situationFamiliale" name="family_situation" v-model="family_situation" placeholder="Entrez votre situation familiale" required>
          </div>
          <div class="col-6">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="user_adresse" v-model="user_adresse" placeholder="Entrez votre adresse" required>
          </div>
          <div class="col-md-6">
            <label for="typeVisa" class="form-label">Type de visa</label>
            <input type="text" class="form-control" id="typeVisa" name="visa_type" v-model="visa_type" placeholder="Entrez le type de visa" required>
          </div>
          <div class="col-md-3">
            <label for="dateDepart" class="form-label">Date de départ</label>
            <input type="date" class="form-control" id="dateDepart" name="Date_of_departure" v-model="Date_of_departure" required>
          </div>
          <div class="col-md-3">
            <label for="dateArrivee" class="form-label">Date d'arrivée</label>
            <input type="date" class="form-control" id="dateArrivee" name="arrival_date" v-model="arrival_date" required>
          </div>
          <div class="col-md-6">
            <label for="numeroDocument" class="form-label">numéro de document de voyage</label>
            <input type="text" class="form-control" id="numeroDocument" name="voyage_document_number" v-model="voyage_document_number" placeholder="Entrez le numéro de document de voyage" required>
          </div>
          <div class="col-md-6">
            <label for="typeDocument" class="form-label">Type de document de voyage</label>
            <input type="text" class="form-control" id="typeDocument" name="voyage_document_type" v-model="voyage_document_type" placeholder="Entrez le type de document de voyage" required>
          </div>
          <div class="col-12">
            <input type="button" class="btn btn-primary" @click="onsubmit()" value="Create">
          </div>
        </form>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/mavisa/public/js/script.js"></script>
</body>

</html>