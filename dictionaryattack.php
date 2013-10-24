<html>
<head><font size='12' face='arial' color ='red'><center>PASSWORD CRACKER</CENTER></font></head>
<body>
<?php 
$name0 = $_POST['password'];
$start_time = microtime(true);
set_time_limit(3000);  
$h = md5($name0);
$con = mysql_connect("localhost","root","");		/*connection to server="localhost" username="root" password=""*/
if(!$con)
{
	die("couldnot connect: ".mysql_error());
}
mysql_select_db("dictionary",$con);			/*database 'dictionary' is selected*/
$query = "select hash from final";
$a = mysql_query($query,$con) Or die(mysql_error()) ;	/*running query*/
$ba = mysql_query("select words from final",$con);
$i=0;
$b = 40000;
echo "hash of the password is: ".$h;
echo "<br/>";
while ( $i < $b )
{
	$e = mysql_result($a,$i);
	if ($h == $e)
	{
		echo "Password is found: Your password is:    ";
		echo mysql_result($ba,$i);
		break;
	}
	$i++;
}
$end_time = microtime(true);
$time_taken = $end_time - $start_time;
echo "time taken for processing is: ".$time_taken;
mysql_close($con);
?>
</body>
</html>



