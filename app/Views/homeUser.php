<main class="blog-content row d-flex flex-column justify-content-between mt-5">
  <section class="posts-list container d-flex flex-column">
    <header class="posts-list-header row d-flex justify-content-between mb-5 p-3">
      <h2 class="book-title w-100 text-center">Billet simple pour l'Alaska</h2>
    </header>

    <?php foreach ($tpl->viewVars['allPosts'] as $key => $value) :?>
    <div class="post-row row mt-5 mb-5">
      <div class="post container d-flex flex-column">
        <div class="post-header row d-flex flex-column justify-content-center p-4">
          <h3 class="post-title"><?= $value->getTitle(); ?></h3>
          <p class="post-date align-self-end"><?= $value->getCreationDate(); ?></p>
        </div>
        <article class="post-content row m-0 pb-5 px-5">
          <?= $value->getPostContent(); ?>
        </article>
        <div class="row d-flex justify-content-between pr-4">
          <a href="<?= $tpl->basePath; ?>/post/get?id= <?= $value->getId_post(); ?>" class="read-more row pb-3 pl-5">Lire la suite...</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

    <div class="row d-flex justify-content-center">
      <nav class="posts-list-pagination" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link prev" href="#" aria-label="Previous">
              <span aria-hidden="true">
                <i class="fas fa-angle-double-left"></i>
              </span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link next" href="#" aria-label="Next">
              <span aria-hidden="true">
                <i class="fas fa-angle-double-right"></i>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
</main>