<main class="dashboard row">
  <section class="dashboard-content row d-flex align-items-start ">
    <div class="posts-list-admin-container container col-6 mt-5 ">
      <table class="posts-list-admin table table-striped table-bordered table-hover table-sm table-responsive-sm text-center mb-5">
        <thead>
          <tr>
            <th rowspan="2">Titre du billet</th>
            <th colspan="2">Date</th>
            <th colspan="3">Nombre de commentaires</th>
          </tr>
          <tr>
            <th scope="col">Création</th>
            <th scope="col">Edition</th>
            <th scope="col">Publiés</th>
            <th scope="col">Signalés</th>
            <th scope="col">Supprimés</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">
              <a href="" class="post-title-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. </a>
            </th>
            <td>12/06/18</td>
            <td>14/06/18</td>
            <td>10</td>
            <td class="report-comment text-danger">1</td>
            <td>1</td>
          </tr>
          <tr>
            <th scope="row">
              <a href="" class="post-title-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
            </th>
            <td>12/06/18</td>
            <td>14/06/18</td>
            <td>13</td>
            <td class="report-comment text-danger">0</td>
            <td>0</td>
          </tr>
          <tr>
            <th scope="row">
              <a href="" class="post-title-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
            </th>
            <td>12/06/18</td>
            <td>14/06/18</td>
            <td>4</td>
            <td class="report-comment text-danger">5</td>
            <td>3</td>
          </tr>
        </tbody>
      </table>

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
    </div>


    <div class="comments-report-list container d-flex flex-column col-5">
      <div class="comment-report-row row mt-5 mb-5">
        <div class="comment-report container d-flex flex-column">
          <div class="comment-header row d-flex justify-content-between p-4">
            <h3 class="comment-title">Titre du commentaire</h3>
            <p class="comment-date align-self-end">12/06/18</p>
          </div>
          <article class="comment-content row m-0 pb-4 px-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec lorem efficitur, vulputate quam ultrices, varius augue.
            In hac habitasse platea dictumst. Curabitur luctus ornare purus, vel ultricies massa finibus ut. Mauris dignissim
            nunc in volutpat.
          </article>
          <div class="btn-group d-flex justify-content-between">
            <form action="" method="post" class="row ml-4 mb-4">
              <button type="submit" class="validate btn btn-success btn-md px-4" name="report">
                <a href="#" class="validate-comment-report text-light font-weight-bold">Valider</a>
              </button>
            </form>
            <form action="" method="post" class="row mr-4 mb-4">
              <button type="submit" class="delete btn btn-warning btn-md px-3" name="report">
                <a href="#" class="delete-comment-report text-dark font-weight-bold">Supprimer</a>
              </button>
            </form>
          </div>
        </div>

        <div class="comment-report container d-flex flex-column">
          <div class="comment-header row d-flex justify-content-between p-4">
            <h3 class="comment-title">Titre du commentaire</h3>
            <p class="comment-date align-self-end">12/06/18</p>
          </div>
          <article class="comment-content row m-0 pb-4 px-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec lorem efficitur, vulputate quam ultrices, varius augue.
            In hac habitasse platea dictumst. Curabitur luctus ornare purus, vel ultricies massa finibus ut. Mauris dignissim
            nunc in volutpat.
          </article>
          <div class="btn-group d-flex justify-content-between">
            <form action="" method="post" class="row ml-4 mb-4">
              <button type="submit" class="validate btn btn-success btn-md px-4" name="report">
                <a href="#" class="validate-comment-report text-light font-weight-bold">Valider</a>
              </button>
            </form>
            <form action="" method="post" class="row mr-4 mb-4">
              <button type="submit" class="delete btn btn-warning btn-md px-3" name="report">
                <a href="#" class="delete-comment-report text-dark font-weight-bold">Supprimer</a>
              </button>
            </form>
          </div>
        </div>
      </div>

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
    </div>
  </section>
</main>