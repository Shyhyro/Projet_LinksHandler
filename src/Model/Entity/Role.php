<?php

namespace Bosqu\ProjetLinksHandler\Model\Entity;

class Role
{
    private ?int $id;
    private ?string $role;

    /**
     * Role constructor.
     * @param int|null $id
     * @param string|null $role
     */
    public function __construct(int $id = null, string $role = null)
    {
        $this->id = $id;
        $this->role = $role;
    }

    /**
     * Get id of role
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get name of role
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
}