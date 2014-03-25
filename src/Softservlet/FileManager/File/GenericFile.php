<?php namespace Softservlet\FileManager\File;

class GenericFile implements FileInterface
{
	protected $uri;
	
	public function __construct($uri)
	{
		$this->uri = $uri;
	}
	
	public function uri()
	{
		return $this->uri;
	}
}