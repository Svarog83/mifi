<?
$user_authorized = false;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/config_main.php' );

if ( $todo != 'login' && $todo != 'not_login' )
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/check_security.php' );

$dir_views = './views/';
$dir_controllers = './controllers/';

if ( !$todo && !$user_authorized )
    $todo = 'not_login';
else if ( !$todo && $user_authorized )
	$todo = 'list_users';

$actions_arr  = array();
$action['not_login']['cont'] = 'not_login.php';
$action['not_login']['view']  = 'not_login.php';

$action['login']['cont'] = 'login.php';
$action['login']['view']  = 'login.php';

$action['list_users']['cont'] = 'list_users.php';
$action['list_users']['view']  = 'list_users.php';

$action['user_edit']['cont'] 	= 'user_edit.php';
$action['user_edit']['view']  	= 'user_edit.php';

$action['user_save']['cont'] 	= 'user_save.php';
$action['user_save']['view']  	= 'user_save.php';

$controller = $action[$todo]['cont'];
$view       = $action[$todo]['view'];

if ( $controller && file_exists( $dir_controllers . $controller ) )
    require_once( $dir_controllers . $controller );

$links_line = ' <a href="index.php">Главная страница</a> | <a href="index.php?todo=exit">Выйти</a> | <br>';

if ( isset ( $no_links ) && $no_links )
	$links_line = '';

require_once( 'header.php' );

//for debugging
if ( $local_server )
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/dBug.php' );  

if ( isset ( $action[$todo] ) && file_exists( $dir_views . $view ) )
    $file_name = $dir_views . $view;
else 
    $file_name = $dir_views . 'wrong_action.php';
   
require_once( $file_name );

require_once( 'footer.php' );