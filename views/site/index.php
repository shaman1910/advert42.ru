<?php use yii\widgets\LinkPager; ?>

<div class="main-content">
    <div class="container">
         <div class="row">
            <div class="col-md-8">
                <?php foreach ($adverts as $advert):?>
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="/public/images/blog-1.jpg" alt=""></a>

                        <a href="blog.html" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="#"><?= $advert->category->title; ?></a></h6>

                            <h1 class="entry-title"><a href="blog.html"><?= $advert->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                            <?= $advert->description; ?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="blog.html" class="more-link">Continue Reading</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">Разместил <a href="#"><?= $advert->author->username; ?></a> On February 12, 2016</span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= $advert->viewed; ?>
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
                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Похожие обьявления</h3>

                        <div class="popular-post">


                            <a href="#" class="popular-img"><img src="/public/images/p1.jpg" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                <span class="p-date">February 15, 2016</span>

                            </div>
                        </div>
                        <div class="popular-post">

                            <a href="#" class="popular-img"><img src="/public/images/p1.jpg" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                <span class="p-date">February 15, 2016</span>
                            </div>
                        </div>
                        <div class="popular-post">


                            <a href="#" class="popular-img"><img src="/public/images/p1.jpg" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                <span class="p-date">February 15, 2016</span>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Популярные обьявления</h3>

                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="/public/images/r-p.jpg" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="/public/images/r-p.jpg" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="/public/images/r-p.jpg" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="/public/images/r-p.jpg" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </div>
</div>