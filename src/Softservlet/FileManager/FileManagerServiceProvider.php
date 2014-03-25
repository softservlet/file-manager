<?php namespace Softservlet\FileManager;

use Illuminate\Support\ServiceProvider;
use Softservlet\FileManager\Storage\StorageFactory;
use Softservlet\FileManager\Storage\FileLaravelStorage;
use Config;

class FileManagerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('softservlet/file-manager');	
	}
	

	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('storage', function($app) {
			
			$storage = new StorageFactory();
			
			$config =  (array) Config::get('file-manager::storage');
			
			foreach($config as $driver) {	
				$storage->register($driver);
			}
			
			return $storage;
		});	
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('storage');
	}

}
