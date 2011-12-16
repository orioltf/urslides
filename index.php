<?php
	define ("APP_PATH", dirname(__FILE__));
	define ("SLIDES_PATH", APP_PATH . "/slides/");
	
	function populateArryOfFiles($dirName, &$filesArray) {
		if(!is_dir($dirName)) return false;
		
		$dirHandle = opendir($dirName);
		while (false !== ($incFile = readdir($dirHandle))) {
			if ($incFile != "." && $incFile != "..") {
				if (is_file("$dirName/$incFile")) {
					//$ext = end(explode('.', $incFile)); //returns Strict warn
					$ext = substr(strrchr($incFile, '.'), 1);
					$filesArray[] = basename($incFile, '.'.$ext);
				}
				//elseif (is_dir("$dirName/$incFile"))	$filesArray[] = $incFile;
			}
		}
		closedir($dirHandle);
	}
	
	function includeRecurse($dirName) {
		if(!is_dir($dirName)) return false;
		
		$dirHandle = opendir($dirName);
		while (false !== ($incFile = readdir($dirHandle))) {
			if ($incFile != "." && $incFile != "..") {
				if (is_file("$dirName/$incFile")) include_once("$dirName/$incFile"); 
				//elseif (is_dir("$dirName/$incFile"))	includeRecurse("$dirName/$incFile");
			}
		}
		closedir($dirHandle);
	}
	
	populateArryOfFiles(SLIDES_PATH,$filesArray);
	include_once 'tenslide.html';
	
?>
