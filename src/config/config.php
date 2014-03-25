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
		)
	
);