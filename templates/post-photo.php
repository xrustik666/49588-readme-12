<!-- пост-изображение -->
<header class="post__header">
    <h2>
        <!--здесь заголовок-->
		<?=$title;?>
	</h2>
</header>

<div class="post-details__image-wrapper post-photo__image-wrapper">
	<img src="<?=$umg_url;?>" alt="Фото от пользователя" width="760" height="507">
</div>

<footer class="post__footer">
      <div class="post__author">
        <div class="post__avatar-wrapper">
          <img class="post__author-avatar" src="img/<?=$user_avatar;?>" alt="Аватар пользователя"></p>
        </div>
        <?=$user_login;?></p>
      </div>
</footer>