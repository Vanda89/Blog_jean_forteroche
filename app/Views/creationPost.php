<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="text-editor-container container d-flex flex-column">
    <div class="text-editor-row row bg-dark mb-4 pb-0">
      <form method="post" class="text-editor-form container px-1">
        <input id="title-post-editor">Titre...</input>
      </form>

      <form method="post" class="text-editor-form container px-1">
        <textarea id="content-post-editor">Texte...</textarea>
      </form>
    </div>

    <div class="buttons-row row d-flex justify-content-between mb-4">
      <form action="" method="post" class="container d-flex justify-content-end col-6">
        <button type="submit" class="save-post btn btn-warning btn-lg" name="save-post">Sauvegarder</button>
      </form>
      <form action="" method="post" class="container d-flex justify-content-start col-6">
        <button type="submit" class="publish-post btn btn-success btn-lg" name="publish-post">Publier</button>
      </form>
    </div>
  </section>
</main>