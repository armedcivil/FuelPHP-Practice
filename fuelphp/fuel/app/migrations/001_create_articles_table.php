<?php
namespace Fuel\Migrations;
use Fuel\Core\DBUtil;

class Create_articles_table
{
  function up() 
  {
    DBUtil::create_table(
      'articles', 
      array(
        'id' => array('type' => 'bigint', 'auto_increment' => true),
        'title' => array('type' => 'varchar', 'constraint' => 50),
        'body' => array('type' => 'longtext'),
        'created_at' => array('type' => 'datetime'),
        'updated_at' => array('type' => 'datetime'),
      ), 
      array('id'),
      false,
      'InnoDB',
      'utf8_unicode_ci',
    );
  }

  function down()
  {
    DBUtil::drop_table('articles');
  }
}