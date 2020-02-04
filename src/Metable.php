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
        return collect($this->meta()->pluck('value', 'key'));
    }

    /**
     * Has meta.
     *
     * @param  string $key
     * @return bool
     */
    public function hasMeta($key)
    {
        return (bool) $this->meta()->where('key', $key)->count();
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
        if ($meta = $this->meta()->where('key', $key)->first()) {
            return $meta;
        }

        return $default;
    }

    /**
     * Get meta value.
     *
     * @param  string $key
     * @return object
     */
    public function getMetaValue($key)
    {
        if($meta = $this->getMeta($key)) {
            return $meta->value;
        }
    }

    /**
     * Add meta.
     *
     * @param string $key
     * @param mixed $value
     */
    public function addMeta($key, $value)
    {
        if ($this->hasMeta($key)) {
            return false;
        }

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
     * @return object|bool
     */
    public function updateMeta($key, $value)
    {
        if ($meta = $this->getMeta($key)) {
            return $meta->update(['value' => $value]);
        }

        return false;
    }

    /**
     * Add or update meta if it already exists.
     *
     * @param  string $key
     * @param  mixed $value
     * @return object|bool
     */
    public function addOrUpdateMeta($key, $value)
    {
        if ($this->hasMeta($key)) {
            return $this->updateMeta($key, $value);
        }

        return $this->addMeta($key, $value);
    }

    /**
     * Delete meta.
     *
     * @param  string $key
     * @param  mixed $value
     * @return bool
     */
    public function deleteMeta($key)
    {
        return $this->meta()->where('key', $key)->delete();
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
