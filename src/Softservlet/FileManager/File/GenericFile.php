<?php namespace Softservlet\FileManager\File;

use Softservlet\FileManager\Deliver\UriParser;

class GenericFile implements FileInterface
{
	protected $uri;
	
	public function __construct($uri, $schema = null)
	{
		$this->uri = $uri;
		
		if(!stristr($this->uri,'://')) {
			if($schema == null) {
				$this->uri = 'file://' . $this->uri;
			} else {
				$this->uri = $schema . '://' . $this->uri;
			}
		}
	}
	
	public function uri()
	{
		return $this->uri;
	}
}