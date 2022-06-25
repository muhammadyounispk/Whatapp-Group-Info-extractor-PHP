<?php
include_once('WhatsappGroupInfo.php');
$whatsapp = new WhatsappGroupInfo("https://chat.whatsapp.com/HD24D8awsJPKeSwCUGg2to");
$groupicon= $whatsapp->getIcon();
$groupname= $whatsapp->getName();

echo $groupname ;
echo  "<img src='$groupicon'>";

?>
