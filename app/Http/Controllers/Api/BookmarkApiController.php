<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Genre;
use App\Models\Menu;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class BookmarkApiController extends Controller
{
    public function index($id)
    {
        try {
            $bookmarks = Bookmark::with([
                'kafe.gallery' => function ($query) {
                    $query->where('type', 'main_content');
                },
                'kafe' => function ($query) {
                    $query->withAvg('rating as total_rating', 'rate');
                }
            ])
                ->where('user_id', $id)
                ->get();
            return response()->json([
                'status' => 'success',
                'data' => $bookmarks,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(), // jangan tampilkan di production
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Explicitly get the input values
            $input = [
                'user_id' => $request->input('user_id'),
                'kafe_id' => $request->input('kafe_id'),
            ];

            $validated = validator($input, [
                'kafe_id' => 'required|uuid',
                'user_id' => 'required|uuid',
            ])->validate();

            $existingBookmark = Bookmark::where('user_id', $validated["user_id"])
                ->where('kafe_id', $validated['kafe_id'])
                ->first();

            if ($existingBookmark) {
                return response()->json([
                    'message' => 'You have already bookmarking this cafe',
                ], 409);
            }

            $bookmark = Bookmark::create([
                'user_id' => $validated['user_id'],
                'kafe_id' => $validated['kafe_id'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Bookmark added successfully',
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
    public function destroy(Request $request)
    {
        try {
            $input = [
                'user_id' => $request->input('user_id'),
                'kafe_id' => $request->input('kafe_id'),
            ];

            $validated = validator($input, [
                'kafe_id' => 'required|uuid',
                'user_id' => 'required|uuid',
            ])->validate();

            $bookmark = Bookmark::where('user_id', $validated["user_id"])
                ->where('kafe_id', $validated['kafe_id'])
                ->first();

            if (!$bookmark) {
                return response()->json([
                    'message' => 'Bookmark not found',
                ], 404);
            }

            $bookmark->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Bookmark removed successfully',
            ], 200);
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

public function check(Request $request)
{
    try {
        $input = [
            'user_id' => $request->input('user_id'),
            'kafe_id' => $request->input('kafe_id'),
        ];

        $validated = validator($input, [
            'kafe_id' => 'required|uuid',
            'user_id' => 'required|uuid',
        ])->validate();

        $bookmark = Bookmark::where('user_id', $validated['user_id'])
            ->where('kafe_id', $validated['kafe_id'])
            ->first();

        return response()->json([
            'status' => 'success',
            'is_bookmarked' => $bookmark ? true : false,
        ], 200);

    } catch (ValidationException $e) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred',
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(), // Remove in production
        ], 500);
    }
}


}
