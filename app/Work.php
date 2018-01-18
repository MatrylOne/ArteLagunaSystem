<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 * @package App
 */
class Work extends Model
{
    /**
     * Category that works is assigned to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo("App\Category");
    }

    /**
     * Award that work has
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function award(){
        return $this->hasOne("App\Award");
    }

    /**
     * Users that made this work
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany("App\User");
    }

    /**
     * Give award to this work
     * @param Award $award
     */
    public function giveAward(Award $award){
        $award->assign($this);
    }
}
