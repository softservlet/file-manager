<?php namespace Softservlet\FileManager\Storage;

use Exception;
use Softservlet\FileManager\File\FileInterface;
use Softservlet\FileManager\Deliver\UriParser;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */
class StorageFactory
{	
	/**
	 * @brief the registered storage drivers
	 *
	 * @var array
	 */
	protected static $drivers;

	/**
	 * @brief Get the storage driver that corresponds to a file
	 *
	 * @param FileInterface $file
	 *
	 * @return StorageInterface $storage
	 */
	public static function get(FileInterface $file)
	{
		$uri = new UriParser($file->uri());	
		$driver = static::findBySchema($uri->getSchema());	
		$driver->setFile($file);
		return $driver;
	}

	/**
	 * @brief get driver by schema
	 *
	 * @return DriverInterface driver that matches
	 */
	public static function findBySchema($schema)
	{
		foreach($this->drivers as $driver) {
			if($driver->schema() == $schema) {
				return $driver;
			}
		}

		throw new Exception(sprintf('Driver for [%s] schema doesn\'t exist', $schema));
	}

	/**
	 * @brief register the storage drivers
	 *
	 * @param FileInterface $file
	 * 
     * @return void
	 */
	protected static function register(StorageInterface $storage)
	{
		foreach($this->drivers as $driver)
		{
			if(get_class($driver) == get_class($storage)) {
				return false;
			}
		}

		$this->drivers[] = $storage;
	}
}	
