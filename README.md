### Introduction

This package allows you to store files on any place, even local filesystem, or cloud CDN, FTP servers etc.

To accomplish this, a common way to describe a file location is needed.


Let's assume that you have a file stored on `/home/user/image.jpg`

We can tell about this file that it:
	
 * has the `file` storage schema
 * has the `/home/user/image.jpg` location

So, finally, we can describe it as `file:///home/user/image.jpg`

In conclusion, any file is always stored in a location that matches the following pattern of URI: 
	
	<schema>://<location>[?<query>][#<fragment>] 

For example if we store a file in openstack onbject storage we can have the following uri for it:

	openstack://4281c348eaf83e70ddce0e07221c3d28


### Laravel integration
	
Edit the `app/config/app.php` and add the following lines
	
	'aliases' => 
		...
		'Storage' => 'Softservlet\FileManager\StorageFacade'

	'providers' =>
		...
		'Softservlet\FileManager\FileManagerServiceProvider'

## Usage
	
#### Store a file


Firstly we will instantiate a new `FileInterface` implementation object, which accpets as parameter the URI of the FileInterface. 

By default, if the URI doesn not conaint a schema then the file:// schema will be interpreted

````php
use Softservlet\FileManager\File\GenericFile;

//See Softservlet\FileManager\File\FileInterface
$file = new GenericFile('/home/user/image.jpg');
````
We will call then the `StorageFactory` class to store the file (for this Storage facade is used here).

The `store` method accepts as parameter an FileInterface and optionally an `StorageInterface` instance.

If the StorageInterface is not given, the file will be stored using the FilesystemStorage Driver.

````php
$uri = Storage::store($file);
````

If you have an openstack storage implementation you will can call 

````php
$uri = Storage::store($file, new OpenstackStorage)
````

#### Retrieve a file

We've store a file, now we want to retrieve it from the storage mechanism.

For this, we will use the `fileDescriptor()` method declared on `StorageInterface`, and wich is implemented by each storage driver.

It accepts as parameter an `FileInterface` and return an `FileDescriptorInterface`.

````php
//we stored the file and got the $uri variable
$file = new GenericFile($uri);

$descriptor = Storage::fileDescriptor($file);

//See Softservlet\FileManager\File\FileDescriptorInterface
$contents = $descriptor->contents();
$mime = $descriptor->mime();

````
