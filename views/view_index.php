<? $component_name = 'navigation'; include( 'include_component.php' ); ?>

<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				<? $component_name = 'games'; include( 'include_component.php' ); ?>
			</ul>
		</div>
		
		<!-- start content -->
		<div id="content">
			<div class="post">
				<h1 class="title">Привет<?= isset ( $UA['user_name'] ) ? ', ' . $UA['user_name'] : ''?>!</h1>
				<div class="entry">
					<p>Тебе повезло, ты попал на сайт команды МИФИ. Здесь можно посмотреть календарь матчей, фотографии. А самое главное - надо войти под своим именем и отметиться на будущие игры! По поводу всех вопросов пишите на S.Vetko@fcmifi.ru</p>
				</div>
			</div>
		</div>
		<!-- end content -->
		
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar" name="form">
			<ul>
				<? $component_name = 'login'; include( 'include_component.php' ); ?>
			</ul>
		</div>
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
