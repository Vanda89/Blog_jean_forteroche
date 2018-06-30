<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="connection-form-container container d-flex flex-column">
    <header class="connection-form-container-header row d-flex justify-content-between mb-5 p-3">
      <h2 class="connection-form-container-title w-100 text-center">Formulaire de connexion</h2>
    </header>

    <div class="connection-form-row row mb-3">
      <form action="" method="post" id="connectionForm" class="connection-form container d-flex flex-column justify-content-around align-items-center p-0">
        <h3 class="connection-form-title row mt-5"> Déjà inscrit ?</h3>
        <div id="errors" class="alert alert-danger errors-hide" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <!-- TODO CLASS CSS HIDE
            <p id="existing-name">Identifiant ou mot de passe incorrect.</p>
          <p id="empty">Tous les champs sont obligatoires.</p> -->
        </div>
        <div class="mt-5 mb-5 row">
          <label for="mail" class="mail"></label>
          <input type="email" class="mail form-control form-control-lg" name="mail" id="mail" placeholder="Adresse mail">
        </div>
        <div class="mb-5 row">
          <label for="pswd" class="pswd"></label>
          <input type="password" class="pswd form-control form-control-lg" name="pswd" id="pswd" placeholder="Mot de passe">
        </div>
        <button type="submit" class="connection-form-btn row btn btn-dark btn-lg mb-5" name="connection-btn">Connexion</button>
      </form>
    </div>
  </section>
</main>