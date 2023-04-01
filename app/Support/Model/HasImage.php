<?php

namespace App\Support\Model;

use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    /**
     * Get image
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(ModelsImage::class, 'imageable');
    }

    /**
     * Create image and save it to storage.
     *
     * @param  string $key
     * @param  string $relation
     * @return void
     */
    public function createImage(string $key, $relation = 'image')
    {
        if ($file = request()->file($key)) {
            $image = $this->putImage($file);

            $this->$relation()->create([
                'name' => $image,
                'url' => Storage::url($image)
            ]);
        }
    }

    /**
     * Create image and save it to storage.
     *
     * @param  string|array $column
     * @return void
     */
    public function createImageAtColumn($column)
    {
        if (is_array($column)) {
            foreach ($column as $col) {
                $this->createImageAtColumn($col);
            }
        } else {
            if ($file = request()->file($column)) {
                $image = $this->putImage($file);

                $this->update([
                    $column => $image,
                ]);
            }
        }
    }

    /**
     * Get image url.
     *
     * @param  string|array $column
     * @return void
     */
    public function getImageAtColumn($column)
    {
        if ($this->$column) {
            return Storage::url($this->getDirectory() . $this->$column);
        }

        return null;
    }

    /**
     * Update image and save it to storage.
     *
     * @param  string $key
     * @param  string $relation
     * @return void
     */
    public function updateImage(string $key, $relation = 'image')
    {
        $this->load($relation);

        if ($file = request()->file($key)) {
            if ($this->$relation) {
                $this->removeImage($this->image->name);
            }

            $image = $this->putImage($file);

            if (!$this->$relation) {
                $this->$relation()->updateOrCreate([], [
                    'name' => $image,
                    'url' => Storage::url($image)
                ]);
            } else {
                $this->$relation->update([
                    'name' => $image,
                    'url' => Storage::url($image)
                ]);
            }
        }
    }

    /**
     * Update image and save it to storage.
     *
     * @param  string|array $column
     * @return void
     */
    public function updateImageAtColumn($column)
    {
        if (is_array($column)) {
            foreach ($column as $col) {
                $this->updateImageAtColumn($col);
            }
        } else {
            if ($file = request()->file($column)) {
                if ($this->$column) {
                    $this->removeImage($this->$column);
                }

                $image = $this->putImage($file);

                $this->update([
                    $column => $image,
                ]);
            }
        }
    }

    /**
     * Create many image and save it to storage.
     *
     * @param  string $key
     * @param  string $relation
     * @return void
     */
    public function createManyImages(string $key, $relation = 'images')
    {
        if ($files = request()->file($key)) {
            foreach ($files as $fileImage) {
                $image = $this->putImage($fileImage);

                $this->$relation()->create([
                    'name' => $image,
                    'url' => Storage::url($image)
                ]);
            }
        }
    }

    /**
     * Delete image.
     *
     * @param  string $relation
     * @return void
     */
    public function deleteImage($relation = 'image')
    {
        $this->load($relation);

        $image = $this->$relation;

        if ($image) {
            $this->removeImage($image->name);
            $image->delete();
        }
    }

    /**
     * Delete images.
     *
     * @param  string|array $column
     * @return void
     */
    public function deleteImageAtColumn($column)
    {
        if (is_array($column)) {
            foreach ($column as $col) {
                $this->deleteImageAtColumn($col);
            }
        } else {
            $deleteColumn = "delete_{$column}";
            if (request()->$deleteColumn) {
                if ($this->$column) {
                    $this->removeImage($this->$column);
                    $this->update([
                        $column => null,
                    ]);
                }
            }
        }
    }

    /**
     * Delete images.
     *
     * @param  string $key
     * @param  string $relation
     * @return void
     */
    public function deleteManyImages(string $key, $relation = 'images')
    {
        $this->load($relation);

        if ($files = request()->$key) {
            foreach ($files as $id) {
                $image = $this->$relation->firstWhere('id', $id);

                if ($image) {
                    $this->removeImage($image->name);

                    $image->delete();
                }
            }
        }
    }

    /**
     * Save image with thumbnail
     *
     * @param mixed $file
     * @return string
     */
    public function putImage($file)
    {
        Storage::put($this->getDirectory(), $file);

        return $this->getDirectory() . "/{$file->hashName()}"; //.{$file->extension()}
    }

    /**
     * Remove images from storage
     *
     * @param string $name
     * @return void
     */
    public function removeImage($name)
    {

        Storage::delete($name);
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->bucketDirectory ? "images/shares/{$this->bucketDirectory}" : "images/shares/{$this->table}";
    }

    /**
     * Get image url
     *
     * @return string|null
     */
    public function getOriginalUrlAttribute()
    {
        if ($this->image) {
            return Storage::url('images/' . $this->image->name);
        }

        return null;
    }
}
