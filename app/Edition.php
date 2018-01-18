<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Edition Model
 * @package App
 */
class Edition extends Model
{

    /**
     * Categories that belongs to this edition
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){
        return $this->hasMany("App\Category");
    }

    /**
     * Mark edition as active
     * @return bool
     */
    public function activate(){
        $this->isActive = true;
        return $this->save();
    }

    /**
     * Mark edition as not active
     * @return bool
     */
    public function deactivate(){
        $this->isActive = false;
        return $this->save();
    }

    /**
     * Make revision
     * @return bool
     */
    public function revision(){
        $this->revisionDate = NOW();
        return $this->save();
    }

    /**
     * Table in database that coresponds to this model
     * @var string
     */
    protected $table = 'editions';
}
