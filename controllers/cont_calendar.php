<?
$query = "SELECT game.* FROM game, team WHERE g_team = t_id && t_activ = 1 ORDER BY g_date_time";

$MatchesArr  = array();
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$MatchesArr[] = $row;
}

$TeamsArr = getTeams();