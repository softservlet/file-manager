<?php namespace Softservlet\FileManager\File;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */
interface FileDescriptorInterface
{
	/**
	 * @brief return the file mime type
	 *
	 * @return string mime type
	 */
	public function mime():

	/**
	 * @brief return the file cintents
	 *
	 * @return string/octet-stream the contents of the file
	 */
	public function contents();

	/**
	 * @brief return the size of the file in bytes
	 *
	 * @return int size
	 */
	public function size();

	/**
	 * @brief get the file name
	 *
	 * @return string
	 */
	public function name();
	
}

