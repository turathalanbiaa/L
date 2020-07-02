<?php

namespace App\Http\Controllers\Api;

use App\Enum\CourseState;
use App\Enum\CourseType;
use App\Enum\UserState;
use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewsCollection;
use App\Http\Resources\Review\SingleReview;
use App\Models\GeneralCourse;
use App\Models\Review;
use App\Models\StudyCourse;
use App\Models\User;
use function Symfony\Component\String\s;

class ReviewController extends Controller
{
    use ResponseTrait;

    public function all() {
        $reviews = Review::where("course_id", request()->input("course"))
            ->where("type",  request()->input("type"))
            ->paginate(10);
        ReviewsCollection::collection($reviews);

        return $this->paginateResponse($reviews);
    }

    public function createOrUpdate() {
        $user = User::find(\request()->input("user"));

        if (!$user)
            return $this->simpleResponseWithError("user_not_found");

        if ($user->state == UserState::DISABLE)
            return $this->simpleResponseWithError("user_is_Blocked");

        $type =  (request()->input("type") == CourseType::GENERAL)
            ? CourseType::GENERAL
            : CourseType::STUDY;

        $course = ($type == CourseType::GENERAL)
            ? GeneralCourse::find(request()->input("course"))
            : StudyCourse::find(request()->input("course"));

        if (!$course)
            return $this->simpleResponseWithError("course_not_found");

        if ($course->state == CourseState::INACTIVE)
            return $this->simpleResponseWithError("course_is_Blocked");

        $review = Review::where("user_id", $user->id)
            ->where("course_id", $course->id)
            ->where("type", $type)
            ->first();

        if ($review) {
            $review->rate = request()->input("rate");
            $review->comment = request()->input("comment");
            $review->updated_at = date("Y-m-d");
        } else {
            $review = new Review();
            $review->user_id = request()->input("user");
            $review->course_id = request()->input("course");
            $review->type = $type;
            $review->rate = request()->input("rate");
            $review->comment = request()->input("comment");
            $review->state = CourseState::ACTIVE;
            $review->created_at = date("Y-m-d");
            $review->updated_at = date("Y-m-d");
        }

        $success = $review->save();

        if (!$success)
            return $this->simpleResponseWithError("try_again");

        return $this->simpleResponse(new SingleReview($review));
    }

    public function getReview() {
        $review = Review::where("user_id", request()->input("user"))
            ->where("course_id", request()->input("course"))
            ->where("type",  request()->input("type"))
            ->first();

        return $this->simpleResponse(new SingleReview($review));
    }
}
