<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseState;
use App\Enum\CourseType;
use App\Enum\ReviewState;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewsCollection;
use App\Models\GeneralCourse;
use App\Models\Review;
use App\Models\StudyCourse;
use App\Models\User;
use function Symfony\Component\String\s;

class ReviewController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser")->only(["createOrUpdate", "getReview"]);
    }

    public function all() {
        $reviews = Review::where("course_id", request()->input("course"))
            ->where("type",  request()->input("type"))
            ->paginate(10);
        ReviewsCollection::collection($reviews);

        return $this->paginateResponse($reviews);
    }

    public function createOrUpdate() {
        $type =  (request()->input("type") == CourseType::GENERAL)
            ? CourseType::GENERAL
            : CourseType::STUDY;

        $course = ($type == CourseType::GENERAL)
            ? GeneralCourse::find(request()->input("course"))
            : StudyCourse::find(request()->input("course"));

        if (!$course)
            return $this->simpleResponseWithMessage(false, "course not found");

        if ($course->state == CourseState::INACTIVE)
            return $this->simpleResponseWithMessage(false, "course is blocked");

        $review = Review::updateOrCreate([
            "user_id"   => request()->user->id,
            "course_id" => $course->id,
            "type"      => $type
        ], [
            "rate"      => request()->input("rate"),
            "comment"   => request()->input("comment"),
            "state"     => ReviewState::VISIBLE
        ]);

        if (!$review)
            return $this->simpleResponseWithMessage(false, "try again");

        return $this->simpleResponseWithMessage(true, "success review");
    }

    public function getReview() {
        $review = Review::where("user_id", request()->user->id)
            ->where("course_id", request()->input("course"))
            ->where("type",  request()->input("type"))
            ->first();

        return $this->simpleResponse(new ReviewsCollection($review));
    }
}
