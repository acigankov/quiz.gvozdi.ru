
<!-- Modal -->
<div class="modal fade" id="modal_news" tabindex="-1" role="dialog" aria-labelledby="modal_newsTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--<h5 class="modal-title" id="modal_newsTitle">ГАРРИ ПОТТЕР СЕЗОН #1.1. ИТОГИ</h5>-->
                <h5 class="modal-title" id="modal_newsTitle"><?= $news[0]['title'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body news-modal">
                
              <?= $news[0]['text'] ?>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Я прочитал</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
