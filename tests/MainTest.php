<?php

use Softservlet\FileManager\Deliver\UriParser;

class MainTest extends PHPUnit_Framework_TestCase 
{
	public function testUriParser()
	{
		$uri = 'http://www.softservlet.com:1234/asdf/1234?q=1#f=2';

		$parser = new UriParser($uri);

		$this->assertEquals($parser->getSchema(),'http');
		$this->assertEquals($parser->getLocation(), 'www.softservlet.com:1234/asdf/1234');
		$this->assertEquals($parser->getQuery(), 'q=1');
		$this->assertEquals($parser->getFragment(), 'f=2');
	}
}	
