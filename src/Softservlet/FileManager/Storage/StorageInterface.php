<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\File\FileInterface;
use Softservlet\FileManager\File\FileDescriptorInterface;

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
	public function store(FileDescriptorInterface $file);
	
	/**
	 * @brief delete a file
	 *
	 * @return void 
	 */
	public function delete(FileInterface $file);

	/**
	 * @brief return the file descriptor
	 *
	 * @return FileDescriptoInterface
	 */
	public function fileDescriptor(FileInterface $file);

	/**
	 * @brief determines whether the file exists
	 *
	 * @return bool
	 */
	public function exists(FileInterface $file);
}
