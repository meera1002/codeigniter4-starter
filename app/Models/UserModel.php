<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'verified', 'email', 'phone', 'password', 'dob', 'country','subscription', 'role_id', 'created_at', 'updated_at'];
    public function addUser(){

    }
}