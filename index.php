<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

require_once("vendor/autoload.php");

// For more information on what you can and can't do with the mongo library
// Refer to http://mongodb.github.io/mongo-php-library/

// connect
$mongo = new \MongoDB\Client("mongodb://admin:admin123@95.85.45.220:27017/");

// Use the companion database, and the test collection
$collection = $mongo->selectCollection("companion", "test");

// add a record
$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );

// Insert a record into the collection
$collection->insertOne($document);

// add another record, with a different "shape"
$document = array( "title" => "XKCD", "online" => true );
$collection->insertOne($document);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}

?>
</body>
</html>