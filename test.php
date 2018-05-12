<?php
 $am = number_format(100.00,2);
 echo $am."<br>";
 $acc = '0000961744';
 $ref = 'bless23';
 $expiry = $ref."&".$acc."&".$am;
 //$acc = '&0000961744&';
 // $expiry =$expiry ;
 // $expiry .= $acc;
 // $expiry .=$am;
// //$num = '0051212352';

 $secret = 'QzQzQzk5RjQtQ0IwRS00RDg5LUI5NEUtNjgxOUFDMUNFMERF';
// //$secret =  base64_decode($secret);
// //$ref = utf8_encode($ref);
// //$secret = base64_encode($secret); 
// echo $secret;
// echo "<br>";
// $hash = hash_hmac('sha256', $ref, $secret, true);
// echo $hash;

// echo "<br>";

// echo base64_encode($hash);

//$resourceURI = "http://nifi-eventhub.servicebus.windows.net/hub1";
//$keyName = "hub-user";
//$key = "secret";
//$expiry = '1499177142'; // timestamp

// The format for the string is <resourceURI> + \n + <expiry>    
//$stringToSign = strtolower(rawurlencode($resourceURI)) . "\n" . $expiry;

// Hash the URL encoded string using the shared access key
$sig = hash_hmac("sha256", utf8_encode($expiry), $secret, false);

// Convert hexadecimal string to binary and then to base64
$sig = hex2bin($sig);
$sig = base64_encode($sig);

// 7kS3apSDpJFTYI1vxuo4t7syGG3FTBYI8foamMOtrEE=
echo $sig . "<br>\n";

// Generate authorization token
//$token = "SharedAccessSignature sr=" . urlencode($resourceURI) . "&sig=" . rawurlencode($sig) . "&se=" . $expiry . "&skn=" . $keyName;
//echo $token . "<br>\n";