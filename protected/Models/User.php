<?php

namespace App\Models;
use App\Exceptions\Validate_EmailException;
use App\MagicTrait;
use App\MultiException;


/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    const TABLE = 'users';

    public function __set($key, $val)
    {
        $methodName = 'validate_' . $key;
        if (method_exists($this, $methodName)) {
            $this->$methodName($val);
        }

        return $this->data[$key] = $val;
    }

    public function __get($key)
    {
        if($key == 'roleName') {
            if ($this->data['role'] == 0) {
                return 'Пользователь';
            }
            else {
                return 'Администартор';
            }
        }
        else {
            return @$this->data[$key];
        }
    }


    public static function findByLogin($login)
    {
        $db = new \App\Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE login = :login';
        $data = $db->query($sql, static::class, ['login' => $login]);

        if (empty($data)) {
            return false;
        }

        return $data[0];
    }


    public static function checkLoginPas($login, $pass)
    {

        $userDb = static::findByLogin($login);

        if ($userDb) {
            $passDb = $userDb->password;

            if ($passDb === $pass) {
                return $userDb;
            }
        }
        return false;

    }

    public static function shortByLogin()
    {
        $db = new \App\Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY login';

        return $db->query($sql, static::class);
    }
    public static function shortByName()
    {
        $db = new \App\Db;
        $sql = 'SELECT * FROM ' . static::TABLE  . ' ORDER BY name';
        return $db->query($sql, static::class);
    }
    public static function shortByEmail()
    {
        $db = new \App\Db;
        $sql = 'SELECT * FROM ' . static::TABLE  . ' ORDER BY email';
        return $db->query($sql, static::class);
    }
    public static function filterByAdminOnly()
    {
        $db = new \App\Db;
        $sql = 'SELECT * FROM ' . static::TABLE  . ' where role = :role';
        return $db->query($sql, static::class, ['role' => 1]);
    }

    public  function validate_email ($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Validate_EmailException('Не корректный email');
        }
    }
}