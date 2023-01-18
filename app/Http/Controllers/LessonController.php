<?php

namespace App\Http\Controllers;

use App\Contracts\LessonServiceInterface;
use App\Http\Requests\Admin\Dashboard\Lesson\LessonStoreRequest;
use App\Services\LessonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LessonController extends Controller
{
    /**
     * @var LessonServiceInterface
     */
    protected  LessonServiceInterface $lessonService;

    /**
     * LessonController constructor.
     * @param LessonServiceInterface $lessonService
     */
    public function __construct(LessonServiceInterface $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    public function index()
    {
        //
    }

    /**
     * Return create view with inertia page
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Lesson/LessonCreate');
    }

    public function store(LessonStoreRequest $request)
    {
        $lesson = $this
            ->lessonService
            ->createLesson($request->all());

        return response()->json([
            'lesson' => $lesson
        ], JsonResponse::HTTP_CREATED);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
