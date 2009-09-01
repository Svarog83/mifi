<?
/**
 * Cleans text
 *
 * @param string $text - text whiche needs to be cleaned
 * @param int $rep_quot - if necessary to change quotes
 * @param int $rep_new_line - if necessary to change new lines
 * @return string
 */

function CleanText( $text, $rep_quot = 1, $rep_new_line = 1 )
{
	$text	= str_replace( "\\", "", $text );
	
	if ( $rep_quot )
		$text = htmlspecialchars( $text, ENT_QUOTES );
		
	if ( $rep_new_line )
		$text = str_replace( "\n", "<br>", str_replace ( "\r", "", $text ) );
		
	$text = str_replace( array( '&lt;', '&gt;', '&amp;' ), array( '<', '>', '&' ), $text );
		
	return $text;
}

/**
 * Explodes string by :: and removes :
 *
 * @param string $str
 * @return array
 */
function GetArrFromColonString ( $str )
{
	$arr = array();
	if ( $str )
		$arr = explode ( '::', trim( $str, ':' ) );
		
	return $arr;
}

/**
 * Prepares array for inserting to DB by imploding by ::
 *
 * @param array $arr
 * @return string
 */
function FromArrToColonString ( $arr )
{
	$str = '';
	if ( is_array ( $arr ) )
		if ( count ( $arr ) )
			$str = ':' . implode ( '::', $arr ) . ':';
		
	return $str;
}

/**
 * Returns str for DB query like 
 *         " ( name LIKE ('%:1:%') || name LIKE ('%:2:%')  || name LIKE ('%:3:%')) "
 *
 * @param string $f - name of field in DB table
 *
 */

function depsUserLike ( $f ) {

global $DepUA;

$a = " ( ". $f ." LIKE '%:". implode( ":%' || ". $f ." LIKE '%:", $DepUA ) .":%' )";
return $a;


}
/**
 * Receives array and prepares select tag
 *
 * @param array $arr
 * @return string
 */

function PrepareSelect( $arr )
{
	$select_1 = '<select name="'. ( $arr['field_name'] ) .'"  '.  
				( $arr['multiple']	? ' multiple size="' . $arr['size'] . '"' : '' ) .
				( $arr['onchange']	? ' onChange="' . $arr['onchange'] . '"' : '' ) . 
				( $arr['onfocus']	? ' onFocus="' . $arr['onfocus'] . '"' : '' ) . 
				( $arr['onblur']	? ' onBlur="' . $arr['onblur'] . '"' : '' ) . 
				( $arr['add_str']	?  $arr['add_str']  : '' ) .'>';
	
				if ( $arr['show_select_title'] ) 
				    $select_1 .= '<option value="">'. ( $arr['show_select_title'] );
				
				foreach ( $arr['select_values'] AS $key => $val )
					$select_1 .= '<option value="' . ( $key ) . '" ' . ( $key == $arr['selected_value'] && isset( $arr['selected_value'] ) ? ' selected' : '' ) .
					( $key == 'empty' || strpos( $key, 'sub_' ) !== false ? ' style="background-color: '. ( $key == 'empty' ? $bg_select_empty : 'pink' ) .';"' : '' ) .
					'>' . ( $val ) . '';
				
				$select_1 .= '</select>';
				
				return $select_1;
}

function flip_vars( $a )
{
	$trans = array ( "&lt;" => "<", "&gt;" => ">", "&amp;" => "&", "&#039;" => "'", "&quot;" => '"', "<br>" => "\n", "</br>\n" => "\n", "</br>" => "\n", "\n<br>" => "\n" );

	$a = strtr($a,$trans);

	return $a;
}


function check_vars( $a )
{
	$trans = array ( "<" => "&lt;", ">" => "&gt;", '&amp;' => "&", '"' => "&quot;",  "'" => "&#039;", "\n" => "<br>", "\r" => "" );

	$a = strtr($a,$trans);

	return $a;

}

