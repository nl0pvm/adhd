<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'username',
        'email',
        'password_hash',
        'role_id',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|max_length[255]',
        'password' => 'permit_empty|min_length[8]',
        'role_id'  => 'required|is_natural_no_zero',
    ];

    public function createUser(array $data): int
    {
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }

        $this->insert($data);

        return $this->getInsertID();
    }

    public function getUser(int $id): ?array
    {
        return $this->select('users.*, roles.name as role_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->find($id);
    }

    public function updateUser(int $id, array $data): bool
    {
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }

        return $this->update($id, $data);
    }

    public function deleteUser(int $id, bool $purge = false): bool
    {
        return $this->delete($id, $purge);
    }
}
