<?php

namespace Appstract\Meta;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meta';

    /**
     * No timestamps for meta data.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Defining fillable attributes on the model.
     *
     * @var array
     */
    protected $fillable = [
        'metable_id',
        'metable_type',
        'key',
        'value',
    ];

    /**
     * Get value.
     *
     * @param  string $value
     * @return mixed
     */
    public function getValueAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Set value.
     *
     * @param mixed $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = json_encode($value);
    }

    /**
     * Relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function metable()
    {
        return $this->morphTo();
    }
}
