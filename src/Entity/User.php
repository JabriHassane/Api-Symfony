<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class User
 * @package App\Entity
 * @ORM\Entity
 */

class User
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
     * @ORM\Column(unique=true)
     */
    private String $email;

    /**
     * @var String
     * @ORM\Column
     */
    private String $password;

    /**
     * @var String
     * @ORM\Column
     */
    private String $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}