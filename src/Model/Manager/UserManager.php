<?php

namespace Bosqu\ProjetLinksHandler\Model\Manager;
use Bosqu\ProjetLinksHandler\Model\Classes\Database;
use Bosqu\ProjetLinksHandler\Model\Entity\User;

class UserManager
{
    /**
     * Search a User in for log
     * @param $mail
     * @return User
     */
    public function searchUser($mail): ?User
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM prefix_user  WHERE mail = :mail LIMIT 1");
        $stmt->bindValue(':mail', $mail);
        $state = $stmt->execute();
        if($state && $userData = $stmt->fetch())
        {
            $user = new User($userData['id'], $userData['nom'], $userData['prenom'], $userData['mail'], $userData['pass']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }

    /**
     * Add a new user
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $pass
     * @return bool
     */
    public function addUser($nom, $prenom, $mail, $pass) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO prefix_user (nom, prenom, mail, pass, role_fk) VALUES (:nom, :prenom, :mail, :pass, 2)");
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':pass', $pass);

        return $stmt->execute();
    }

    /**
     * Search a user by her Id
     * @param $id
     * @return User
     */
    public function searchUserById($id): ?User
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM prefix_user WHERE id = :id LIMIT 1");
        $stmt->bindValue(":id", $id);
        $state = $stmt->execute();
        if ($state && $userData = $stmt->fetch())
        {
            $user = new User($userData['id'], $userData['nom'], $userData['prenom'], $userData['mail'], $userData['pass']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }
}