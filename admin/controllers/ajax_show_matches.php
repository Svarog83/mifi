<?

$query = "SELECT * FROM game WHERE ";

if ( $select_team )
	$query .= "g_team = '$select_team' && ";
	
$query .= " 1";

$MatchesArr  = array();
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$MatchesArr[] = $row;
}