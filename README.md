REST API implementation in yii2 advanced template

Things you need to make sure are:-

- Make sure to enable "rewrite_module" in the httpd.conf file located in the apache folder of you webserver. By enable I mean uncomment "LoadModule rewrite_module modules/mod_rewrite.so". That is removing the "#" at the front if it is present. Otherwise, a request to the webpage will throw errorcode 500.

- Make sure to have "AllowOverride" on "all", in the same file. Otherwise, a request to the webpage will throw errorcode 404.

- Restart Apache after these changes, to let them take effect.

- The common folder isn't used in the github example, the files "Country.php" and "CountryController.php" are moved to the "modules/v1/models" and "modules/v1/controllers" folders respectively.

At last their are a few extra files, not mentioned in this tutorial, but present in the github example that you need to create:

- api/web/.htaccess
- api/web/index.php
- api/modules/v1/Module.php
- api/config/main-local.php
- api/config/params-local.php
- api/config/params.php
