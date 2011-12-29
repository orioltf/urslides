<?php
	define ("APP_PATH", dirname(__FILE__));
	define ("SLIDES_PATH", APP_PATH . "/slides/");
	
	function populateArryOfFiles($dirName, &$filesArray) {
		if ( !is_dir($dirName) ) return false;
		
		$dirHandle = opendir($dirName);
		while ( ($incFile = readdir($dirHandle)) !== false ) {
			if ( preg_match("!^.+\.html$!i", $incFile) && is_file("$dirName/$incFile") )
				$filesArray[] = preg_replace("!\.html$!i", "", $incFile);
		}

		closedir($dirHandle);
		natcasesort($filesArray);
		$filesArray = array_values($filesArray);
		return true;
	}

	$filesArray = array();
	if ( populateArryOfFiles(SLIDES_PATH, $filesArray) )
		include_once 'tenslide.html';
	else
		echo "ERROR LOADING SLIDES";
	
?>
