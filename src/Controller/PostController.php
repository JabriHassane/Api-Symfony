<?php


namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * Class PostController
 * @package App\Controller
 * @Route("/posts")
 */
class PostController
{
    /**
     * @Route(name="api_posts_collection_get", methods={"GET"})
     * @param PostRepository $postRepository
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function collection(PostRepository $postRepository, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($postRepository->findAll(), "json", ["groups"=>"get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/{id}", name="api_posts_item_get", methods={"GET"})
     * @param Post $post
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function item(Post $post, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($post, "json", ["groups"=>"get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }
}