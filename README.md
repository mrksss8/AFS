# AdminFiles-PUPC

- Check .env file for database name.  
- Run `composer update` if you cannon run `php artisan serv`  
- Run `php artisan migrate:fresh`  
- Insert the following test records:  
```SQL
-- folders Table
INSERT INTO db_filing.folders (folder_name,created_at,updated_at) VALUES
	 ('Main Folders',NULL,NULL),
	 ('Secondary Folders',NULL,NULL);
     
-- subfolders Table
INSERT INTO db_filing.subfolders (folder_id,subfolder_name,created_at,updated_at) VALUES
	 (1,'Sub Main 01',NULL,NULL),
	 (1,'Sub Main 02',NULL,NULL),
	 (2,'Sub Secondary 01',NULL,NULL);  
     
-- files Table
INSERT INTO db_filing.files (subfolder_id,filename,created_at,updated_at) VALUES
	 (1,'Main File 01',NULL,NULL),
	 (2,'Main File 02',NULL,NULL),
	 (3,'Sec File 01 ',NULL,NULL),
	 (1,'Main File 01-a',NULL,NULL);
```
