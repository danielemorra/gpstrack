<?php

require_once('SimpleLargeXMLParser.class.php');

$xml = dirname(__FILE__)."/example.xml";
//$xml = "http://www.protung.ro/feed/atom/"; // parse an Atom feed


// create a new object
$parser = new SimpleLargeXMLParser();
// load the XML
$parser->loadXML($xml);


//$array = $parser->parseXML("//myFirstNode/color-palettes/color[@type='hex']"); // get all colors in hex format
//$array = $parser->parseXML("//myFirstNode/first-100-numbers/number[@n>'50']"); // get all numbers bigger then 50
//$array = $parser->parseXML("//myFirstNode/searchengines"); // get all search engines
//$array = $parser->parseXML("//myFirstNode"); // get all XML file
//$array = $parser->parseXML("*/*[@type='html']"); // use wilde cards to get all nodes that match a criteria
$array = $parser->parseXML(); // get all XML file - faster if you specify the first node


// in case you also need the attibutes (with values) you need to pass the 2rd parameter as true
// the array structure will change in this case 
//$array = $parser->parseXML("//myFirstNode/color-palettes/color[@type='hex']", true); // get all colors in hex format
//$array = $parser->parseXML("//myFirstNode/first-100-numbers/number[@n>'50']", true); // get all numbers bigger then 50
//$array = $parser->parseXML("//myFirstNode/searchengines", true); // get all search engines
//$array = $parser->parseXML("*/*[@type='html']", true); // use wilde cards to get all nodes that match a criteria
//$array = $parser->parseXML("//myFirstNode", true); // get all XML file




// in case you have special XML files (like RSS or Atom feeds) you need to register the namespaces
//$parser->registerNamespace("atom", "http://www.w3.org/2005/Atom"); // register the namespace
//$array = $parser->parseXML("//atom:feed/atom:entry"); //


print "<pre>";
print_r($array);
print "</pre>";

?>