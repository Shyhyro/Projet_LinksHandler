<?php

namespace Bosqu\ProjetLinksHandler\Model\Manager;

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
                $array[] = new Links($linkData['id'], $linkData['href'], $linkData['title'], $linkData['target'], $linkData['name']);
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
     * @return bool
     */
    public function addLink($href, $title, $target, $name) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO prefix_link (href, title, target, name) VALUES (:href, :title, :target, :name)");
        $stmt->bindValue(':href', $href);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':target', $target);
        $stmt->bindValue(':name', $name);

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
}