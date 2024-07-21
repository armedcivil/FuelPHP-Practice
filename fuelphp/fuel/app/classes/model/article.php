<?php

class Model_Article extends \Fuel\Core\Model_Crud
{
  protected static $_table_name = 'articles';
  protected static $_mysql_timestamp = true;
  protected static $_created_at = 'created_at';
  protected static $_updated_at = 'updated_at';
}