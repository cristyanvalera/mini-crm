<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case ManageUsers = 'manage_users';
    case DeleteUsers = 'delete_users';
    case DeleteClients = 'delete_clients';
    case DeleteProjects = 'delete_projects';
    case DeleteTasks = 'delete_tasks';
}
