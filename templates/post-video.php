<!-- пост-видео -->
<header class="post__header">
    <h2>
        <!--здесь заголовок-->
        <?=$title;?>
    </h2>
 </header>
<div class="post-details__image-wrapper post-photo__image-wrapper">
  <?=$content; ?>
  <p><?=embed_youtube_video($video); ?>
</div>

<footer class="post__footer">
    <div class="post__author">
      <div class="post__avatar-wrapper">
        <img class="post__author-avatar" src="img/<?=$user_avatar;?>" alt="Аватар пользователя"></p>
      </div>
      <p><?=$user_login;?></p>
    </div>
 </footer>