<?php

namespace App;

use App\Post;
use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,SoftDeletes;

    protected $guarded = [];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function roles(){

        return $this->belongsToMany(Role::class);
    }

    public function isSuperAdmin(){
        
        $roles = $this->roles()->get();

        foreach($roles as $role){

            if($role->name == "superadministrator"){
                return true;
            }
        }

        return false;
    }



    public function isAdmin(){
        
        $roles = $this->roles()->get();

        foreach($roles as $role){

            if($role->name === "admin"){
                return true;
            }
        }

        return false;
    }


    public function isAuthor(){
        
        $roles = $this->roles()->get();

        foreach($roles as $role){

            if($role->name === "author"){
                return true;
            }
        }

        return false;
    }

    public function hasPermission($action){

        $roles = $this->roles()->get();


        foreach($roles as $role){

            $permissions = $role->permissions()->get();
            foreach($permissions as $permission){
            
                if($permission->key == $action){
                    return 1;
                } 
    
            }

            return false;
                

        }
    }

    
}
