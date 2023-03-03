<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Dashboard\LessonCategory\LessonCategoryStoreRequest;
use App\Http\Requests\Admin\Dashboard\LessonCategory\LessonCategoryUpdateRequest;
use App\Services\LessonCategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LessonCategoryController extends BaseController
{
    /**
     * @var LessonCategoryService
     */
    protected LessonCategoryService $lessonCategoryService;

    /**
     * @param LessonCategoryService $lessonCategoryService
     */
    public function __construct(LessonCategoryService $lessonCategoryService)
    {
        $this->lessonCategoryService = $lessonCategoryService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Create new lesson category
     * @param LessonCategoryStoreRequest $request
     * @return JsonResponse
     */
    public function store(LessonCategoryStoreRequest $request): JsonResponse
    {
        $category = $this
            ->lessonCategoryService
            ->createLessonCategory($request->all());

        return $this->response(
            [
                'category' => $category
            ],
            'Category was create',
            true,
            ResponseAlias::HTTP_CREATED
        );
    }

    /**
     * Get lesson category by id
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $category = $this
            ->lessonCategoryService
            ->getLessonCategoryById($id);

        if (!$category) {
            return $this->response(
                [],
                'Category not found',
                false,
                ResponseAlias::HTTP_NOT_FOUND
            );
        }

        return $this->response(
            ['category' =>  $category],
            'Category by id=' . $id,
            true,
            ResponseAlias::HTTP_OK
        );
    }

    public function edit(int $id)
    {
        //
    }

    /**
     * Update lesson category by id
     * @param LessonCategoryUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(LessonCategoryUpdateRequest $request, $id): JsonResponse
    {
        $category = $this
            ->lessonCategoryService
            ->updateLessonCategory($id, $request->all());

        return $this->response(
            ['category' =>  $category],
            'Update category by id=' . $id,
            true,
            ResponseAlias::HTTP_OK
        );
    }

    /**
     * Delete lesson category by id
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $isDelete = $this
            ->lessonCategoryService
            ->deleteLessonCategory($id);

        if ($isDelete){
            return $this->response(
                [],
                'Category was deleted with id=' . $id,
                true,
                ResponseAlias::HTTP_OK
            );
        }

        return $this->response(
            [],
            'Category was deleted with id=' . $id,
            false,
            ResponseAlias::HTTP_OK
        );
    }
}
