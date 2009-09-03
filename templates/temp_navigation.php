<div id="header">
	<div id="menu">
		<ul id="main">
			<li <?= $todo == 'index' ? 'class="current_page_item"' : ''?>><a href="/">Домой</a></li>
			<li <?= $todo == 'calendar' ? 'class="current_page_item"' : ''?>><a href="/calendar/">Календарь</a></li>
			<li <?= $todo == 'photo' ? 'class="current_page_item"' : ''?>><a href="/photo/">Фотографии</a></li>
			<li <?= $todo == 'forum' ? 'class="current_page_item"' : ''?>><a href="/forum/">Форум</a></li>
		</ul>
	</div>
	<div id="logo">
		<h1><span>МИФИ </span></h1>
		<p>Футбольные боги</p>
	</div>
	<div id="time">
	<p>Сегодня: <?= date ( "Y-m-d" ) ?></p>
	</div>
</div>