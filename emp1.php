<!DOCTYPE html>
<html>
<body>
<?php
if (isset($argv[1])) 
     $argv[1];

define('DB_HOST', 'localhost');
define('DB_NAME', 'empinfo');
define('DB_USER','root');
define('DB_PASSWORD','synerzip');



$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD); 
if(!$con) {
    die("Not connected: ". mysql_error());
}
else
{
 mysql_select_db(DB_NAME, $con);
$q="DROP DATABASE IF EXISTS  empinfo";
$r1=mysql_query($q, $con);
$q1="CREATE DATABASE IF NOT EXISTS empinfo";
$c1=mysql_query($q1, $con );
mysql_select_db(DB_NAME, $con);
	
	
}

$query1="create table EMPLOYEE(Employee_Name varchar(15),Employee_Code varchar(15) Primary Key)";
       $s = mysql_query($query1, $con);
             
  

$handle = fopen( $argv[1], "r");


if ($handle !== FALSE) {
fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	$c=0;
       
       foreach($data as $value){
 
         $col[$c] =  $value;
         $c++;
	}
	
	 
	$query = "INSERT INTO EMPLOYEE(Employee_Name,Employee_Code) VALUES('$col[1]','$col[2]')";
	  $s1 = mysql_query($query, $con);
	
  $query2="create table ATTENDENCE(Employee_Code varchar(15),Date date,Card_Id VARCHAR(10),In_Time varchar(9),Out_Time varchar(9),Work_Hours varchar(9),constraint fk_ec FOREIGN KEY (Employee_Code) REFERENCES EMPLOYEE(Employee_Code))";


           $s2 = mysql_query($query2, $con);
     
      
  }

 fclose($handle);
}

echo "File data successfully imported to database!!";


mysql_close($con);
?>
</body>
</html>
