  <?php
  require_once './config/config.php';
  class Database {

    private static $host = DB_HOST;
    private static $password = DB_PASSWORD;
    private static $db_name = DB_NAME;
    private static $user = DB_USER;

    private static $conn;

    public static function getConnection() {
      if(is_null(self::$conn)) {
        try {
          self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8", self::$user, self::$password);
          self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        } catch(Exception $e) {
          echo 'Connection error ' . $e->getMessage();
        }
      }
      return self::$conn;
    }

  }