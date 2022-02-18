<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @method string getUserIdentifier()
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    private $apiToken;

    /**
     * @ORM\Column (type="string", unique=false, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column (type="string", unique=false, nullable=true)
     */
    private $salt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
        return $this;
    }


    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

}
