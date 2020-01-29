<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item nav__item--current">
            <a href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Разное</a>
        </li>
    </ul>
</nav>
<div class="container">
    <section class="lots">
        <?php
        if(!empty($categoryDetail[0]['name'])) {
            print( '<h2>Все лоты в категории <span>«' . $categoryDetail[0]['name'] . '»</span></h2>');
        } else {
            print( '<h2>Ничего не найдено</h2>');
        }
        ?>

        <ul class="lots__list">


            <?php foreach ($categoryDetail as $detailItem): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="../<?= $detailItem['img'] ?>" width="350" height="260"
                             alt="<?= $detailItem['lot_name'] ?>">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?= $detailItem['name'] ?></span>
                        <h3 class="lot__title"><a class="text-link" href="/index.php?<?= http_build_query([
                                'pages' => $detailItem['lot_id']
                            ])?>"><?= $detailItem['lot_name'] ?></a>
                        </h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= format_price($detailItem['start_price']) ?><b
                                            class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer <?php

                            if (isset($detailItem['end_date'])) {
                                $hours = get_dt_range($detailItem['end_date'])['hours'];
                                $minutes = get_dt_range($detailItem['end_date'])['minutes'];

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
            <?php endforeach; ?>
        </ul>
    </section>
<?= $pagination;?>
</div>
