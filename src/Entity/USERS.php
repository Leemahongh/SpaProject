<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $NOM;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $PRENOM;

    /**
     * @ORM\Column(type="datetime")
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
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $ADRESS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=8)
     */
    private $POSTAL_CODE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=5)
     */
    private $CITY;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=6, max=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=255)
     */
    private $username;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNOM(): ?string
    {
        return $this->NOM;
    }

    /**
     * @param string $NOM
     * @return USERS
     */
    public function setNOM(string $NOM): self
    {
        $this->NOM = $NOM;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPRENOM(): ?string
    {
        return $this->PRENOM;
    }

    /**
     * @param string $PRENOM
     * @return USERS
     */
    public function setPRENOM(string $PRENOM): self
    {
        $this->PRENOM = $PRENOM;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getBIRTHDAY(): ?\DateTimeInterface
    {
        return $this->BIRTHDAY;
    }

    /**
     * @param \DateTimeInterface $BIRTHDAY
     * @return USERS
     */
    public function setBIRTHDAY(\DateTimeInterface $BIRTHDAY): self
    {
        $this->BIRTHDAY = $BIRTHDAY;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getADMIN(): ?bool
    {
        return $this->ADMIN;
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

        $this->ADMIN = '0';
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCREATEDAT(): ?\DateTimeInterface
    {
        return $this->CREATED_AT;
    }

    /**
     * @param \DateTimeInterface $CREATED_AT
     * @return USERS
     */
    public function setCREATEDAT(\DateTimeInterface $CREATED_AT): self
    {
        $this->CREATED_AT = $CREATED_AT;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getADRESS(): ?string
    {
        return $this->ADRESS;
    }

    /**
     * @param string|null $ADRESS
     * @return USERS
     */
    public function setADRESS(?string $ADRESS): self
    {
        $this->ADRESS = $ADRESS;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPOSTALCODE(): ?string
    {
        return $this->POSTAL_CODE;
    }

    /**
     * @param string|null $POSTAL_CODE
     * @return USERS
     */
    public function setPOSTALCODE(?string $POSTAL_CODE): self
    {
        $this->POSTAL_CODE = $POSTAL_CODE;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCITY(): ?string
    {
        return $this->CITY;
    }

    /**
     * @param string|null $CITY
     * @return USERS
     */
    public function setCITY(?string $CITY): self
    {
        $this->CITY = $CITY;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return USERS
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return USERS
     */
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

    /**
     * @param string $username
     * @return USERS
     */
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
