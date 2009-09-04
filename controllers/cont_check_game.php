<?
if ( !checkRights ( array ( 'user' ) ) ) redirect( '/no_admission/' );

$select_game = (int)$GLOBAL_PARAMS[1];

$error_message = array();

$query = "SELECT * FROM game WHERE g_id = '" . $select_game . "'";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
$GA = mysql_fetch_array ( $result, MYSQL_ASSOC );
if ( !$GA )
	$error_message[] = 'Такая игра не найдена!';
else 
{
	$MA = array();

	$query = "SELECT * FROM game_user_link WHERE gul_user = '" . $UA['user_id'] . "' && gul_game = '" . $select_game . "'";
	$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
	$MA = mysql_fetch_array ( $result, MYSQL_ASSOC );
}
