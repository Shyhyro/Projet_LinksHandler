<?php

namespace Bosqu\ProjetLinksHandler\Model\Entity;

class User
{
    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $mail;
    private ?string $pass;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $nom
     * @param string|null $prenom
     * @param string|null $mail
     * @param string|null $pass
     */
    public function __construct(int $id = null, string $nom = null, string $prenom = null, string $mail = null, string $pass = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
    }

    /**
     * Get id of User
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get nom of User
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set nom of User
     * @param string|null $nom
     * @return User
     */
    public function setNom(?string $nom): User
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get prénom of User
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set prénom of User
     * @param string|null $prenom
     * @return User
     */
    public function setPrenom(?string $prenom): User
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get email of User
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set email of User
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Get password of User
     * @return string|null
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * Set password of User
     * @param string|null $pass
     * @return User
     */
    public function setPass(?string $pass): User
    {
        $this->pass = $pass;
        return $this;
    }
}