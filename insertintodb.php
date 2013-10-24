/*this php script is used to populate a table 'final' in database 'database' with words and corrosponding hashes of those words*/
<?php
set_time_limit(30000); 
$con = mysql_connect("localhost","root","");		 /*connection to the server="localhost" username="root" and password=""*/
if(!$con)
{
	die("couldnot connect: ".mysql_error());
}
mysql_select_db("dictionary",$con);				/*database selected*/
$query = "select * from dic";
$a = mysql_query($query,$con) Or die(mysql_error()) ;		/*running a query defined by $query variable*/

$i=0;
$b = 45278;
echo "original word"."       "."hash value is "."<br>";
while ( $i < $b )
{
	$e = mysql_result($a,$i)."     "; 			/*storing result of $query in $e*/
	echo $e;
	$d = md5(mysql_result($a,$i)); 			/*calculating md5 of words in $d*/
	echo $d;
$g = mysql_query("insert into final(words,hash) values('$e','$d')",$con); 	/*insert words and hashes in final table of dictionary database*/
	mysql_result($g,$i);				/*run query stored in $g variable */
	echo "<br>";
	$i++;
}
mysql_close($con);					/*closes connection to database dictionary*/
?>

