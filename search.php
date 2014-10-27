<?php


	$dbhost = 'eu-cdbr-azure-west-b.cloudapp.net';
	$dbuser = 'b69619381f2677';
	$dbpass = 'f5f37a5d';
	$dbname = 'jackcouAGS0U338d';
	$tablename = 'registration_tbl';
	
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);



$query = "";
$str_query = "WHERE 1=1";

$name = $company = $email = $date = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {

if(isset($_GET["name"])){$name = $_GET["name"];}
if(isset($_GET["company"])){$company = $_GET["company"];}
if(isset($_GET["email"])){$email = $_GET["email"];}
if(isset($_GET["date"])){$date = $_GET["date"];}

if(!empty($name))
{
	$str_query .= " AND name = '$name'";
}

if(!empty($company))
{
	$str_query .= " AND Company = '$company'";
}

if(!empty($email))
{
	$str_query .= " AND email = '$email'";
}

if(!empty($date))
{
	$str_query .= " AND date = '$date'";
}
}
$query = "SELECT * FROM `registration_tbl` $str_query";
echo $query;
$fullresult = mysqli_query($conn,$query)  or die("Error: No matches found" ); //or die "Error: No matches found" if no matches found 



?>
<html>
<head>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>

</head>
<body>
<table>
<tr>
	<td>name</td>
	<td>email</td>
	<td>company</td>
	<td>date</td>
	<?php 
	while ($row = mysqli_fetch_array($fullresult)) 
	{
		echo "<tr><td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['Company']."</td>";
		echo "<td>".$row['date']."</td></tr>";
	}
	?>


</table>


</body>

</html>

