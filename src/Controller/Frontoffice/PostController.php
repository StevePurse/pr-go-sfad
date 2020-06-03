<?php
declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Model\Entity\Post;
use App\Model\Manager\PostManager;
use App\View\View;

class PostController
{
    private $postManager;
    private $view;

    public function __construct(PostManager $postManager, View $view)
    {
        $this->postManager = $postManager;
        $this->view = $view;
    }
    
    public function displayOneAction(int $id): void
    {
        $data = $this->postManager->showOne($id);

        if ($data instanceof Post) {
            $this->view->render(['onepost' => $data]);
        } elseif ($data === null) {
            echo '<h1>faire une redirection vers la page d\'erreur, ce post n\'existe pas</h1>';
        }
    }
}
