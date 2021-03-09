<?php
/**
 * Created by PhpStorm.
 * User: Bertin_dev
 * Date: 26/02/2021
 * Time: 07h19
 */
require 'Database.php';

use app\config\Database;

  class App
  {
      //mysql
      CONST DB_NAME = 'gescom_db';
      CONST DB_USER = 'root';
      CONST DB_PASS = '';
      CONST DB_HOST = 'localhost';
      CONST DB_TYPE = 'mysql';
      private static $database;

      //pgsql
      CONST DB_NAME_PG = 'public';
      CONST DB_USER_PG = 'postgres';
      CONST DB_PASS_PG = 'bertin';
      CONST DB_HOST_PG = 'localhost';
      CONST DB_TYPE_PG = 'pgsql';
      private static $database_PG;


      public static function getDB(){
          if(self::$database === null) {
              self::$database = new Database(self::DB_HOST, self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_TYPE);
          }
         return self::$database;
      }


      public static function getDbPgSQL(){
          if(self::$database_PG === null) {
              self::$database_PG = new Database(self::DB_HOST_PG, self::DB_NAME_PG, self::DB_USER_PG, self::DB_PASS_PG, self::DB_TYPE_PG);
          }
          return self::$database_PG;
      }

  }

