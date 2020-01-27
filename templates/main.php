<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и
        горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach( $categories as $cat):?>
            <li class="promo__item promo__item--<?= $cat['symbol_code'];?>">
                <a class="promo__link" href="pages/all-lots.html"><?= $cat['name'];?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach($lots as $lot):?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $lot['img']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $lot['name']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= $lot['lot_name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= format_price($lot['start_price']); ?></span>
                        </div>
                        <div class="lot__timer timer <?php
                        if (isset($lot['end_date'])) {
                            $hours = get_dt_range($lot['end_date'])['hours'];
                            $minutes = get_dt_range($lot['end_date'])['minutes'];

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
