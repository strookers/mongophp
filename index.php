<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

require_once "vendor/autoload.php";
// connect
$m = new MongoClient("mongodb://admin:admin123@95.85.45.220:27017/");

// Use the companion database, and the test collection
$collection = $m->selectCollection("companion", "test");

// add a record
$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );

// Insert a record into the collection
$collection->insert($document);

// add another record, with a different "shape"
$document = array( "title" => "XKCD", "online" => true );
$collection->insert($document);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}

?>
</body>
</html>