<!-- пост-цитата -->
<div class="post-details__image-wrapper post-quote">
	<header class="post__header">
		<h2><p><?=$title;?></p></h2>
	</header>
	<div class="post__main">
		<blockquote>
		  <p>
			<?=$text;?>
		  </p>
		  <cite><?=$author;?></cite>
		</blockquote>
	</div>
	<footer class="post__footer">
      <div class="post__author">
        <div class="post__avatar-wrapper">
          <img class="post__author-avatar" src="img/<?=$user_avatar;?>" alt="Аватар пользователя"></p>
        </div>
        <p><?=$user_login;?></p>
      </div>
	</footer>
</div>