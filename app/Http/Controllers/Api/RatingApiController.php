<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Menu;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class RatingApiController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Explicitly get the input values
            $input = [
                'user_id' => $request->input('user_id'),
                'kafe_id' => $request->input('kafe_id'),
                'rate' => $request->input('rate')
            ];

            $validated = validator($input, [
                'kafe_id' => 'required|uuid',
                'user_id' => 'required|uuid',
                'rate' => 'required|integer|min:1|max:5',
            ])->validate();

            $existingRating = Rating::where('user_id', $validated["user_id"])
                ->where('kafe_id', $validated['kafe_id'])
                ->first();

            if ($existingRating) {
                return response()->json([
                    'message' => 'You have already rated this cafe',
                ], 409);
            }

            $rating = Rating::create([
                'user_id' => $validated['user_id'],
                'kafe_id' => $validated['kafe_id'],
                'rate' => (int)$validated['rate'],
            ]);

            return response()->json([
                'message' => 'Rating added successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString() // Remove in production
            ], 500);
        }
    }
}