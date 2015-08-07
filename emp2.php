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

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


$handle = fopen( $argv[1], "r");


if ($handle !== FALSE) {
fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$c=0;
       
       foreach($data as $value){
 
         $col[$c] =  $value;
         $c++;
	}
        
	$col1 = $col[0];
        $var = $col1;
	$var1=date("Y-m-d", strtotime($var) );
      
        

      //$query3 = "SELECT Employee_Code from EMPLOYEE";
        //  $s2 = mysql_query($query3, $con);
     

	
            
         $query2 = "INSERT into ATTENDENCE(Employee_Code,Date,Card_Id,In_Time,Out_Time,Work_Hours) VALUES ('$col[2]','$var1','$col[3]','$col[4]','$col[5]',' $col[6]') ";

    
        $s1 = mysql_query($query2, $con);
        //echo "$s1";
	
	//if (!$s1) echo "Error!";	
	
	      


}
 fclose($handle);
}

echo "File data successfully imported to database!!";

mysql_close($con);


?>
</body>
</html>
