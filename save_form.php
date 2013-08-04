<?php
require_once("connect.php");

function mysql_fix_string($string)
{
  return addslashes($string);
}

$oracle = $_POST['oracle'];
$css = $_POST['css'];
$libx = $_POST['libx'];
$googledrive = $_POST['googledrive'];
$notepadplus = $_POST['notepadplus'];
$html = $_POST['html'];
$filezilla = $_POST['filezilla'];
$javascript = $_POST['javascript'];
$php = $_POST['php'];
$mysql = $_POST['mysql'];



$query = "INSERT INTO toolTable (oracle, css, libx, googledrive, notepadplus, html, filezilla, javascript, php, mysql)
                        VALUES ($oracle, $css, $libx, $googledrive, $notepadplus, $html, $filezilla, $javascript, $php, $mysql)";


$result = mysql_query($query) or die(" ".mysql_error());

if ($result)
	echo "Data save successfully!!!";
else
	echo "There was a problem while saving the data";

$queryData = "SELECT id, oracle, css, libx, googledrive, notepadplus, html, filezilla, javascript, php, mysql FROM toolTable";

$resultsData = mysql_query($queryData) or die(" ". mysql_error());

echo "<br />";

?>

<table border="1" text-align="center">
		<tr >
			<th width="20">ID</th>
			<th width="40">Oracle</th>
			<th width="40">CSS</th>
			<th width="40">LibX</th>
			<th width="40">Google Drive</th>
			<th width="40">Notepad++</th>
			<th width="40">HTML</th>
			<th width="40">FileZilla</th>
			<th width="40">JavaScript</th>
			<th width="40">PHP</th>
			<th width="40">MySQL</th>
		</tr>

<?php
while ($line = mysql_fetch_array($resultsData, MYSQL_ASSOC))
	{
		$idDB = $line['id'];
		$oracleDB = $line['oracle'];
		$cssDB = $line['css'];
		$mysqlDB = $line['mysql'];
		$libxDB = $line['libx'];
		$googledriveDB = $line['googledrive'];
		$notepadplusDB = $line['notepadplus'];
		$htmlDB = $line['html'];
		$filezillaDB = $line['filezilla'];
		$javascriptDB = $line['javascript'];
		$phpDB = $line['php'];
		
			
		echo "<tr>
		    <td>$idDB</td>
			<td>$oracleDB</td>
			<td>$cssDB</td>		
			<td>$libxDB</td>
			<td>$googledriveDB</td>
			<td>$notepadplusDB</td>
			<td>$htmlDB</td>
			<td>$filezillaDB</td>
			<td>$javascriptDB</td>
			<td>$phpDB</td>
			<td>$mysqlDB</td>
		</tr>";			
	}

echo "</table>";


echo "<br />";
$queryTotal = "SELECT SUM(oracle) as sumOracle, AVG(oracle) as avgOracle,
SUM(css) as sumCSS, AVG(css) as avgCSS,
SUM(libx) as sumLibx, AVG(libx) as avgLibx,
SUM(googledrive) as sumGoogledrive, AVG(googledrive) as avgGoogledrive, 
SUM(notepadplus) as sumNotepadplus, AVG(notepadplus) as avgNotepadplus,
SUM(html) as sumHtml, AVG(html) as avgHtml,
SUM(filezilla) as sumFilezilla, AVG(filezilla) as avgFilezilla,
SUM(javascript) as sumJavascript, AVG(javascript) as avgJavascript,
SUM(php) as sumPhp, AVG(php) as avgPhp,
SUM(mysql) as sumMysql, AVG(mysql) as avgMysql
FROM toolTable";


$resultsTotal = mysql_query($queryTotal) or die(" ". mysql_error());

if ($line = mysql_fetch_array($resultsTotal, MYSQL_ASSOC))
{
	echo "The overall sum of <font color='blue'>Oracle</font> in this Database is: <strong>".$line['sumOracle']."</strong> The average of <font color='blue'>Oracle</font> scores in this Database is:   <strong>".$line['avgOracle']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='green'>CSS</font> in this Database is: <strong>".$line['sumCSS']."</strong> The average of <font color='green'>CSS</font> scores in this Database is:   <strong>".$line['avgCSS']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='navy'>LibX</font> in this Database is: <strong>".$line['sumLibx']."</strong> The average of <font color='navy'>Libx</font> scores in this Database is:   <strong>".$line['avgLibx']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='red'>Google Drive</font> in this Database is: <strong>".$line['sumGoogledrive']."</strong> The average of <font color='red'>Google Drive</font> scores in this Database is:   <strong>".$line['avgGoogledrive']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='maroon'>Notepad++</font> in this Database is: <strong>".$line['sumNotepadplus']."</strong> The average of <font color='maroon'>Notepad++</font> scores in this Database is:   <strong>".$line['avgNotepadplus']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='gray'>HTML</font> in this Database is: <strong>".$line['sumHtml']."</strong> The average of <font color='gray'>HTML</font> scores in this Database is:   <strong>".$line['avgHtml']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='purple'>FileZilla</font> in this Database is: <strong>".$line['sumFilezilla']."</strong> The average of <font color='purple'>FileZilla</font> scores in this Database is:   <strong>".$line['avgFilezilla']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='olive'>JavaScript</font> in this Database is: <strong>".$line['sumJavascript']."</strong> The average of <font color='olive'>JavaScript</font> scores in this Database is:   <strong>".$line['avgJavascript']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='teal'>PHP</font> in this Database is: <strong>".$line['sumPhp']."</strong> The average of <font color='teal'>PHP</font> scores in this Database is:   <strong>".$line['avgPhp']."</strong>";
	echo "<br />";
	echo "The overall sum of <font color='lime'>MySQL</font> in this Database is: <strong>".$line['sumMysql']."</strong> The average of <font color='lime'>MySQL</font> scores in this Database is:   <strong>".$line['avgMysql']."</strong>";
		
}

?>
