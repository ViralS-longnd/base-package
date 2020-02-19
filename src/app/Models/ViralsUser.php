<?php


namespace ViralsPackage\ViralsBase\Models;

use App\User;
use ViralsInfyom\ViralsPermission\Models\Traits\InheritsRelationsFromParentModel;

class ViralsUser extends User
{
    use InheritsRelationsFromParentModel;

    protected $table = 'users';
}