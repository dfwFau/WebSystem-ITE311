<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'created_at',
        'updated_at',
        'force_logout_at',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    /**
     * Find user by email with role information
     * 
     * @param string $email
     * @return array|null
     */
    public function findByEmailWithRole($email)
    {
        $builder = $this->builder();
        $builder->select('users.*, roles.role_name as role');
        $builder->join('roles', 'users.role_id = roles.id', 'left');
        $builder->where('users.email', $email);
        
        // Include soft-deleted users for login purposes
        $builder->where('users.deleted_at', null);
        
        $result = $builder->get()->getRowArray();
        return $result;
    }

    /**
     * Get all users by role name
     * 
     * @param string $roleName
     * @return array
     */
    public function getUsersByRoleName($roleName)
    {
        $builder = $this->builder();
        $builder->select('users.*, roles.role_name as role');
        $builder->join('roles', 'users.role_id = roles.id', 'left');
        $builder->where('roles.role_name', $roleName);
        $builder->where('users.deleted_at', null);
        
        return $builder->get()->getResultArray();
    }

    /**
     * Count users by role name
     * 
     * @param string $roleName
     * @return int
     */
    public function countUsersByRoleName($roleName)
    {
        $builder = $this->builder();
        $builder->select('COUNT(users.id) as count');
        $builder->join('roles', 'users.role_id = roles.id', 'left');
        $builder->where('roles.role_name', $roleName);
        $builder->where('users.deleted_at', null);
        
        $result = $builder->get()->getRowArray();
        return (int) ($result['count'] ?? 0);
    }
}


