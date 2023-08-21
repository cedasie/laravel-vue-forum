<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;

class ForumIndexController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('Forum/Index', [
            'discussions' => DiscussionResource::collection(
                Discussion::with(['topic'])
                    ->orderByPinned()
                    ->latest() // remove when implemented ordering by last post
                    ->paginate(10)
            )
        ]);
    }
}
