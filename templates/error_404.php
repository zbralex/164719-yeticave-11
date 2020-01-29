<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $cat) : ?>
            <li class="nav__item <?php if($_GET['category'] === $cat['symbol_code']) {
                print('nav__item--current');
            }?>">
                <a href="index.php?<?= http_build_query([
                    'category' => $cat['symbol_code']
                ]) ?>"><?= isset($cat['name']) ? $cat['name'] : '' ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="lot-item container">
    <h2>404 Страница не найдена</h2>
    <p>Данной страницы не существует на сайте.</p>
</section>

