
<?php
Class GB {

    private $dbFile = "db.sqt";
    private $db;

    private function dbConnect() {
        $this->db =  new PDO('sqlite:' . $this->dbFile);
    }

    private function executeQuery($query) {
        $result = $query->execute();
        if ($result) {
            return $query->fetchAll();
        }
    }

    private function createDbTable() {
        $this->dbConnect();
        $this->db->exec("CREATE TABLE  IF NOT EXISTS messages(
                id INTEGER PRIMARY KEY,
                title CHAR(255),
                author CHAR(255),
                message TEXT,
                date DATETIME DEFAULT CURRENT_TIMESTAMP)"
        );
    }

    public function __construct() {
        if (!file_exists($this->dbFile)) {
            $this->createDbTable();
        }
        else {
            $this->dbConnect();
        }

        if (!is_writable($this->dbFile)) {
            chmod($this->dbFile, 0777);
        }
    }

    public function getEntries($id=null) {
        if ($id) {

            $query = $this->db->prepare(
                "SELECT * FROM messages WHERE id=:id");
            $query->bindValue(':id',$id,SQLITE3_INTEGER);
        }
        else {
            $query = $this->db->prepare(
                "SELECT * FROM messages"
            );
        }
        $r = $this->executeQuery($query);
        return $r;
        //var_dump($r);
    }

    public function addEntry($title,$author,$message,$date) {
        $query = $this->db->prepare("INSERT INTO messages
         (`title`, `author`, `message`, `date`)
        VALUES (:title, :author, :message,:date)");
        $query->bindValue(':title',$title,SQLITE3_TEXT);
        $query->bindValue(':author',$author,SQLITE3_TEXT);
        $query->bindValue(':message',$message,SQLITE3_TEXT);
        $query->bindValue(':date',$date,SQLITE3_INTEGER);
        $this->executeQuery($query);

    }
}
$gb = new GB();

if ( isset($_POST) && !empty($_POST) &&
     isset($_POST["author"]) && (strlen($_POST["author"]) > 0) &&
     isset($_POST["title"]) && (strlen($_POST["title"]) > 0) &&
     isset($_POST["message"]) &&  (strlen($_POST["message"]) > 0)
) {
    $gb->addEntry($_POST["title"],$_POST["author"],$_POST["message"],time());
}
$entries = $gb->getEntries();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    </head>
    <style>
    </style>
    <body>
        <?php
        foreach  ($entries as $entry) {
            echo $entry['author'] . " schrieb am " . date("d-m-y",$entry['date']) . " um " . date("G:m",$entry['date']) . " folgende message: <br /> " . $entry["message"] . "<br /><br />";
        }
        ?>
        <form action="#" method="POST">
            <table>
                <tr><td><p>name:</p></td><td><input type="text" name="author"/></td></tr>
                <tr><td><p>subjekt:</p></td><td><input type="text" name="title"/></td></tr>
                <tr><td><p>nachricht:</p></td><td><textarea name="message"></textarea></td></tr>
                <tr><td></td><td><input type="submit" /></td></tr>
            </table>
        </form>
    </body>
</html>