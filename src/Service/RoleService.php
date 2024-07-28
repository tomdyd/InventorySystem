<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchy;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;

class RoleService
{
    private $parameters;

    public function __construct(ParameterBagInterface $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getRoles()
    {
        $roles = $this->parameters->get('security.role_hierarchy.roles');
        // Flatten the role hierarchy to a simple array of roles
        $flattenedRoles = [];
        foreach ($roles as $role => $subRoles) {
            $flattenedRoles[$role] = $role;
            foreach ($subRoles as $subRole) {
                $flattenedRoles[$subRole] = $subRole;
            }
        }

        asort($flattenedRoles);
        return $flattenedRoles;
    }
}