<?php
declare(strict_types=1);

namespace  App\Service;

use App\Controller\Frontoffice\PostController;
use App\Model\Manager\PostManager;
use App\Model\Repository\PostRepository;
use App\View\View;

// cette classe router est un exemple très basic. Cette façon de faire n'est pas optimale
class Router
{
    public function __construct()
    {
        // dépendance 
        $this->postRepo = new PostRepository();
        $this->postManager = new PostManager($this->postRepo);
        $this->view = new View();

        // injection des dépendances
        $this->postController = new PostController($this->postManager, $this->view);
        
        // En attendent de mettre ne place la class App\Service\Http\Request
        $this->get = $_GET;
    }

    public function run(): void
    {
        $action = isset($this->get['action']) && isset($this->get['id']) && $this->get['action'] === 'post';

        if ($action) {
            // route http://localhost:8000/?action=post&id=5
            
            $this->postController->displayOneAction((int)$this->get['id']);
        } elseif (!$action) {
            // faire un controller pour la gestion d'erreur
            echo "Error 404 - cette page n'existe pas<br><a href='http://localhost:8000/?action=post&id=5'>Ici</a>";
        }
    }
}
