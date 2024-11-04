<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case ManageUsers = 'manage:users';
    case DeleteClients = 'delete:clients';
    case DeleteProjects = 'delete:projects';
    case DeleteTasks = 'delete:tasks';
}
