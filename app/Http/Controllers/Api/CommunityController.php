<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class CommunityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Community::query();

            if ($request->has('user_id')) {
                $query->byUser($request->user_id);
            }

            if ($request->has('search')) {
                $search = $request->get('search');
                $query->where(function ($q) use ($search) {
                    $q->where('caption', 'LIKE', "%{$search}%")
                        ->orWhere('username', 'LIKE', "%{$search}%");
                });
            }

            if ($request->has('mood')) {
                $query->where('mood', $request->mood);
            }

            $sort = $request->get('sort', 'latest');
            switch ($sort) {
                case 'popular':
                    $query->popular();
                    break;
                case 'most_viewed':
                    $query->orderBy('view_count', 'desc');
                    break;
                case 'most_commented':
                    $query->orderBy('comment_count', 'desc');
                    break;
                case 'latest':
                default:
                    $query->latest();
                    break;
            }

            $perPage = $request->get('per_page', 15);
            $communities = $query->paginate($perPage);

            $data = collect($communities->items())->map(function ($item) {
                return $item->toMap();
            });

            return response()->json([
                'success' => true,
                'message' => 'Community data retrieved successfully',
                'data' => $data,
                'pagination' => [
                    'current_page' => $communities->currentPage(),
                    'last_page' => $communities->lastPage(),
                    'per_page' => $communities->perPage(),
                    'total' => $communities->total(),
                    'has_more' => $communities->hasMorePages()
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching community data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|string',
                'username' => 'required|string|max:255',
                'caption' => 'required|string|max:2000',
                'image_url' => 'nullable|url|max:500',
                'mood' => 'nullable|string|max:100',
                'location' => 'nullable|string|max:255',
                'shared_menu_id' => 'nullable|string|max:100',
                'profile_image_url' => 'nullable|url|max:500',
                'user_tag' => 'nullable|string|max:100',
            ]);

            $community = Community::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Community post created successfully',
                'data' => $community->toMap()
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating community post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create data',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $community = Community::find($id);

            if (!$community) {
                return response()->json([
                    'success' => false,
                    'message' => 'Community post not found',
                    'data' => null
                ], 404);
            }

            $community->incrementViewCount();

            return response()->json([
                'success' => true,
                'message' => 'Community post retrieved successfully',
                'data' => $community->toMap()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching community post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $community = Community::find($id);

            if (!$community) {
                return response()->json([
                    'success' => false,
                    'message' => 'Community post not found',
                    'data' => null
                ], 404);
            }

            $validated = $request->validate([
                'caption' => 'sometimes|required|string|max:2000',
                'image_url' => 'sometimes|nullable|url|max:500',
                'mood' => 'sometimes|nullable|string|max:100',
                'location' => 'sometimes|nullable|string|max:255',
                'user_tag' => 'sometimes|nullable|string|max:100',
            ]);

            $community->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Community post updated successfully',
                'data' => $community->fresh()->toMap()
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating community post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update data',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $community = Community::find($id);

            if (!$community) {
                return response()->json([
                    'success' => false,
                    'message' => 'Community post not found',
                    'data' => null
                ], 404);
            }

            $data = $community->toMap();
            $community->delete();

            return response()->json([
                'success' => true,
                'message' => 'Community post deleted successfully',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting community post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete data',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function like(Request $request, string $id): JsonResponse
    {
        try {
            $post = Community::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found',
                    'data' => null
                ], 404);
            }

            $request->validate([
                'user_id' => 'required|string'
            ]);

            $userId = $request->input('user_id');

            if ($post->isLikedBy($userId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post already liked by this user',
                    'data' => [
                        'like_count' => $post->like_count,
                        'is_liked' => true
                    ]
                ], 400);
            }

            $post->addLike($userId);

            return response()->json([
                'success' => true,
                'message' => 'Post liked successfully',
                'data' => [
                    'post_id' => $post->id,
                    'like_count' => $post->like_count,
                    'is_liked' => true,
                    'liked_by_user' => $userId
                ]
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error liking post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to like post',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function unlike(Request $request, string $id): JsonResponse
    {
        try {
            $post = Community::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found',
                    'data' => null
                ], 404);
            }

            $request->validate([
                'user_id' => 'required|string'
            ]);

            $userId = $request->input('user_id');

            if (!$post->isLikedBy($userId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not liked by this user',
                    'data' => [
                        'like_count' => $post->like_count,
                        'is_liked' => false
                    ]
                ], 400);
            }

            $post->removeLike($userId);

            return response()->json([
                'success' => true,
                'message' => 'Post unliked successfully',
                'data' => [
                    'post_id' => $post->id,
                    'like_count' => $post->like_count,
                    'is_liked' => false,
                    'unliked_by_user' => $userId
                ]
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error unliking post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to unlike post',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function checkLike(Request $request, string $id): JsonResponse
    {
        try {
            $post = Community::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found',
                    'data' => null
                ], 404);
            }

            $request->validate([
                'user_id' => 'required|string'
            ]);

            $userId = $request->input('user_id');
            $isLiked = $post->isLikedBy($userId);

            return response()->json([
                'success' => true,
                'message' => 'Like status retrieved successfully',
                'data' => [
                    'post_id' => $post->id,
                    'user_id' => $userId,
                    'is_liked' => $isLiked,
                    'like_count' => $post->like_count
                ]
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error checking like status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to check like status',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function getByUser(string $userId): JsonResponse
    {
        try {
            $posts = Community::byUser($userId)->latest()->get();

            $postsData = $posts->map(function ($post) {
                return $post->toMap();
            });

            return response()->json([
                'success' => true,
                'message' => 'User posts retrieved successfully',
                'data' => $postsData,
                'total' => $posts->count()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching user posts: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve user posts',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    public function trending(): JsonResponse
    {
        try {
            $posts = Community::where('created_at', '>=', now()->subDay())
                ->orderBy('like_count', 'desc')
                ->orderBy('view_count', 'desc')
                ->limit(20)
                ->get();

            $postsData = $posts->map(function ($post) {
                return $post->toMap();
            });

            return response()->json([
                'success' => true,
                'message' => 'Trending posts retrieved successfully',
                'data' => $postsData
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching trending posts: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve trending posts',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }
}
