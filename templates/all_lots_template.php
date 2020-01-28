<section class="lots">
    <h2>Все лоты в категории <span>«<?=  $category_detail[0]['name']; ?>»</span></h2>
    <ul class="lots__list">


        <?php foreach($category_detail as $detail_item): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="../<?= $detail_item['img']?>" width="350" height="260" alt="<?= $detail_item['lot_name']?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $detail_item['name']?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?= $detail_item['lot_name']?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= format_price($detail_item['start_price'])?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer <?php

                        if (isset($detail_item['end_date'])) {
                            $hours = get_dt_range($detail_item['end_date'])['hours'];
                            $minutes = get_dt_range($detail_item['end_date'])['minutes'];

                            if ($hours === 0) {
                                echo 'timer--finishing';
                            }
                        }
                        ?>">
                            <?= $hours . ":" . $minutes; ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>



    </ul>
</section>
<ul class="pagination-list">
    <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
    <li class="pagination-item pagination-item-active"><a>1</a></li>
    <li class="pagination-item"><a href="#">2</a></li>
    <li class="pagination-item"><a href="#">3</a></li>
    <li class="pagination-item"><a href="#">4</a></li>
    <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
</ul>
