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
     * No timestamps for meta data
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Defining fillable attributes on the model
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
     * Relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function metable()
    {
        return $this->morphTo();
    }
}
