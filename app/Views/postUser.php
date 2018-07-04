<main class="blog-content row d-flex flex-column justify-content-between mt-5">
  <section class="post-container container d-flex flex-column">
    <header class="post-container-header row d-flex justify-content-between mb-5 p-3">
      <h2 class="book-title w-100 text-center">Billet simple pour l'Alaska</h2>
      <p class="text-right w-100">Retrouvez chaque semaine un nouvel épisode de mon nouveau roman</p>
    </header>

    <div class="post-row row mt-5 mb-5">
      <div class="post container d-flex flex-column">
        <hgroup class="post-header row d-flex flex-column justify-content-center p-4">
          <h3 class="post-title"> <?= $tpl->viewVars['post']->getTitle(); ?></h3>
          <h6 class="post-date align-self-end"><?= $tpl->viewVars['post']->getCreationDate(); ?></h6>
        </hgroup>
        <article class="post-content row m-0 pb-5 px-5">
          <?= $tpl->viewVars['post']->getPostContent(); ?></article>
      </div>
    </div>

    <div class="comments-row row my-5">
      <div class="comments-container container d-flex flex-column justify-content-between mb-5">
        <?php if ($tpl->viewVars['totalComments'] > 0):?>
        <div class="comment-row row mb-5">
        <?php foreach ($tpl->viewVars['comments'] as $key => $value) :?>
          <div class="comment container d-flex flex-column justify-content-between">
            <hgroup class="comment-header row d-flex justify-content-start p-4 ">
              <h6 class="comment-author mr-2"><?= $value->getAuthor(); ?>,</h6>
              <h6 class="comment-date"><?= $value->getCommentDate(); ?></h6>
            </hgroup>
            <article class="comment-content row m-0 pb-4 px-4">
             <?= $value->getCommentContent(); ?>
            </article>
            <form action="" method="post" class="row report-form ml-4 mb-4">
              <input type="hidden" name="idComment" value="<?= $value->getIdComment(); ?>">
              <button type="submit" class="report btn btn-warning btn-sm" name="report">Signaler</button>
            </form>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($tpl->viewVars['totalComments'] > 10):?>
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
        <?php endif; ?>

        <form class="comments-container-form row d-flex flex-column my-5 py-4 px-5" action="<?= $tpl->basePath; ?>/post/comment/add" method="post">
          <textarea class="form-control mb-4" type="text" name="commentContent" placeholder="Ecrivez votre commentaire ici..." id="add-comment"
            cols="50" rows="7"></textarea>
          <input type="hidden" name="idPost" value="<?= $tpl->viewVars['post']->getId_post(); ?>">
          <button class="add btn btn-secondary w-25 font-weight-bold" type="submit">
            <i class="fas fa-plus-square pl-0 mr-1"></i> Ajouter
          </button>
        </form>
      </div>
    </div>

  </section>
</main>