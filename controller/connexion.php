
<?php
/**
 * Connexion Base de donnee
 *
 */
class Connexion
{
    public function __construct($dbname='bdbank',$host='localhost',$login='root',$pswd='')
    {
        $this->dbname=$dbname;
        $this->host=$host;
        $this->login=$login;
        $this->pswd=$pswd;
    }

    public function getPDO()
    {
        return $this->pdo ?? new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->login, $this->pswd);
    }

    public function query($sql)
    {
        $req = $this->getPDO()->query($sql);
        $data = $req->fetchAll();
        return $data;
    }

    public function insert($sql)
    {
        $req = $this->getPDO()->prepare($sql);
        return $req;
    }
}


?>