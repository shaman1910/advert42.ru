<?php use yii\helpers\Url;
use yii\widgets\LinkPager; ?>

<div class="main-content">
    <div class="container">

         <div class="row">

            <div class="col-md-8">
                <form class="well form-search">
                    <input type="text">
                    <button type="submit" class="btn">Поиск</button>
                </form>
                <?php foreach ($adverts as $advert):?>
                <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['site/view', 'id'=>$advert->id]);?>"><img src="<?= $advert->getImage() ?>" alt=""></a>

                        <a href="<?= Url::toRoute(['site/view', 'id'=>$advert->id]);?>" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="#"><?= $advert->category->title; ?></a></h6>

                            <h1 class="entry-title"><a href="#"><?= $advert->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                            <?= $advert->description; ?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$advert->id]);?>" class="more-link">Продолжить чтение</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">Разместил <a href="#"><?= $advert->author->username; ?></a> On <?= $advert->getDate('medium') ?></span>
                            <ul class="text-center pull-right">
                                <li></a></li>Цена <?=$advert->price;?> <i class="fa fa-rub"></i>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach;?>
               <?php
               echo LinkPager::widget([
                'pagination' => $pages,
                ]);
               ?>
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