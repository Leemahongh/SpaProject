<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\USERSRepository")
 */
class USERS implements UserInterface,\Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NOM;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRENOM;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $BIRTHDAY;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ADMIN;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CREATED_AT;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ADRESS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $POSTAL_CODE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CITY;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNOM(): ?string
    {
        return $this->NOM;
    }

    public function setNOM(string $NOM): self
    {
        $this->NOM = $NOM;

        return $this;
    }

    public function getPRENOM(): ?string
    {
        return $this->PRENOM;
    }

    public function setPRENOM(string $PRENOM): self
    {
        $this->PRENOM = $PRENOM;

        return $this;
    }

    public function getBIRTHDAY(): ?string
    {
        return $this->BIRTHDAY;
    }

    public function setBIRTHDAY(string $BIRTHDAY): self
    {
        $this->BIRTHDAY = $BIRTHDAY;

        return $this;
    }

    public function getADMIN(): ?bool
    {
        return $this->ADMIN;
    }

    public function setADMIN(bool $ADMIN): self
    {
        $this->ADMIN = $ADMIN;

        return $this;
    }

    /**
     * USERS constructor.
     */
    public function __construct()
    {
        try {
            $this->CREATED_AT = new \DateTime();
        } catch (\Exception $e) {
        }
    }

    public function getCREATEDAT(): ?\DateTimeInterface
    {
        return $this->CREATED_AT;
    }

    public function setCREATEDAT(\DateTimeInterface $CREATED_AT): self
    {
        $this->CREATED_AT = $CREATED_AT;

        return $this;
    }

    public function getADRESS(): ?string
    {
        return $this->ADRESS;
    }

    public function setADRESS(?string $ADRESS): self
    {
        $this->ADRESS = $ADRESS;

        return $this;
    }

    public function getPOSTALCODE(): ?string
    {
        return $this->POSTAL_CODE;
    }

    public function setPOSTALCODE(?string $POSTAL_CODE): self
    {
        $this->POSTAL_CODE = $POSTAL_CODE;

        return $this;
    }

    public function getCITY(): ?string
    {
        return $this->CITY;
    }

    public function setCITY(?string $CITY): self
    {
        $this->CITY = $CITY;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {

    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

}
