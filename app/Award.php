<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Award Model
 * @package App
 */
class Award extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'place', 'category_id', 'description',
    ];

    /**
     * Work that has this award
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work(){
        return $this->belongsTo('App\Work');
    }

    /**
     * Category whitch this award belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo("App\Category");
    }

    /**
     * Assign award to work
     *
     * @param Work $work
     * @return bool
     */
    public function assign(Work $work){
        $this->work_id = $work->id;
        return $this->save();
    }

    /**
     * Returns awards edition id
     * @return mixed
     */
    public function edition(){
        return $this->category->edition->id;
    }

    /**
     * Table in database that coresponds to award model
     * @var string
     */
    protected $table = 'awards';
}
