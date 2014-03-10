<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\File\FileInterface;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */
interface StorageInterface 
{
	/**
	 * @brief get the storage uri schema
	 *
	 * @return string schema
	 */
	public function schema();

	/**
	 * @brief store a file
	 *
	 * @return string URI where file was stored
	 */
	public function store();
	
	/**
	 * @brief delete a file
	 *
	 * @return void 
	 */
	public function delete();

	/**
	 * @brief return the file descriptor
	 *
	 * @return FileDescriptoInterface
	 */
	public function fileDescriptor();

	/**
	 * @brief determines whether the file exists
	 *
	 * @return bool
	 */
	public function exists();
}
