<?php

function passeio_meta_or( $metas, $key, $holder ){
	if( isset($metas[$key]) ){
		if( is_array($metas[$key]) ){
			printf($holder, $metas[$key][0]);
		}
		else{
			printf($holder, trim($metas[$key]));
		}
	}
}