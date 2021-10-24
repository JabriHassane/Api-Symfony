<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package App\Entity
 * @ORM\Entity
 */

class Comment
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var String
     * @ORM\Column(type="text")
     */
    private String $comment;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="date_immutable")
     */
    private \DateTimeInterface $publishedAt;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    private User $author;

    /**
     * @var Post
     * @ORM\ManyToOne(targetEntity="Post")
     */
    private Post $post;

    /**
     * Comment constructor.
     */
    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable();
    }

    /**
     * @param string $comment
     * @param User $author
     * @param Post $post
     * @return static
     */
    public static function create(string $comment, User $author, Post $post):self
    {
        $commant = new  self();
        $commant->comment = $comment;
        $commant->author = $author;
        $commant->post = $post;

        return $commant;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param String $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPublishedAt(): \DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTimeInterface $publishedAt
     */
    public function setPublishedAt(\DateTimeInterface $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * @param Post $post
     */
    public function setPost(Post $post): void
    {
        $this->post = $post;
    }

}