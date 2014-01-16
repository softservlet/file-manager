<?php namespace Softservlet\FileManager\Storage;

use Softservlet\FileManager\File\FileInterface;

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
	 * @brief class constructor
	 *
	 * @param FileInterface $file to handle
	 */
	public function __construct(FileInterface $file = null)
	{
		$this->file = $file;
	}

	/**
	 * @brief Set the file
	 *
	 * @param FileInterface $file
	 */
	public function setFile(FileInterface $file)
	{
		$this->file = $file;
	}
}
