<!-- пост-текст -->
<div class="post-details__image-wrapper post-text">
  <header class="post__header">
    <h2><p><?=$title;?></p></h2>
  </header>

  <div class="post__main">
    <p><?=$content;?></p>
  </div>

  <footer class="post__footer">
      <div class="post__author">
        <div class="post__avatar-wrapper">
          <img class="post__author-avatar" src="img/<?=$user_avatar;?>" alt="Аватар пользователя"></p>
        </div>
        <?=$user_login;?></p>
      </div>
  </footer>
 
</div>