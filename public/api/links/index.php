<?php

require "../../../vendor/autoload.php";

use Bosqu\ProjetLinksHandler\Model\Entity\Links;
use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new LinksManager();

switch($requestType)
{
    // Obtention d'informations.
    case 'POST':
        addLink(json_decode(file_get_contents("php://input")));
        break;
    case 'GET':
        echo getAll($manager);
        break;
    default:
        break;
}

/**
 * Return the list.
 * @param LinksManager $manager
 * @return false|string
 */
function getAll(LinksManager $manager): string
{
    $response = [];
    // Obtention des links.
    $data = $manager->getAll();
    foreach($data as $link)
    {
        /* @var Links $links */
        $response[] = [
            'id' => $link->getId(),
            'href'=> $link->getHref(),
            'title' => $link->getTitle(),
            'target' => $link->getTarget(),
            'name' => $link->getName(),
        ];
    }
    return json_encode($response);
}

function addLink($data)
{
    $manager = new LinksManager();
    $manager->addLink($data->href, $data->title, $data->target, $data->name);
}