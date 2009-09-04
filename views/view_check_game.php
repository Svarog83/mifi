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
				<h1 class="title">Отметиться</h1>
				<div class="entry">
				<? if ( count ( $error_message ) ): ?>
				<?= implode ( '<br>', $error_message ); ?>
				<? else: ?>
				Игра с <b><?= getTeamName( $GA['g_team']) ?></b> в <b><?= $GA['g_date_time'] ?></b>
				<br>

				<form id="searchform" method="post" action="/save_check_game/" name="form">
				<input type="hidden" name="select_game" value="<?= $select_game?>">
				<div>
					Буду?<br>
					 <input type="radio" name="form_go" value="1" <?= isset( $MA['gul_go'] ) && $MA['gul_go'] ? ' checked' : ''?> /> Да<br>
					 <input type="radio" name="form_go" value="0" <?= isset( $MA['gul_go'] ) && !$MA['gul_go'] ? ' checked' : ''?> /> Нет<br>
					 
					  Комментарии<br>
					<input type="text" name="form_remarks" id="s" size="15" value="<?= $MA['gul_remarks']?>" /><br>
					 
					<input type="button" value="Отметиться" class="buttons" onclick="submit_form();">
				</div>
			</form>
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

<script language="JavaScript">
<!--
function submit_form()
{
	var checked = 0;
	var obj = document.form.form_go;
	
	for ( var i = 0; i < obj.length; i++ )
	{
		if ( obj[i].checked )
		{
			checked = true;
			break;
		}
	}
	
	if ( !checked )
	{
		alert ( 'Надо выбрать хоть один пункт' );
		return false;
	}
	
	document.form.submit();
}
//-->
</script>