<?php 
/*
$orion_host="localhost"; // Host name 
$orion_username="root"; // Mysql username 
#$password="19Patrick04Allan19Wabwire88Jr"; // Mysql password 
$orion_password=""; // Mysql password 
$orion_db_name="orion_osiris";//databasename
//$conn = mysql_connect("localhost", "root", "");
$orion_conn = mysql_connect("$host", "$username", "$password")or die("Failed to Connect to Server"); 
//mysql_select_db("$db_name")or die("Failed to Select Database");
*/
$Key_1="NKY1H3685";
$Key_2="BNYX1YX42726";

function encrypt($sData, $sKey){
    $sResult = '';
    for($i=0;$i<strlen($sData);$i++){
        $sChar    = substr($sData, $i, 1);
        $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
        $sChar    = chr(ord($sChar) + ord($sKeyChar));
        $sResult .= $sChar;
    }
    return str_replace("=", "", encode_base64($sResult));
}

function decrypt($sData, $sKey){
	$sData=$sData."=";
    $sResult = '';
    $sData   = decode_base64($sData);
    for($i=0;$i<strlen($sData);$i++){
        $sChar    = substr($sData, $i, 1);
        $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
        $sChar    = chr(ord($sChar) - ord($sKeyChar));
        $sResult .= $sChar;
    }
    return $sResult;
}


function encode_base64($sData){
    $sBase64 = base64_encode($sData);
    return strtr($sBase64, '+/', '-_');
}

function decode_base64($sData){
    $sBase64 = strtr($sData, '-_', '+/');
    return base64_decode($sBase64);
}  

function getRandom($length){
$random = "";
$Possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
// we refer to the length of $possible a few times, so let's grab it now
$maxlength = strlen($Possible);
// check for length overflow and truncate if necessary
if ($length > $maxlength) {
  $length = $maxlength;
}
$i = 0; 
while ($i < $length) { 
  $char = substr($Possible, mt_rand(0, $maxlength-1), 1);
  if (!strstr($random, $char)) { 
	$random .= $char;
	$i++;
  }
}	
return $random;	
}


?>
