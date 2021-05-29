<?php

require_once 'models/User.php';
require_once 'dao/UserDao.php';

class UserDaoMysql implements UserDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(User $u)
    {
        $sql = $this->pdo->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );
        return $u;
    }

    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query('SELECT id, name, email FROM users');
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $item) {
                // definindo objeto
                $u = new User();
                // populando objeto
                $u->setId($item->id);
                $u->setName($item->name);
                $u->setEmail($item->email);
                // adicionando objeto ao array
                $array[] = $u;
            }
        }

        return $array;
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if (! ($sql->rowCount() > 0))   {
            return false;
        }

        $data = $sql->fetch(PDO::FETCH_OBJ);
        $u = new User();
        $u->setId($data->id);
        $u->setName($data->name);
        $u->setEmail($data->email);
        return $u;

    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();  
        
        if (! ($sql->rowCount() > 0))   {
            return false;
        }

        $data = $sql->fetch(PDO::FETCH_OBJ);
        $u = new User();
        $u->setId($data->id);
        $u->setName($data->name);
        $u->setEmail($data->email);
        return $u;
    }

    public function update(User $u)
    {
        $sql = $this->pdo->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        return true;
    }
}