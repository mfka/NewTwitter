<?php

require_once(__DIR__ . '/../config/autoLoader.php');

class User extends Model
{

    static public function encryptPassword($pass)
    {
        return md5(trim($pass));
    }

    static public function getAll()
    {
        $conn = Database::connect();
        $stmt = $conn->prepare('SELECT * FROM user');
        $stmt->execute();
        $conn = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getByID($id)
    {
        $conn = Database::connect();
        $stmt = $conn->prepare('SELECT * FROM user WHERE id = :id LIMIT 1');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $conn = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    static public function create($name, $email, $password, $surname = null)
    {
        $conn = Database::connect();
        $stmt = $conn->prepare('INSERT IGNORE INTO user(name, surname, email, password) VALUES (:name, :surname, :email, :password)');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $id = $conn->lastInsertId();
        $conn = null;
        return self::getByID($id);
    }

    static public function login($email, $password)
    {
        $conn = Database::connect();
        $stmt = $conn->prepare('SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', self::encryptPassword($password));
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            self::update($user->id, null, null, null, null, 1);
            return $user;
        } else {
            return false;
        }
    }

    static public function update($id, $name = null, $email = null, $password = null, $surname = null, $login_date = null)
    {
        $conn = Database::connect();
        try {
            $sql = 'UPDATE user SET '
                . ($name != null ? 'name = :name, ' : '')
                . ($surname != null ? 'surname = :surname, ' : '')
                . ($password != null ? 'password = :password, ' : '')
                . ($email != null ? 'email = :email, ' : '')
                . ($login_date != null ? 'login_date = :login_date, ' : '')
                . ' WHERE id = :id LIMIT 1';

            $sql = str_replace(',  ', ' ', $sql);
            $stmt = $conn->prepare($sql);

            if (!is_null($name)) {
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            }
            if (!is_null($surname)) {
                $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            }
            if (!is_null($email)) {
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            }
            if (!is_null($password)) {
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            }
            if (!is_null($login_date)) {
                $stmt->bindParam(':login_date', date('Y-m-d H:i:s'));
            }

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $conn = null;
            return self::getByID($id);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "\n";
            return false;
        }
    }

    static public function delete($id)
    {
        try {
            $conn = Database::connect();
            $stmt = $conn->prepare('DELETE FROM user WHERE id = :id LIMIT 1');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    static public function checkPass($id, $pass)
    {
        try {
            $conn = Database::connect();
            $stmt = $conn->prepare('SELECT * FROM user WHERE id = :id AND password = :password LIMIT 1');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':pass', self::encryptPassword($pass));
            $stmt->execute();
            $conn = null;
            var_dump($stmt);
            if ($stmt->fetch(PDO::FETCH_OBJ)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

}