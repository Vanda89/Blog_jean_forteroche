<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="registration-form-container container d-flex flex-column">
    <header class="registration-form-container-header row d-flex justify-content-between mb-5 p-3">
      <h2 class="registration-form-container-title w-100 text-center">Formulaire d'Inscription</h2>
    </header>
    <div class="registration-form-row row mb-3">
      <form action="" method="post" class="registration-form container d-flex flex-column justify-content-around align-items-center p-0">
        <h3 class="connection-form-title  mt-5">Pas encore inscrit ?</h3>
        <div id="error" class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p id="existing-name">Ce pseudo est déjà pris.</p>
          <p id="empty">Tous les champs sont obligatoires.</p>
          <p id="invalid-mail">Adresse mail invalide.</p>
          <p id="existing-mail">Adresse mail déjà existante.</p>
          <p id="short-pswd">Mot de passe doit contenir au moins 8 caractères.</p>
          <p id="different-pswd">Les 2 mots de passe sont différents.</p>
        </div>

        <div class="registration-input-group input-group-lg mt-5 mb-5">
          <div class="input-group-prepend mb-2">
            <span class="registration-input-group-text font-weight-bold" id="">Pseudo :</span>
          </div>
          <input type="text" class="pseudo form-control form-control-lg" name="pseudo" id="pseudo" required="required">
        </div>

        <div class="registration-input-group input-group-lg mb-5 ">
          <div class="input-group-prepend mb-2">
            <span class="registration-input-group-text font-weight-bold" id="">Adresse mail :</span>
          </div>
          <input type="email" class="mail form-control form-control-lg" name="mail" id="mail" required="required">
        </div>

        <div class="registration-input-group input-group-lg mb-5 ">
          <div class="input-group-prepend mb-2">
            <span class="registration-input-group-text font-weight-bold" id="">Mot de passe :</span>
          </div>
          <input type="password" class="pswd form-control form-control-lg" name="pswd" id="pswd" required="required">
        </div>

        <div class="registration-input-group input-group-lg mb-5 ">
          <div class="input-group-prepend mb-2">
            <span class="registration-input-group-text font-weight-bold" id="">Confirmer le mot de passe :</span>
          </div>
          <input type="password" class="confirm-pswd form-control form-control-lg" name="confirm-pswd" id="confirm-pswd" required="required">
        </div>

        <button type="submit" class="registration-form-btn btn btn-dark btn-lg mb-5" name="registration-validation-btn">Valider</button>
      </form>
    </div>
  </section>
</main>