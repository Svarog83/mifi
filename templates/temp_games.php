	<li>
		<h2>Ближайшие матчи</h2>
		<ul>
			<? foreach ( $MatchesArr AS $row ): ?>
			
			<li><?= getTeamName( $row['g_team'] ) . ' ' . date ( "Y-m-d H:i", strtotime ( $row['g_date_time'] ) ) ?>
			<? if ( isset ( $MarksArr[$row['g_id']] ) ) : ?>
			<img src="/icon/button.gif" title="Отметился">
			<? else : ?>
			<img src="/icon/exit.gif" title="Еще не отметился">
			<? endif; ?>
			
			</li>
			<? endforeach; ?>
		</ul>
	</li>
