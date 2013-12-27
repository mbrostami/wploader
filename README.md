
# WP Loader

Run wordpress as component in your projects ( e.g:Zend Framework & ... ). 
 
# Wordpress inside Zend framework 
Move your wordpress folder to ZF library.    
Place Loader.php in wordpress folder.        
Inside your controller you can require Loader.php .     
You can use all ZF controller objects in wordpress files .    
Use htaccess to give Loader.php what file or folder requested.   
` 
RewriteRule ^wp-admin/([_0-9a-zA-Z-]+).php?(.*)$ index.php?filename=$1&$2 [QSA]     
RewriteRule ^wp-admin/([_0-9a-zA-Z-]+).php$ index.php?filename=$1 [NC,L]        
RewriteRule ^wp-admin/([_0-9a-zA-Z-]+/){1,4}([_0-9a-zA-Z-]+).php?(.*)$ index.php?foldername=$1&filename=$2&$3 [QSA,L]      
RewriteRule ^([_0-9a-zA-Z-]+).php?(.*)$ index.php?filename=$1&$2 [QSA,L]      
`
Maybe you need to comment these lines:
`
RewriteCond %{REQUEST_FILENAME} -s [OR]     
RewriteCond %{REQUEST_FILENAME} -l [OR]     
RewriteCond %{REQUEST_FILENAME} -d    
`
Copy wordpress public files ( .js & .css &b images) into Zend public folder.
Thats it!!

# Wordpress for other projects
You can use Loader.php and customize it to run in other framework or projects . 
