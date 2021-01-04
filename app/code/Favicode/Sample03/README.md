# Sample 03 - Magento's ORM

* Setup scripts
* Model / Resource / Collection

## Todo
* db_schema.xml
    * add created_at, updated_at and content columns
    * update and examine etc/db_schema_whitelist.json with:
    `php bin/magento setup:db-declaration:generate-whitelist --module-name=Favicode_Sample03`
* Create sample03/news/list controller (and List block and template) and display last 10 news on it in descending order
* Create sample03/news/view/ controller (and View block and template) and display requested news on it
  (ex. /sample03/news/view/id/5 displays news with id=5)
* Create schema and model/resource/collection for news comments. Comment table needs to have foreign key to news table.
* Examine/trace model/resource/collection abstracts, find where db queries are executed
* Examine Magento's `patch_list` and (deprecated) `setup_module` tables

## Additional resources:
* <https://devdocs.magento.com/guides/v2.4/extension-dev-guide/declarative-schema/db-schema.html>
* <https://framework.zend.com/manual/1.12/en/zend.db.select.html>
