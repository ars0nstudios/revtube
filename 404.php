<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>clipIt</title>
	<link rel="icon" type="image/x-icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/404.css">
</head>

  <body>
    <main class="yt-main">
<div class="not-found">
  <div class="not-found-content">
    <!-- janky ig? -->
    <img class="not-found-content__image" src="/assets/img/404/<?php echo rand(1, 5) ?>.png" alt="It's Revoozie!">

      <p class="not-found-content__paragraph">This page isn't available. Sorry about that.</p>
      <p class="not-found-content__paragraph">Try searching for something else.</p>

    <div class="not-found-search">
      <a class="not-found-search__container" href="/" title="clipIt">
		<img class="logost not-found-search__logo" src="/assets/img/clipItnew.png">
      </a>

      <form id="search-form" lb-auto-init="NotFoundSearchForm" class="not-found-search__form js-search-form lb--initialized" action="javascript:void(0);">
        <div class="not-found-search__field">
          <input class="not-found-search__input" type="text" aria-label="Search" autocomplete="off" name="textInput" title="Search" placeholder="Search">
        </div>
        <button id="search-btn" class="not-found-search__search-button" type="submit" aria-label="Search">
          <span class="not-found-search__search-icon"></span>
        </button>
      </form>
    </div>
  </div>
</div>    </main>
    

  

</body>
</html>