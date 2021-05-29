<?php

class User
{
    private int $id;
    private string $name;
    private string $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = trim($id);
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = ucwords(trim($name));
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = strtolower(trim($email));
    }
}