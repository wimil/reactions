<?php

namespace Wimil\Reactions\Model;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['reacterable_id', 'reacterable_type', 'reaction_type_id', 'rate'];

    //el que va a reaccionar
    public function reacterable()
    {
        return $this->morphTo();
    }

    //el que recivira la reaccion
    public function reactable()
    {
        return $this->morphTo();
    }

    /**
     * Get the format for database stored dates.
     *
     * @return string
     */
    public function getDateFormat()
    {
        if (config('reactions.timestamps')) {
            return 'Y-m-d H:i:s';
        } else {
            return 'U';
        }
    }
}
