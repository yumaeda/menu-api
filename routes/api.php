<?php

use App\Http\Controllers\MenuController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function (): JsonResponse {
    return response()->json(['message' => 'Hello, World!']);
});

/**
 * GET /menus/:id — return all menus for a given restaurant.
 *
 * The `:id` URL parameter is a restaurant ID.
 * Mirrors sakaba-api: router.GET("/menus/:id", menuController.GetMenusByRestaurantID)
 */
Route::get('/menus/{id}', [MenuController::class, 'index']);

/**
 * PUT /menu/ — update a single column on a menu item.
 *
 * Request body: {"id": "...", "column": "...", "value": "..."}
 * Mirrors sakaba-api: auth.PUT("/menu/", menuController.SetMenu)
 */
Route::put('/menu/', [MenuController::class, 'update']);

/**
 * POST /menu/ — create a new menu item.
 *
 * Request body: {"id": "...", "restaurant_id": "...", "name": "...", "name_jpn": "...", "price": ...}
 * Mirrors sakaba-api: auth.POST("/menu/", menuController.AddMenu)
 */
Route::post('/menu/', [MenuController::class, 'store']);

/**
 * DELETE /menu/ — delete a menu item by ID.
 *
 * Request body: {"id": "..."}
 * Mirrors sakaba-api: auth.DELETE("/menu/", menuController.DeleteMenu)
 */
Route::delete('/menu/', [MenuController::class, 'destroy']);
