<?php

namespace Bosqu\ProjetLinksHandler\Model\Manager;

use Bosqu\ProjetLinksHandler\Controller\ThumbalizrController;
use Bosqu\ProjetLinksHandler\Model\Classes\Database;
use Bosqu\ProjetLinksHandler\Model\Entity\Links;

class LinksManager
{

    /**
     * Get all Links
     * @return array
     */
    public function getAll(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM prefix_link");

        if($stmt->execute() && $linkDatas = $stmt->fetchAll()) {
            foreach ($linkDatas as $linkData) {
                $array[] = new Links($linkData['id'], $linkData['href'], $linkData['title'], $linkData['target'], $linkData['name'], $linkData['user_fk'], $linkData['click'], $linkData['src']);
            }
        }
        return $array;
    }

    /**
     * Add a new link
     * @param $href
     * @param $title
     * @param $target
     * @param $name
     * @param $user_fk
     * @return bool
     */
    public function addLink($href, $title, $target, $name, $user_fk) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO prefix_link (href, title, target, name, user_fk, src) VALUES (:href, :title, :target, :name, :user, :src)");
        $thumb = new ThumbalizrController();
        $stmt->bindValue(':href', $href);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':target', $target);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':user', $user_fk);
        $stmt->bindValue(':src', $thumb->thumbalizr($href));

        return $stmt->execute();
    }

    /**
     * Remove a link
     * @param $id
     * @return bool
     */
    public function removeLink($id) :bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM prefix_link WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    /**
     * Get all Links by user Id
     * @return array
     */
    public function getAllByUserId($userId): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM prefix_link WHERE user_fk = :userId");
        $stmt->bindValue(':userId', $userId);

        if($stmt->execute() && $linkDatas = $stmt->fetchAll()) {
            foreach ($linkDatas as $linkData) {
                $array[] = new Links($linkData['id'], $linkData['href'], $linkData['title'], $linkData['target'], $linkData['name'], $linkData['user_fk'], $linkData['click'], $linkData['src']);
            }
        }
        return $array;
    }

    public function editLink($href, $title, $target, $name, $linkId) :bool
    {
        $stmt = Database::getInstance()->prepare("UPDATE prefix_link SET href = :href AND title = :title AND target = :target AND name = :name AND src = :src
                                                    WHERE id = :linkId");
        $thumb = new ThumbalizrController();
        $stmt->bindValue(":href", $href);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":target", $target);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":linkId", $linkId);
        $stmt->bindValue(":src", $thumb->thumbalizr($href));

        return $stmt->execute();
    }

    public function addClick($linkId, $click) :bool
    {
        $stmt = Database::getInstance()->prepare("UPDATE prefix_link SET click = :click WHERE id = :linkId");
        $stmt->bindValue(":click", $click);
        $stmt->bindValue(":linkId", $linkId);

        return $stmt->execute();
    }

    public function getOneLink($linkId) :bool
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM prefix_link WHERE id = :linkId");
        $stmt->bindValue(":linkId", $linkId);

        return $stmt->execute();
    }
}