A simple CRM system built on CakePHP 2.1.1

## INSTALL 

1. Checkout this project using Git, or download and unzip the ZIP file from GitHub.
2. Move the files to a folder under WWW root
3. Create a database, and import the SQL file in Config/Schema/crm.sql, like this:

```
mysql -u USER -p DBNAME < Config/Schema/crm.sql
```

4. Copy Config/database.php.sample to Config/database.php and edit to reflect your database settings.

```
cp Config/database.php.sample Config/database.php
```

5. Copy Config/config.php.sample to Config/config.php, and then edit Zhen CRM settings, such as copyright, company name, etc.

```
cp Config/config.php.sample Config/config.php
vi Config/config.php
```

6. Login to your Zhen CRM install using:

```
Username: admin
Password: password
```

Make sure to change your password upon first login!

## LICENSE

Dual-licensed under GNU Affero General Public License.

