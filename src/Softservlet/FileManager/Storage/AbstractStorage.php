<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\File\FileInterface;
use Illuminate\Support\Facades\File;
use Softservlet\FileManager\Deliver\UriParser;
use Softservlet\FileManager\File\FileDescriptorInterface;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */
abstract class AbstractStorage implements StorageInterface
{
	/**
	 * @brief file object
	 *
	 * @var FileInterface
	 */
	protected $file;

	/**
	 * @brief store the file descriptor object
	 * 
	 *  @var FileDescriptorInterface
	 */
	protected $descriptor;
	
	/**
	 * @brief class constructor
	 *
	 * @param FileInterface $file to handle
	 */
	public function __construct(
			FileDescriptorInterface $descriptor
					
	)
	{
		$this->descriptor = $descriptor;
	}
	
	/**
	 * @brief get the file descriptor
	 *
	 * @return FileDescriptorInterface
	 */
	public function fileDescriptor(FileInterface $file)
	{	
		$this->descriptor->setFile($file);
		
		return $this->descriptor;
	}

	/**
	 * @return the URiParser object for this File
	 *
	 */
	public function uri()
	{
		return new UriParser($this->file->uri());
	}
}
