<?php

require "../../../vendor/autoload.php";

session_start();

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
    case 'DELETE':
        delete(json_decode(file_get_contents("php://input")));
        break;
    case 'PUT':
        updateClick(json_decode(file_get_contents("php://input")));
        break;
    /*case 'SEARCH':
        echo getOneLink($manager);
        break;*/
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
    $data = $manager->getAllByUserId($_SESSION['id']);
    foreach($data as $link)
    {
        /* @var Links $links */
        $response[] = [
            'id' => $link->getId(),
            'href'=> $link->getHref(),
            'title' => $link->getTitle(),
            'target' => $link->getTarget(),
            'name' => $link->getName(),
            'user' => $link->getUserFk(),
            'click' => $link->getClick(),
            'src' => $link->getSrc()
        ];
    }
    return json_encode($response);
}

/*
function getOneLink(LinksManager $manager, $data): string
{
    $id = filter_var($data->id, FILTER_SANITIZE_NUMBER_INT);

    $response = [];
    // Obtention des links.
    $data = $manager->getOneLink($id);
    foreach($data as $link)
    {
        $response[] = [
            'id' => $link->getId(),
            'href'=> $link->getHref(),
            'title' => $link->getTitle(),
            'target' => $link->getTarget(),
            'name' => $link->getName(),
            'user' => $link->getUserFk(),
            'click' => $link->getClick(),
            'src' => $link->getSrc()
        ];
    }
    return json_encode($response);
}
*/

function addLink($data)
{
    $manager = new LinksManager();
    $user = $_SESSION['id'];
    $manager->addLink($data->href, $data->title, $data->target, $data->name, $user);
}

function delete($data)
{
    $id = filter_var($data->id, FILTER_SANITIZE_NUMBER_INT);
    (new LinksManager())->removeLink($id);
}

function updateClick($data)
{
    $id = filter_var($data->id, FILTER_SANITIZE_NUMBER_INT);
    $click = filter_var($data->click, FILTER_SANITIZE_NUMBER_INT) + 1;

    (new LinksManager())->addClick($id, $click);
}