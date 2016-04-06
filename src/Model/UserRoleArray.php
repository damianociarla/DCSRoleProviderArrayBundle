<?php

namespace DCS\Role\Provider\ArrayBundle\Model;

/**
 * Class ArrayRoleEditable
 *
 * @property array $roles
 */
trait UserRoleArray
{
    /**
     * Add role if not exists
     *
     * @param $role
     * @return void
     */
    public function addRole($role)
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = $role;
        }
    }

    /**
     * Remove role if exists
     *
     * @param string $role
     * @return void
     */
    public function removeRole($role)
    {
        if ($this->hasRole($role)) {
            unset($this->roles[array_search($role, $this->roles)]);
        }
    }

    /**
     * Check if role exists
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return in_array($role, is_array($this->roles) ? $this->roles : []);
    }

    /**
     * Init all user roles
     *
     * @return void
     */
    protected function initRoles()
    {
        $this->roles = [];
    }
}