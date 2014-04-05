<?php namespace Softservlet\FileManager\Deliver;

use Softservlet\FileManager\File\FileInterface;

interface DeliveryInterface
{
	/**
	 * @brief get the schema that this driver works for
	 * 
	 * @return string schema
	 */
	public function httpUrl(FileInterface $file);

}