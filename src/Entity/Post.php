<?php


namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Post
 * @package App\Entity
 * @ORM\Entity
 */

class Post
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
    private String $content;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="date_immutable")
     */
    private DateTimeInterface $publishedAt;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    private User $author;

    /**
     * @var User[]
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="post_likes")
     */
    private array $likedBy;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable();
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param String $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return DateTimeInterface
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTimeInterface $publishedAt
     */
    public function setPublishedAt($publishedAt): void
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
     * @return User[]
     */
    public function getLikedBy(): array
    {
        return $this->likedBy;
    }

    /**
     * @param User[] $likedBy
     */
    public function setLikedBy(array $likedBy): void
    {
        $this->likedBy = $likedBy;
    }


}