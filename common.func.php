<?php 

/**
 * alert mes then location.href
 * @param string $mes
 * @param string $url
 */
function alertMes($mes,$url){
	echo "<script type='text/javascript'>alert('{$mes}');</script>";

	if($url) {
		echo "<script type='text/javascript'>location.href='{$url}';</script>";
	}

}

/**
 * get Extension
 * @param string $filename
 * @return string
 */
function getExt($filename) {
	return strtolower( pathinfo($filename,PATHINFO_EXTENSION) );
}

/**
 * get UniqidName
 * @param int $length
 * @return string
 */
function getUniqidName($length=10) {
	return substr( md5(uniqid(microtime(true),true)),0,$length );
}
