<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['role_name', 'role_description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get role ID by role name
     */
    public function getRoleIdByName($roleName)
    {
        $role = $this->where('role_name', $roleName)->first();
        return $role ? $role['id'] : null;
    }

    /**
     * Get role name by role ID
     */
    public function getRoleNameById($roleId)
    {
        $role = $this->find($roleId);
        return $role ? $role['role_name'] : null;
    }
}

