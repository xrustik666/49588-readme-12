<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>

<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">

            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">

                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>

            </ul>
        </div>

        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">

                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <!-- Если параметр запроса не указан, то классом filters__button--active надо отметить ссылку «Все» -->
                    <a class="filters__button filters__button--ellipse filters__button--all <?= $content_type === null ? 'filters__button--active' : '' ?>" href="index.php">
                        <span>Все</span>
                    </a>
                </li>

                <? foreach ($types as $type) : ?>
                    
                <!-- Отображение типа постов по условию -->
                <li class="popular__filters-item filters__item">
                    <!-- Если параметр запроса с типом контента существует, то необходимо для соответствующей ссылки из списка ul.popular__filters-list добавить класс filters__button--active -->
                    <a class="filters__button filters__button--<?=$type['icon_name']; ?> <?= $content_type === $type['id'] ? 'filters__button--active' : '' ?> button" href="index.php?type=<?=$type['id'];?>">
                    <span class="visually-hidden"><?=$type['content_name']; ?></span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-<?=$type['icon_name']; ?>"></use>
                        </svg>
                    </a>
                </li>
                
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="popular__posts">
        <?php foreach ($posts as $index => $post) : ?>
            <article class="popular__post post <?=$post['content_name'];?>">

                <header class="post__header">
                    <h2>
                        <!--здесь заголовок-->
                        <a href="post.php?id=<?= $post['post_id'] ?>"><?= $post['post_title']; ?></a>
                    </h2>
                </header>

                <div class="post__main">
                    <!--здесь содержимое карточки-->
                    <?php if ($post['content_name'] === 'Цитата') : ?>
                        <!--содержимое для поста-цитаты-->
                        <blockquote>
                            <p>
                                <!--здесь текст-->
                                <?=$post['post_content'];?>
                            </p>
                            <cite><?=$post['user_login'];?></cite>
                        </blockquote>            
                    <?php endif ; ?>

                    <?php if ($post['content_name'] === 'Фото') : ?>
                        <!--содержимое для поста-фото-->
                        <div class="post-photo__image-wrapper">
                            <img src="img/<?=$post['post_image'];?>" alt="Фото от пользователя" width="360" height="240">
                        </div>
                    <?php endif; ?>

                    <?php if ($post['content_name'] === 'Ссылка') : ?>
                        <!--содержимое для поста-ссылки-->
                        <div class="post-link__wrapper">
                            <a class="post-link__external" href="http://<?=$post['post_content'];?>" title="Перейти по ссылке">
                                <div class="post-link__info-wrapper">
                                    <div class="post-link__icon-wrapper">
                                        <img src="https://www.google.com/s2/favicons?domain=vitadental.ru" alt="Иконка">
                                    </div>
                                    <div class="post-link__info">
                                        <h3>
                                            <!--здесь заголовок-->
                                            <?=$post['post_title'];?>
                                        </h3>
                                    </div>
                                </div>
                                <span>
                                    <!--здесь ссылка-->
                                    <?=$post['post_content'];?>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($post['content_name'] === 'Текст') : ?>
                        <!--содержимое для поста-текста-->
                        <div class="post-details__image-wrapper post-text">
                            <div class="post__main">
                                <p>
                                    <!--здесь текст-->
                                    <!--Вызов функции обрезания текста-->
                                    <?php if (mb_strlen($post['post_content']) > 300): ?>
                                        <?= textCut($post['post_content']); ?>...
                                        <p><a href="#">Читать далее</a>
                                    <?php else: ?>
                                        <?= textCut($post['post_content']); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?> 

                    <?php if ($post['content_name'] === 'Видео') : ?>
                        <!--содержимое для поста-видео-->
                        <div class="post-video__block">
                            <div class="post-video__preview">
                                <?=embed_youtube_cover($post['post_video']); ?>
                                <!--<img src="img/coast-medium.jpg" alt="Превью к видео" width="360" height="188">-->
                            </div>
                            <a href="<?=$post['post_video'];?>" class="post-video__play-big button">
                                <svg class="post-video__play-big-icon" width="14" height="14">
                                    <use xlink:href="#icon-video-play-big"></use>
                                </svg>
                                <span class="visually-hidden">Запустить проигрыватель</span>
                            </a>
                        </div>
                    <?php endif; ?> 

                </div>
                
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="Автор">
                            <div class="post__avatar-wrapper">
                                <!--укажите путь к файлу аватара-->
                                <img class="post__author-avatar" src="img/<?=$post['avatar'];?>" alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><!--здесь имя пользоателя--><?=$post['user_login'];?></b>
                                <time class="post__time" datetime="<?=$postDate;?>" title = "<?=date("d.m.Y H:i:s", strtotime($postDate))?>">
                                    <?php
                                        $currentDate = date('d.m.Y H:i:s') ;
                                        $postDate = generate_random_date($index) ;
                                        $diff = strtotime($currentDate) - strtotime($postDate) ;
                                        
                                        if ($diff/60 < 60) {
                                            echo ceil($diff/60) . " " . get_noun_plural_form($diff/60, "минута", "минуты", "минут") . " назад" ;
                                        } else if (($diff/60 >= 60) && ($diff/3600 < 24)) {
                                            echo ceil($diff/3600) . " " . get_noun_plural_form($diff/3600, "час", "часа", "часов") . " назад" ;
                                        } else if (($diff/3600 >= 24) && ($diff/86400 < 7)) {
                                            echo ceil($diff/86400) . " " . get_noun_plural_form($diff/86400, "день", "дня", "дней") . " назад" ;
                                        } else if (($diff/86400 >= 7) && ($diff/604800 < 5)) {
                                            echo ceil($diff/604800) . " " . get_noun_plural_form($diff/604800, "неделя", "недели", "недель") . " назад" ;
                                        } else if ($diff/604800 >= 5) {
                                            echo ceil($diff/2600000) . " " . get_noun_plural_form($diff/2600000, "месяц", "месяца", "месяцев") . " назад" ;
                                        }
                                    ?>
                                </time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        <?php endforeach; ?>
    </div>
</div>