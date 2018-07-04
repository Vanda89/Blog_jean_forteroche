<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="text-editor-container container d-flex flex-column">
    <div class="text-editor-row row pb-0">
      <form method="post" action="<?= $tpl->basePath; ?>/admin/post/create/publish" class="text-editor-form container px-1">
        <div class="editor-row">
          <textarea id="title-post-editor" name="title"></textarea>
          <textarea id="content-post-editor" name="content"></textarea>
        </div>
        <div class="buttons-row row d-flex justify-content-center mt-3 mb-0">
          <button type="submit" class="publish-post btn btn-success btn-lg" name="publish-post">Publier</button>
        </div>
      </form>
    </div>
  </section>
</main>