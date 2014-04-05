<?php 


return array(

		/**
		 * Here register the storage drivers
		 * that implements StorageInterface
		 */
		'storage' => array(
			new Softservlet\FileManager\Storage\FilesystemStorage(
					new Softservlet\FileManager\File\LocalFileDescriptor,
					base_path('public')
			)
		),
		
		/**
		 * Here register the delivery drivers 
		 * that generates the http urls for specific files
		 */
		'delivery' => array(
			//register generic http delivery
			//for local files stored in public
			array (
				//this driver will handle only files stored with
				//storage drivers that uses the 'file' schema
				'schema' => 'file',
					
				
			)
		)
		
		
	
);