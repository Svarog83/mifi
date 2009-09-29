
<? $component_name = 'navigation'; include( 'include_component.php' ); ?>
 
<!-- end header -->
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
				<h1 class="title">Фотографии</h1>
				<div class="entry">
					Посмотреть можно по ссылке <a href="http://gallery.vetko.net/Football-2009" target="_blank">Матч с командой Спарта-2</a>
					<br>
					<br>
					
					<a href="/gallery/sparta2009/">Матч против Спарта-2</a>
					
					* Доступ к фотографиям Ринатоса - только по платной подписке. Обращайтесь:)

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
