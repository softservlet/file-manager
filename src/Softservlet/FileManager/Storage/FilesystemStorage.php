<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\Deliver\UriParser;
use Softservlet\FileManager\File\LocalFileDescriptor;
use Softservlet\FileManager\File\FileInterface;
use Softservlet\FileManager\File\FileDescriptorInterface;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */

class FilesystemStorage extends AbstractStorage
{
	
	/**
	 * @brief the folder where to store the file
	 * 
	 * @var string
	 */
	protected $path;
	
	public function __construct(FileDescriptorInterface $descriptor, $path)
	{
		parent::__construct($descriptor);
		$this->path = $path;		
	}
	
	/**
	 * @brief get the storage uri schema
	 *
	 * @return string schema
	 */
	public function schema()
	{
		return 'file';
	}
	
	/**
	 * @brief store a file
	 *
	 * @return string URI where file was stored
	 */
	public function store(FileDescriptorInterface $descriptor)
	{	
		$contents = $descriptor->contents();	
		$path = $this->path($descriptor->name());

		file_put_contents($path, $contents);
		return $this->schema().'://'.$path;	
	}

	
	/**
	 * @brief delete a file
	 *
	 * @return void 
	 */
	public function delete(FileInterface $file)
	{
		@unlink($this->path($this->fileDescriptor($file)->name()));
	}

	/**
	 * @brief Get the path where we store the files
	 *
	 * @return string
	 */
	public function path($name = null)
	{
		$path = $this->path;
		
		if(!is_null($name)) {
			$path .= '/'.trim($name,'/');
		}

		return $path;
	}


	/**
	 * @brief determines whether the file exists
	 *
	 * @return bool
	 */
	public function exists(FileInterface $file)
	{
		return file_exists($this->path.$this->fileDescriptor($file)->name());	
	}		
}	

