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
	protected $drivers = array();

	/**
	 * @brief Get the storage driver that corresponds to a file
	 *
	 * @param FileInterface $file
	 *
	 * @return StorageInterface $storage
	 */
	public function get(FileInterface $file)
	{
		$uri = new UriParser($file->uri());	
		$driver = $this->findBySchema($uri->getSchema());	
		return $driver;
	}

	/**
	 * @brief get driver by schema
	 *
	 * @return DriverInterface driver that matches
	 */
	public function findBySchema($schema)
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
	 public function register(StorageInterface $storage) 
	 {
		foreach ( $this->drivers as $driver ) {
			if (get_class ( $driver ) == get_class ( $storage )) {
				return false;
			}
		}
		
		$this->drivers [] = $storage;
	}
	
	/**
	 * @brief forward calls to specifi storage driver
	 * 
	 */
	public function __call($name,$params)
	{
		if($params[0] instanceof FileInterface){
			$uri = new UriParser($params[0]->uri());
			$driver = $this->findBySchema($uri->getSchema());
			return call_user_func_array(array($driver,$name),$params);
		} else {
			parent::__callStatic($name,$params);
		}
	}
}	
