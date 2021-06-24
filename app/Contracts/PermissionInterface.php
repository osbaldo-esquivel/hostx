<?php namespace App\Contracts;

interface PermissionInterface
{
    public function getPermission(string $permission): PermissionInterface;

    public function attachPermission(/*string|array*/ $permissions): PermissionInterface;

    public function detachPermission(/*string|array*/ $permissions): PermissionInterface;

    public function canAny(array $permissions, array $context = []): bool;

    public function canAll(array $permissions, array $context = []): bool;

    public function can(string $permission, array $context = []): bool;

    public function cant(string $permission, array $context = []): bool;
}