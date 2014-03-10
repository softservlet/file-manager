### Delivering files
The file delivery can be used in many ways.
For example a type of delivery can be though http URL, another can be though storage path, another can be though CDN file ID.
Any of this string we will call 'URI'.


A file can be stored many ways:
 * file:///var/www/file.ext
 * http://domain.com/file.ext
 * foo://domain.com/file.ext

So a file is always stored in a location that matches the following pattern of URI: 
	
	<schema>:<locatie>[?<interogarea>][#<fragmentul>] 

For example if we store a file in openstack onbject storage we can have the following uri for it:

	openstackv1://4281c348eaf83e70ddce0e07221c3d28

Each file must have the following attributes:

 * URI
 * Name
 * MimeType


