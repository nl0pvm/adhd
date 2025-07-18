<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordResetTokenModel extends Model
{
    protected $table      = 'password_reset_tokens';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'token',
        'expires_at',
    ];

    protected $useTimestamps = true;
    protected $returnType    = 'array';
}
