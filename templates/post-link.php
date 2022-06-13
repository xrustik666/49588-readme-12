<!-- пост-ссылка -->
<header class="post__header">
    <h2>
        <!--здесь заголовок-->
        <?=$title;?>
    </h2>
</header>
<div class="post__main">
  <div class="post-link__wrapper">
    <a class="post-link__external" href="http://<?=$url;?>" title="Перейти по ссылке">
      <div class="post-link__info-wrapper">
        <div class="post-link__icon-wrapper">
          <img src="https://www.google.com/s2/favicons?domain=<?=$url;?>" alt="Иконка">
        </div>
        <div class="post-link__info">
          <h3><?=$title;?></h3>
        </div>
      </div>
    </a>
  </div>
</div>
<footer class="post__footer">
      <div class="post__author">
        <div class="post__avatar-wrapper">
          <img class="post__author-avatar" src="img/<?=$user_avatar;?>" alt="Аватар пользователя"></p>
        </div>
        <p><?=$user_login;?></p>
      </div>
</footer>