<?php namespace App\Contracts;

interface RoleInterface
{
    public function hasRole(string $role): bool;

    public function hasAnyRole(array $enforcer): bool;

    public function getRoles(): array;

    public function getRole(string $role): RoleInterface;

    public function attachRoles(/*string|array*/ $enforcer): RoleInterface;

    public function detachRoles(/*string|array*/ $enforcer): RoleInterface;

    public function attachPermissions(/*string|array*/ $permissions, array $context = []): RoleInterface;

    public function detachPermissions(/*string|array*/ $permissions): RoleInterface;

    public function detachAllPermissions(): RoleInterface;

    public function getPermissions(): array;

    public function canAny(array $permissions, array $context = []): bool;

    public function canAll(array $permissions, array $context = []): bool;

    public function can(string $permission, array $context = []): bool;

    public function cant(string $permission, array $context = []): bool;

    public function allowed(string $action, string $resource, array $context = []): bool;
}

$user->hasRole('admin'); // true
$user->hasAnyRole(['admin', 'owner']); // true
$user->getRoles(); // ['owner', 'admin']
$user->attachRole('admin'); // RoleInterface
$user->detachRole('installer'); // RoleInterface
$user->attachRoles(['installer', 'billing']); // RoleInterface
$user->attachPermission('owner'); // RoleInterface
$user->getRole('owner')->can('create:zones'); // false
$user->getRole('installer')->can('read:zones', ['ip' => $ip]); // false
$user->getRole('installer')->can('read:billing', ['route' => '/billing']); // true
$user->getRole('installer')->canAny(['create:zones', 'read:zones']); //true
$user->getRole('installer')->attachPermission('read:devices'); // RoleInterface
$user->getRole('admin')->detachAllPermissions(); // RoleInterface
$user->getRole('admin')->detachPermissions(['read:devices', 'write:devices']); // RoleInterface
$user->getRole('billing')->getPermissions(); // ['read:billing', 'write:billing']
$user->allowed('read', '/billing'); // true

$user_id = 1234;
$this->enforcer()->hasRole($user_id, 'admin'); // false
$this->enforcer()->getRole($user_id, 'admin')->can('read:billing'); // true
$this->enforcer()->allowed($user_id, 'write', '/billing', ['ip' => $ip, 'zone' => 'example.com']); // false
$this->enforcer()->attachRole($user_id, 'installer'); // RoleInterface
$this->enforcer()->canAny($user_id, ['read:billing', 'write:billing']); // true
$this->enforcer()->getRole($user_id, 'installer')->attachPermissions(['read:devices', 'write:devices'], ['zone' => 'example.com']);
$this->enforcer()->getRole($user_id, 'billing')->getPermissions(); // ['permissions' => ['read:billing', 'write:billing'], 'context' => ['zone' => 'example.com']]

protected $routeMiddleware = [
    // ...
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];

Route::group(['middleware' => ['role:owner']], function () {
    // ...
});

Route::group(['middleware' => ['role:admin', 'role:billing']], function () {
    // ...
});

@hasRole('admin')
    
@endhasRole

@hasAnyRole(['owner', 'admin'])

@endhasAnyRole
