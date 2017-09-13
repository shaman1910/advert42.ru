<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="well form-search">
                    <input type="text">
                    <button type="submit" class="btn">Поиск</button>
                </form>
                <article class="post">
                    <div class="post-thumb">
                        <img src="<?= $advert->getImage() ?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="#"> Travel</a></h6>

                            <h1 class="entry-title"><?= $advert->title ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $advert->content ?>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left">Телефон <?= $advert->phone; ?></span>
                            <ul class="text-center pull-right">
                                <li></a></li>Цена <?=$advert->price;?> <i class="fa fa-rub"></i>
                            </ul>
                        </div>


                    </div>
                </article>

            </div>
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Категории</h3>
                        <ul>
                            <?php foreach ($categories as $category):?>
                                <li>
                                    <a href="#"> <?= $category->title; ?> </a>
                                    <span class="post-count pull-right">  (<?= $category->getAdverts()->count();?>)</span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Популярные обьявления</h3>
                        <?php foreach ($populars as $advert):?>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="<?= $advert->getImage() ?>" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase"> <?= $advert->title ?> </a>
                                    <span class="p-date"><?= $advert->getDate('medium') ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->