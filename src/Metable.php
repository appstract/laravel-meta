<?php

namespace Appstract\Meta;

trait Metable
{
    /**
     * Get all meta.
     *
     * @return object
     */
    public function getAllMeta()
    {
        return collect($this->meta->pluck('value', 'key'));
    }

    /**
     * Get meta.
     *
     * @param  string $key
     * @param  mixed $default
     * @return object
     */
    public function getMeta($key, $default = null)
    {
        $meta = $this->meta()->where('key', $key)->get();

        if($meta->count() <= 1) {
            return $meta->count() == 1 ? $meta->first() : $default;
        }

        return $meta;
    }

    /**
     * Add meta.
     *
     * @param string $key
     * @param mixed $value
     */
    public function addMeta($key, $value)
    {
        return $this->meta()->create([
            'key'   => $key,
            'value' => $value,
        ]);
    }

    /**
     * Update meta.
     *
     * @param  string $key
     * @param  mixed $value
     * @return object|boolean
     */
    public function updateMeta($key, $value)
    {
        if($meta = $this->getMeta($key)) {
            $meta->value = $value;

            return $meta->save();
        }

        return false;
    }

    /**
     * Delete meta.
     *
     * @param  string $key
     * @param  mixed $value
     * @return bool
     */
    public function deleteMeta($key, $value = null)
    {
        return $value
            ? $this->meta()->where('key', $key)->where('value', $value)->delete()
            : $this->meta()->where('key', $key)->delete();
    }

    /**
     * Delete all meta.
     *
     * @return bool
     */
    public function deleteAllMeta()
    {
        return $this->meta()->delete();
    }

    /**
     * Meta relation.
     *
     * @return object
     */
    public function meta()
    {
        return $this->morphMany(\Appstract\Meta\Meta::class, 'metable');
    }
}
