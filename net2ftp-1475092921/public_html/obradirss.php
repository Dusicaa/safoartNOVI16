
<?php 
  $rec=$_GET["rec"];
  if($rec=="Google"){
	  
	  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
  }
elseif($rec=="B92"){
	
	$xml=("http://www.b92.net/info/rss/vesti.xml");
}
$xmlDoc=new DOMDocument();
$xmlDoc->load($xml);

//pokupi elemente <channel>
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title=$channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
$channel_link=$channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
$channel_desc=$channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

//prikaz iz <channel>
echo ("<p><a href='".$channel_link."'>".$channel_title."</a>");
echo ("<br/>");
echo ($channel_desc."</p>");

//pokupi iz <item>
$x=$xmlDoc->getElementsByTagName('item');
for($i=0;$i<=2;$i++){
	
	$item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
	$item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	$item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
	echo ("<p><a href='".$item_link."'>".$item_title."</a>");
    echo ("<br/>");
    echo ($item_desc."</p>");
	
}
?>