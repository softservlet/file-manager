<?php namespace Softservlet\FileManager\File;

use finfo;
use Softservlet\FileManager\File\FileInterface;
use Softservlet\FileManager\Deliver\UriParser;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */
class LocalFileDescriptor implements FileDescriptorInterface
{
	/**
	 * @brief file object
	 *
	 * @var FileInterface 
	 */
	protected $file;
	
	/**
	 * @brief file location on the disk
	 *
	 * @var string
	 */
	protected $location;

	/**
	 * @brief set the file
	 * 
	 * @param FileInterface file
	 */
	public function setFile(FileInterface $file)
	{
		$this->file = $file;
		
		$uri = new UriParser($file->uri());
		
		$this->location = $uri->getLocation();
	}
	
	/**
	 * @brief get the file object
	 * 
	 * @return FileInterface
	 */
	public function getFile(FileInterface $file)
	{
		return $this->file;
	}
	

	/**
	 * @brief return the file mime type
	 *
	 * @return string mime type
	 */
	public function mime()
	{
		$finfo = new finfo(FILEINFO_MIME_TYPE, $this->location);
		return $finfo->file($this->location);
	}

	/**
	 * @brief return the file cintents
	 *
	 * @return string/octet-stream the contents of the file
	 */
	public function contents()
	{
		return file_get_contents($this->location);
	}	

	/**
	 * @brief return the size of the file in bytes
	 *
	 * @return int size
	 */
	public function size()
	{
		return filesize($this->location);
	}

	/**
	 * @brief get the file name
	 *
	 * @return string
	 */
	public function name()
	{
		return basename($this->location);
	}

}	