function post_var_edit_final( $data = '', $replace_slash = 0 )
{
	if( !$data )
	{
		$data	    = $_REQUEST;
		$first_iter = TRUE;
	}
	else
		$first_iter = FALSE;
	foreach( $data as $k => $v )
	{
		
		
		if( $first_iter )
			global $$k ;

		if( is_array( $v ) && !$first_iter)
			$data[$k]	= post_var_edit_final( $v, $replace_slash );
		elseif( is_array( $v ) && $first_iter )
			$$k	= post_var_edit_final( $v, $replace_slash );
		elseif( !is_array( $v ) && !$first_iter)
		{
			$v	= check_vars( stripcslashes( $v ) );
			$v	= str_replace ( "&lt;br&gt;", "<br>", $v );
			
			$data[$k]	= str_replace( "\n", "", $v );
			/*if ( $replace_slash )
				$data[$k]	= str_replace( "\\", "\\\\", $v );*/
		}
		elseif( !is_array( $v ) && $first_iter )
		{
			$v	= check_vars( stripcslashes( $v ) );
			$v	= str_replace ( "&lt;br&gt;", "<br>", $v );
			
			$$k	= str_replace( "\n", "", $v );
			/*if ( $replace_slash )
				$$k	= str_replace( "\\", "\\\\", $v );*/
		}

	}
	if ( !$first_iter )
		return $data;
}

function flip_vars_small( $a )
{
	$trans = array ( "&nbsp;" => " ", "&lt;" => "<", "&gt;" => ">", "&amp;" => "&", "&#039;" => "'", "&quot;" => '"' );

	$a = strtr($a,$trans);

	return $a;
}

function SetSessionData( $user_id, $setup_secret_word )
{
	$_SESSION['user_id'] = $user_id;
	$_SESSION['timeout'] = time();
	$_SESSION['ip'] 	 = $_SERVER['REMOTE_ADDR'];
	$_SESSION['hash'] 	 = md5 ( $user_id . $_SESSION['timeout'] . $_SERVER['REMOTE_ADDR'] . $setup_secret_word );
	
	global $user_authorized;
	$user_authorized = true;
	
	return true;
	
	/*echo '<br>user_id = ' . $user_id . '<br><br>';
	echo '<br>timeout = ' . $_SESSION['timeout'] . '<br><br>';
	echo '<br>REMOTE_ADDR = ' . $_SERVER['REMOTE_ADDR'] . '<br><br>';
	echo '<br>$setup_secret_word = ' . $setup_secret_word . '<br><br>';*/
	
}

/**
 * Draws a button (needs to include /OMSMain/incl/css_forms_buttons.php before using this function)
 *
 * @param string	$caption        Value
 * @param string	$onClick        Onclick
 * @param string	$img            path to img(/icon/button.gif)
 * @param mixed		$type           type = FALSE/0 for background buttons, type = TRUE/1 for fieldset buttons
 * @param string	$title          Title
 * @param mixed		$is_submit      type = FALSE/0 for submit buttons, type = TRUE/1 for simple buttons
 * @param string	$add_string     additional code that can be added into the <input> tag
 * @param string	$button_id      id of buttons for any actions with buttons
 * @param string	$button_dis     TRUE/1 - button disabled, FALSE/0 - otherwards
 */

function DrawButton(
$caption,
$onClick,
$img		= '/icon/button.gif',
$type		= FALSE,
$title		= '',
$is_submit	= FALSE,
$add_string = '',
$button_id	= '',
$button_dis	= ''
)

{
	global $color_body_hlt, $bg_fset;
    $caption  = str_replace( '&nbsp;', '', trim( $caption ));

    $limit  = 30;
    $len    = strlen( $caption );

    if( $len < $limit )
    {
        if( $len < 13 )
            $limit = 18;

        $tmp        = ceil( ( $limit - $len )/2 );
        $caption    = str_repeat( ' ', $tmp ) . $caption . str_repeat( ' ', $tmp ) ;
    }

?>
		<input class="button_on" type="<?= $is_submit ? 'submit' : 'button' ?>" <?= $add_string ?>
		value="<?= $caption ?>"<?= $button_id ? ' id="'. $button_id .'"' : '' ?><?= $button_dis ? ' disabled' : '' ?><?= $title ? ' title="'. $title .'"' : '' ?> style="cursor:pointer; background-image: url(<?= $img ?>); background-position: 2 center; padding-left: 20px; height: 26px; border-width: 1px;" onmouseover="this.style.color='red'"; onmouseout="this.style.color='black';" 
		<?= $onClick ? 'onClick="'. $onClick .'"' : '' ?>>

<?

}

function getRoles()
{
	$RolesArr  = array();
	$query = "SELECT * FROM role ORDER BY role_name";
	$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
	while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
	    $RolesArr[$row['role_name']] = $row['role_name'];
	    
	return $RolesArr;
}
