<?php

namespace Src\Model;

use App\Model;

class Twitt extends Model
{

    static public function getAll()
    {
        $stmt = self::$conn->prepare('SELECT t.*, u.* FROM twitt t INNER JOIN user u ON t.user_id = u.id ORDER BY t.publish DESC');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    static public function getByUserId($id)
    {
        $stmt = self::$conn->prepare('SELECT t.*, u.* FROM twitt t INNER JOIN user u ON t.user_id = u.id WHERE t.user_id = :id ORDER BY t.publish DESC');
        $stmt->bindParam(':id', $id, 1);
        $stmt->execute();
        $conn = null;
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    static public function getByID($id)
    {
        $stmt = self::$conn->prepare('SELECT * FROM twitt WHERE id = :id LIMIT 1');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $conn = null;
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


    static public function create($user_id, $text)
    {
        $stmt = self::$conn->prepare('INSERT IGNORE INTO twitt(text, user_id) VALUES (:text, :user_id)');
        $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
        $stmt->execute();
        $id = $conn->lastInsertId();
        return self::getByID($id);
    }

    static public function update($id, $text = null)
    {
        try {
            $sql = 'UPDATE twitt SET '
                . ($text != null ? 'text = :text ' : '')
                . ' WHERE id = :id LIMIT 1';

            $stmt = self::$conn->prepare($sql);

            if (!is_null($text)) {
                $stmt->bindParam(':text', $text, \PDO::PARAM_STR);
            }
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return self::getByID($id);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    static public function delete($id)
    {
        try {
            $stmt = self::$conn->prepare('DETELE FROM twitt WHERE id = :id LIMIT 1');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}

