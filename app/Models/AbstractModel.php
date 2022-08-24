<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractModel
 * @package App\Models
 *
 * @method static AbstractModel|Builder sort
 */
abstract class AbstractModel extends Model
{
    use HasFactory;

    public function getImage($image = null)
    {
        if ($image) {
            $imageName = $image;
        } else {
            if ($this->image) {
                $imageName = $this->image;
            } else {
                return '';
            }
        }

        $path = static::$imagePath ;

        return asset(sprintf('images%s/%s', $path, $imageName));
    }
}
