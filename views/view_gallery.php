
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
				<? if ( count ( $error_message ) ): ?>
				<? echo implode ( '<br>', $error_message ); ?>
				<? else : ?>
				
				<script type="text/javascript" src="/javascripts/jquery.js"></script>
				<script type="text/javascript" src="/javascripts/jquery.lightbox-0.5.js"></script>
				<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
				
			    <script type="text/javascript">
			    $(function() {
			        $('#gallery a').lightBox();
			    });
			    </script>
			   	<style type="text/css">
				/* jQuery lightBox plugin - Gallery style */
				#gallery {
					background-color: #E1E1E1;
					padding: 0px;
					width: 450px;
				}
				#gallery ul { list-style: none; }
				#gallery ul li { display: inline; }
				#gallery ul img {
					border: 5px solid #3e3e3e;
					border-width: 5px 5px 20px;
				}
				#gallery ul a:hover img {
					border: 5px solid #fff;
					border-width: 5px 5px 20px;
					color: #fff;
				}
				#gallery ul a:hover { color: #fff; }
				</style>
								
				
				<div id="gallery">
				<ul>
				<? $i = 0; ?>
				<? foreach ( $ImagesArr AS $image ):?>
					<li>
						<a href='/galleries/<?= $directory?>/<?= $image?>' title="Href descr <?= $i?>."><img src='/galleries/<?= $directory?>/thumbs/<?= $image?>' alt='Descr here <?= $i?>'/></a>
					</li>
				<? endforeach;?>
				
				</ul>
				</div>
				
				<? endif;?>
					
				
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
