<?php
declare(strict_types=1);

namespace App\Model\Manager;

use App\Model\Entity\Post;
use App\Model\Repository\PostRepository;

class PostManager
{
    private $postRepo;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepo = $postRepository;
    }
    
    public function showOne(int $id): ?Post
    {
        // *** exemple fictif d'accès à la base de données
        if ($id > 600) {
            return null;
        }
        
        $data = $this->postRepo->findById($id);

        // réfléchir à l'hydratation des entités
        $post = new Post();
        $post
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setText($data['text'])
        ;
        return $post;
    }
}
