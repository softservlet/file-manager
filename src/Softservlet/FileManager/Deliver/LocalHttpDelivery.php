<?php namespace Softservlet\FileManager\Deliver;

use Softservlet\FileManager\File\FileInterface;

class LocalHttpDelivery implements DeliveryInterface
{	
	/**
	 * (non-PHPdoc)
	 * @see \Softservlet\FileManager\Deliver\DeliveryInterface::httpUrl()
	 */
	public function httpUrl(FileInterface $file)
	{
		$uri = new UriParser($file->uri());

		if($uri->getSchema() !== 'file') {
			throw new Exception("This driver supports only the 'file' schema");
		}	

		$path = base_path();
		$location = str_replace($path,'',$uri->getLocation());
		$location = trim($location,'/');
		
		return asset($location);
	}	
}