mysql -Nse 'show tables' db_project -uroot -proot | while read table; do mysql -e "SET FOREIGN_KEY_CHECKS=0; truncate table $table;SET FOREIGN_KEY_CHECKS=1;" db_project -uroot -proot ; done

