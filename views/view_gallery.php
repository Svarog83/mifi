
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
				
<script type="text/javascript" src="/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="/highslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/highslide/highslide-ie6.css" />
<![endif]-->



<!--
    2) Optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
hs.graphicsDir = '/highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.fadeInOut = true;
hs.dimmingOpacity = 0.8;
hs.outlineType = 'rounded-white';
hs.captionEval = 'this.thumb.alt';
hs.marginBottom = 105; // make room for the thumbstrip and the controls
hs.numberPosition = 'caption';

// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 3000,
	repeat: false,
	useControls: true,
	overlayOptions: {
		className: 'text-controls',
		position: 'bottom center',
		relativeTo: 'viewport',
		offsetY: -60
	},
	thumbstrip: {
		position: 'bottom center',
		mode: 'horizontal',
		relativeTo: 'viewport'
	}
});
</script>
				<div class="highslide-gallery" style="width: 600px; margin: auto">
				<? $i = 0; ?>
				<? foreach ( $ImagesArr AS $image ):?>
				
				<a class='highslide' href='/galleries/<?= $directory?>/<?= $image?>' onclick="return hs.expand(this)">
				<img src='/galleries/<?= $directory?>/thumbs/<?= $image?>' alt='Mountain valley <?= $i?>'/></a>
				
				<? $i++; if ( $i % 4 == 0 ) echo '<br>'; ?>
				<? endforeach;?>
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
