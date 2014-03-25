<?php namespace Softservlet\FileManager;

use Illuminate\Support\Facades\Facade;

class StorageFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'storage';
	}
}