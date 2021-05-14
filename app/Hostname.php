<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostname extends Model
{
    protected $table = 'domains';

    protected $fillable = ['domain', 'tld', 'type', 'user_id'];

    public function getUser()
    {
        return $this->user()->first();
    }

    private function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}