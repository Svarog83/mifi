<?
$TeamsArr  = array();
$query = "SELECT t_id, t_name FROM team WHERE 1 ORDER BY t_name";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
    $TeamsArr[$row['t_id']] = $row['t_name'];
    
    