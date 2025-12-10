<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentStatusModel extends Model
{
    protected $table = 'enrollment_statuses';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['status_name', 'status_description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get status ID by status name
     */
    public function getStatusIdByName($statusName)
    {
        $status = $this->where('status_name', $statusName)->first();
        return $status ? $status['id'] : null;
    }

    /**
     * Get status name by status ID
     */
    public function getStatusNameById($statusId)
    {
        $status = $this->find($statusId);
        return $status ? $status['status_name'] : null;
    }
}

