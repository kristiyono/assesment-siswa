<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType = "object";

    protected $allowedFields = ['nama', 'user_id', 'nik', 'phone', 'username', 'email', 'password', 'status', 'created_by', 'updated_by'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}
