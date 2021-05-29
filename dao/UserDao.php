<?php

interface UserDao
{
    public function add(User $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(User $u);
    public function delete($id);
}