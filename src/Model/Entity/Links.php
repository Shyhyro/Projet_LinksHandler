<?php

namespace Bosqu\ProjetLinksHandler\Model\Entity;

class Links
{
    private ?int $id;
    private ?string $href;
    private ?string $title;
    private ?string $target;
    private ?string $name;
    private ?int $user_fk;
    private ?int $click;

    /**
     * Links constructor.
     * @param int|null $id
     * @param string|null $href
     * @param string|null $title
     * @param string|null $target
     * @param string|null $name
     * @param int|null $user_fk
     * @param int|null $click
     */
    public function __construct(int $id = null, string $href = null, string $title = null, string $target = null, string $name = null, int $user_fk = null, int $click = null)
    {
        $this->id = $id;
        $this->href = $href;
        $this->title = $title;
        $this->target = $target;
        $this->name = $name;
        $this->user_fk = $user_fk;
        $this->click = $click;
    }

    /**
     * Get id of Links
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get href of Links
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * Set href of Links
     * @param string|null $href
     * @return Links
     */
    public function setHref(?string $href): Links
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Get title of Links
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title of Links
     * @param string|null $title
     * @return Links
     */
    public function setTitle(?string $title): Links
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get target of Links
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * Set target of Links
     * @param string|null $target
     * @return Links
     */
    public function setTarget(?string $target): Links
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Get name of Links
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name of Links
     * @param string|null $name
     * @return Links
     */
    public function setName(?string $name): Links
    {
        $this->name = $name;
        return $this;
    }

    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    public function setUserFk($user_fk): Links
    {
        $this->user_fk = $user_fk;
        return $this;
    }

    /**
     * Get click of Links
     * @return int|null
     */
    public function getClick(): ?int
    {
        return $this->click;
    }

    /**
     * Set click of Links
     * @param int|null $click
     * @return Links
     */
    public function setClick(?int $click): Links
    {
        $this->click = $click;
        return $this;
    }
}