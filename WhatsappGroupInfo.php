<?php

class WhatsappGroupInfo {
  public $name;
  public $icon;

  function __construct($link) {

  	 $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_REFERER, $link);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.125 Safari/533.4");
    $str = curl_exec($curl);

    $doc = new DOMDocument();
@$doc->loadHTML($str);

foreach( $doc->getElementsByTagName('meta')
 as $meta ) { 
   $metaData[] = array(
        'property' => $meta->getAttribute('property'),
        'content' => $meta ->getAttribute('content')   );
}

 $this->icon=$metaData[8]['content'];
 $this->name= $metaData[7]['content'];
  }
  function getIcon() {
    return $this->icon;
  }

   function getName() {
    return $this->name;
  }


}
?>
