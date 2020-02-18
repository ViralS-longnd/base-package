<?php


namespace ViralsInfyom\ViralsBase\app\Models;

use App\User;
use ViralsInfyom\ViralsPermission\Models\Traits\InheritsRelationsFromParentModel;

class UserViral extends User
{
    use InheritsRelationsFromParentModel;

    protected $table = 'users';
}