<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Menu model representing the `menus` table.
 *
 * @property string $id
 * @property string $restaurant_id
 * @property int $sort_order
 * @property int $category
 * @property int $sub_category
 * @property int $region
 * @property string $name
 * @property string $name_jpn
 * @property int $price
 * @property int $is_min_price
 * @property int $is_hidden
 */
class Menu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'restaurant_id',
        'name',
        'name_jpn',
        'price',
        'sort_order',
        'category',
        'sub_category',
        'region',
        'is_min_price',
        'is_hidden',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sort_order' => 'integer',
        'category' => 'integer',
        'sub_category' => 'integer',
        'region' => 'integer',
        'price' => 'integer',
        'is_min_price' => 'integer',
        'is_hidden' => 'integer',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model is indexed by UUID.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The type of model key.
     *
     * @var string
     */
    protected $keyType = 'string';
}
