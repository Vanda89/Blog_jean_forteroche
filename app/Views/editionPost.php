<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="text-editor-container container d-flex flex-column">
    <div class="text-editor-row row bg-dark mb-4 pb-0">
      <form method="post" class="text-editor-form container px-1">
        <input id="title-post-editor" value="<?= $tpl->viewVars['post']->getTitle(); ?>"></input>
      </form>

      <form method="post" class="text-editor-form container px-1">
        <textarea id="content-post-editor"><?= $tpl->viewVars['post']->getPostContent(); ?></textarea>
      </form>
    </div>


    <div class="buttons-row row d-flex justify-content-between mb-4">
      <form action="" method="post" class="container d-flex justify-content-end col-6">
        <button type="submit" class="archive-post btn btn-warning btn-lg" name="archive-post">Archiver</button>
      </form>
      <form action="" method="post" class="container d-flex justify-content-start col-6">
        <button type="submit" class="update-post btn btn-success btn-lg" name="update-post">Mettre à jour</button>
      </form>
    </div>
  </section>
</main>