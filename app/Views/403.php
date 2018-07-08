<main class="blog-content row d-flex flex-column justify-content-between mt-5">
  <section class="posts-list container d-flex flex-column">
    <div class="post-row row d-flex justify-content-center align-items-space-around mt-5 mb-5 py-5">
      <h3 class="error-title">Vous n'avez pas le droit d'être là...</h3>
      <img src="<?= $tpl->basePath; ?>/images/403.png" alt="">
      <div class="d-flex justify-content-around w-100">
        <h3 class="error-title">...veuillez vous identifier par ici</h3>
        <a href="<?= $tpl->basePath; ?>/login" class="home-error btn btn-dark mr-3">Connexion</a>
      </div>
    </div>
  </section>
</main>