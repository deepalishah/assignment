 <?php
 if (isset($argv[1])) 
     $argv[1];


$mail=array();

$url=array();

$ip=array();

$file_handle = fopen( $argv[1], "r");


while (!feof($file_handle) ) {

$line_of_text = fgets($file_handle);
$pieces = explode(" ", $line_of_text);

lineoftext($pieces);


}

function lineoftext($pieces)
{
$count=sizeof($pieces);

for($i=0;$i<$count;$i++)
{	

  	global $mail;
	global $url;
	global $ip;

  
        if(preg_match("/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/", $pieces[$i])) {
        
        
       
       array_push($mail,$pieces[$i]);
       
 
  	 }

	if(preg_match("#^(ht|f)tps?://#", $pieces[$i]))  {
                    
                    
	array_push($url,$pieces[$i]);
       
	}
	
	if (preg_match("/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/",$pieces[$i])){
         
        
	array_push( $ip,$pieces[$i]);
       
	}
	
	}
}
fclose($file_handle);
echo "MAIL";
echo "\n";
for($i=0;$i<sizeof($mail);$i++)
{
echo $mail[$i]."\n";
}
 
echo "\n";
echo "URL";
echo "\n";
echo sizeof($url);

for($i=0;$i<sizeof($url);$i++)
{
echo $url[$i]."\n";
}

echo "\n";
echo "IP";
echo "\n";

echo sizeof( $ip);

for($i=0;$i<sizeof($ip);$i++)
{
echo $ip[$i]."\n";
}
?>
