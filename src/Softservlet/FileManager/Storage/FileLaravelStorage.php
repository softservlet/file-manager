<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\Deliver\UriParser;
use Softservlet\FileManager\File\LocalFileDescriptor;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */

class FileLaravelStorage extends AbstractStorage
{
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
	public function store()
	{
		$parser = new UriParser($this->file->uri());	
		$descriptor = $this->fileDescriptor();
		
		$contents = $descriptor->contents();	
		$path = $this->path($descriptor->name());

		file_put_contents($path, $contents);
		return $this->schema().'://'.$path;
	
	}

	/**
	 * @brief get the file descriptor
	 *
	 * @return FileDescriptorInterface
	 */
	public function fileDescriptor()
	{	
		return new LocalFileDescriptor($this->file);	
	}
	
	/**
	 * @brief delete a file
	 *
	 * @return void 
	 */
	public function delete();

	/**
	 * @brief Get the path where we store the files
	 *
	 * @return string
	 */
	public function path($name = null)
	{
		$path = storage_path().'/work';

		if(!is_null($name)) {
			$path .= '/'.(trim($name),'/');
		}

		return $path;
	}
		
}	

