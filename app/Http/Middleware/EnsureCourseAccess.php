<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Course;

class EnsureCourseAccess
{
    public function handle(Request $request, Closure $next)
    {
        $courseId = $request->route('courseId');
        $user = $request->user();

        if (!$courseId || !$user) {
            abort(403, 'Unauthorized action.');
        }
        $hasAccess = $user->courses()
            ->where('course_id', $courseId)
            ->wherePivotIn('role', ['creator', 'teacher'])
            ->exists();

        if (!$hasAccess) {
            abort(403, 'You do not have access to this course.');
        }

        return $next($request);
    }
}
