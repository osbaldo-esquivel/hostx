<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'team_id', 'role_id', 'affiliate_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTeamName(): ?string
    {
        return $this->getTeam()->name;
    }

    public function getRoleName(): ?string
    {
        return $this->getRole()->name;
    }

    public function getRole()
    {
        return $this->role()->first();
    }

    public function getTeam()
    {
        return $this->team()->first();
    }

    public function getToken()
    {
        $this->token()->first()
            ? $this->token()->token
            : null;
    }

    public function setToken(string $token_id)
    {
        $this->token_id = $token_id;

        $this->save();

        return $this;
    }

    private function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    private function team(): HasOne
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    private function token()
    {
        return $this->hasOne(ApiToken::class, 'id', 'token_id');
    }
}
