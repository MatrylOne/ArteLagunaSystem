<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'country',
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
     * Works that belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function works(){
        return $this->belongsToMany("App\Work");
    }

    /**
     * Check if user is admin
     *
     * @return bool
     */
    public function isAdmin(){
        return $this->isAdmin == true;
    }

    /**
     * Check if user is active
     *
     * @return bool
     */
    public function isActive(){
        return $this->isActive == true;
    }

   // Metody do zrządzania użytkownikami

    /**
     * Gives user Admin role
     *
     */
    public function giveAdmin(){
        $this->isAdmin = true;
        $this->save();
    }

    /**
     * Removes admin role from user
     *
     */
    public function takeAdmin(){
        $this->isAdmin = false;
        $this->save();
    }

    /**
     * Makes user active
     *
     */
    public function activate(){
        $this->isActive = true;
        $this->save();
    }

    /**
     * Deactivate user
     *
     */
    public function deactivate(){
        $this->isActive = false;
        $this->save();
    }

    /**
     * Assigns work to user
     *
     * @param Work $work
     */
    public function assignWork(Work $work){
        $this->work_id = $work->id;
        $this->save();
    }
}
