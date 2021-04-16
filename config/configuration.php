<?php
##################################################
#             Database configuration             #
##################################################
# DB_HOST:	The MySQL server to connect to		 #
# DB_USER:	The MySQL server username			 #
# DB_PASS:	The MySQL server password			 #
# DB_NAME:	The MySQL server database			 #
#                                                #
##################################################

define('DEBUG', true); // DEBUG MODE ON

define('DB_NAME', 'dbShopping'); //Databse Name

define('DB_USER', 'root'); //Databse UserName

define('DB_PASSWORD', ''); //Databse Password

define('DB_HOST', 'localhost'); //Databse Host

define('DRIVER','mysql'); // Database drivers example: postsql,mssql etc

define('VERSION', '1.0'); //System version


#####################################################
#              System Home directory                #
#####################################################

define('DEFAULT_CONTROLLERS', 'Home');

define('DEFAULT_AUTH', '');

define('DEFAULT_METHOD', 'Index');

// define('URL', 'http://localhost/app/apps/');

define('URL', 'https://jeslove.github.io/app/apps/');


define('NOTFOUND', 'https://jeslove.github.io/404.asp');

define('KEY', 'nuue89937793874uh9e7y493774');

###########################################################
#             File system directory                       #
###########################################################

define('UPLOADS','uploads');

define('ATTACHMENT','attachments');

define('COMPANY_LOGOS','logos');

define('TENANT_PIC','tenantImage');

define('HOUSE','uploads/house');

define('LAND','uploads/land');