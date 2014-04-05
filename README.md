### Introduction

This package allows you to store files on any place, even local filesystem, or cloud CDN, FTP servers etc.

To accomplish this, a common way to describe a file location is needed.


Let's assume that you have a file stored on `/home/user/image.jpg`

We can tell about this file that it:
	
	* has the `file` storage schema
	* has the `/home/user/image.jpg` location

So, finally, we can describe it as `file:///home/user/image.jpg`

In conclusion, any file is always stored in a location that matches the following pattern of URI: 
	
	<schema>:<location>[?<query>][#<fragment>] 

For example if we store a file in openstack onbject storage we can have the following uri for it:

	openstack://4281c348eaf83e70ddce0e07221c3d28

