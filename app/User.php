<?php

namespace Boye;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Boye\Support\FilterPaginateOrder;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use FilterPaginateOrder;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email','status', 'is_admin', 'password',
    ];
    protected $filter = ['id', 'username', 'email', 'name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
