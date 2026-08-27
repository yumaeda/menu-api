<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Menu controller for menu API endpoints.
 *
 * Mirrors the sakaba-api MenuController pattern:
 *   GET /menus/:id      — returns all menus for a given restaurant
 *   PUT /menu/          — updates a single column on a menu item
 *   POST /menu/         — creates a new menu item
 *   DELETE /menu/       — deletes a menu item by ID
 */
class MenuController extends Controller
{
     /**
      * Allowed columns that may be updated via PUT /menu/.
      *
      * Mirrors the sakaba-api allowlist in MenuRepository.SetMenu.
      *
      * @var array<int, string>
      */
    private const ALLOWED_COLUMNS = [
         'name',
         'name_jpn',
         'price',
         'category',
         'sub_category',
         'region',
         'sort_order',
         'is_min_price',
         'is_hidden',
     ];

     /**
      * Display a listing of menus for the given restaurant.
      *
      * The `:id` URL parameter represents a restaurant ID, not a menu ID.
      * Returns menus ordered by category, sub_category, region, and sort_order.
      *
      * @see \App\Models\Menu
      * @see https://github.com/yumaeda/sakaba-api (MenuController.GetMenusByRestaurantID)
      */
    public function index(Request $request, string $id): JsonResponse
     {
         $menus = Menu::where('restaurant_id', $id)
             ->orderBy('category')
             ->orderBy('sub_category')
             ->orderBy('region')
             ->orderBy('sort_order')
             ->get()
             ->toArray();

        return response()->json([
             'statusCode' => 200,
             'body'        => $menus,
         ]);
     }

     /**
      * Update a single column on a menu item.
      *
      * Request body: {"id": "...", "column": "...", "value": "..."}
      *
      * @see \App\Models\Menu
      * @see https://github.com/yumaeda/sakaba-api (MenuController.SetMenu)
      */
    public function update(Request $request): JsonResponse
     {
         $id = $request->input('id');
         $column = $request->input('column');
         $value = $request->input('value');

         // Validate column is in the allowlist
        if (!in_array($column, self::ALLOWED_COLUMNS, true)) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu update failed.',
             ], 400);
        }

         // Validate required fields
        if (empty($id) || empty($column) || $value === null) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu update failed.',
             ], 400);
        }

         $menu = Menu::where('id', $id)->first();
        if (!$menu) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu update failed.',
             ], 400);
        }

         $menu->{$column} = $value;
         $menu->save();

        return response()->json([
             'statusCode' => 200,
         ]);
     }

     /**
      * Create a new menu item.
      *
      * Request body: {"id": "...", "restaurant_id": "...", "name": "...", "name_jpn": "...", "price": ...}
      *
      * @see \App\Models\Menu
      * @see https://github.com/yumaeda/sakaba-api (MenuController.AddMenu)
      */
    public function store(Request $request): JsonResponse
     {
         $id = $request->input('id');
         $restaurantId = $request->input('restaurant_id');
         $name = $request->input('name');
         $nameJpn = $request->input('name_jpn');
         $price = $request->input('price');

         // Validate required fields
        if (empty($id) || empty($restaurantId) || empty($name) || $price === null) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu insertion failed.',
             ], 400);
        }

         $menu = Menu::create([
             'id'            => $id,
             'restaurant_id' => $restaurantId,
             'name'          => $name,
             'name_jpn'      => $nameJpn ?? '',
             'price'         => $price,
         ]);

        return response()->json([
             'statusCode' => 200,
             'id'          => $menu->id,
         ]);
     }

     /**
      * Delete a menu item by ID.
      *
      * Request body: {"id": "..."}
      *
      * @see \App\Models\Menu
      * @see https://github.com/yumaeda/sakaba-api (MenuController.DeleteMenu)
      */
    public function destroy(Request $request): JsonResponse
     {
         $id = $request->input('id');

         // Validate required field
        if (empty($id)) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu deletion failed.',
             ], 400);
        }

         $menu = Menu::where('id', $id)->first();
        if (!$menu) {
            return response()->json([
                 'statusCode' => 400,
                 'error'       => 'Menu deletion failed.',
             ], 400);
        }

         $menu->delete();

        return response()->json([
             'statusCode' => 200,
         ]);
     }
}
