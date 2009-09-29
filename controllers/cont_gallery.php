<?
$error_message = array();
$directory = preg_replace( "/[^0-9a-z_\-]/i", "", $GLOBAL_PARAMS[1] );

$path_full =  $_SERVER['DOCUMENT_ROOT'] . '/galleries/' . $directory . '/';
$path_thumbs = $_SERVER['DOCUMENT_ROOT'] . '/galleries/' . $directory . '/thumbs/';

$ImagesArr = array();
if ( is_dir( $path_full ) && is_dir( $path_thumbs ) )
{
	 if ( $dh = opendir ( $path_full ) ) 
	 {
        while ( ( $file = readdir( $dh ) ) !== false) 
        {
            if ( is_file( $path_full . $file ) && is_file( $path_thumbs .$file ) )
            	$ImagesArr[] = $file;
        }
        closedir($dh);
     }
}

if ( !count ( $ImagesArr ) )
	$error_message[] = 'Такая галерея не найдена';
