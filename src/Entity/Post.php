<?php


namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"get"})
     */
    private ?int $id;

    /**
     * @var String
     * @ORM\Column(type="text")
     * @Groups({"get"})
     */
    private String $content;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="date_immutable")
     * @Groups({"get"})
     */
    private DateTimeInterface $publishedAt;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    private User $author;

    /**
     * @var User[]|Collection
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="post_likes")
     */
    private Collection $likedBy;

    /**
     * @param string $content
     * @param User $author
     * @return static
     */
    public static function create(string $content, User $author):self
    {
        $post = new  Post();
        $post->content = $content;
        $post->author = $author;

        return $post;
    }

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable();
        $this->likedBy = new ArrayCollection();
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
     * @return User[]|Collection
     */
    public function getLikedBy(): Collection
    {
        return $this->likedBy;
    }

    /**
     * @param User $user
     */
    public function likeBy(User $user): void
    {
        if($this->likedBy->contains($user)){
            return;
        }
        $this->likedBy->add($user);
    }

    /**
     * @param User $user
     */
    public function dilikeBy(User $user): void
    {
        if(!$this->likedBy->contains($user)){
            return;
        }
        $this->likedBy->removeElement($user);
    }


}