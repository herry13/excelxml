<?php

include_once("ExcelXML.php");

// source file
$input = "blank.xml"; 
// output file
$output = "result.xml"; 

// create ExcelXML object
$xml = new ExcelXML();
// read template file
if (!$xml->read($input))
{
	echo "Failed to open file<br>";
}
else
{
	// activate a worksheet
	$xml->setActiveWorksheetByIndex(0);
	// get cell value
	echo $xml->getCellValue("A1") . "<br>";
	// set cell value
	if ($xml->setCellValue("AB2", "6789"))
		echo "Succeed to set new cell's value<br>";
	else
		echo "Failed to set new cell's value<br>";
	
	// save modified file to output file
	if (!$xml->save($output))
		echo "Failed to save file<br>";
	else
		echo "Succeed to save file<br>";

	/** uncomment following codes, so client can download Excel (*.xls) file **/
	//if (!$xml->save($output, true, 'output.xls'))
	//	echo "Failed to download file<br>";
}

?>