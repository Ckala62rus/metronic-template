<?php

namespace App\Services;

use App\Contracts\LessonRepositoryInterface;
use App\Contracts\LessonServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class LessonService implements LessonServiceInterface
{
    /**
     * @var LessonRepositoryInterface
     */
    private LessonRepositoryInterface $lessonRepository;

    /**
     * LessonService constructor.
     * @param LessonRepositoryInterface $lessonRepository
     */
    public function __construct(LessonRepositoryInterface $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * Return all lesson with paginate
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function getAllLessonsPagination(int $limit): LengthAwarePaginator
    {
        return $this
            ->lessonRepository
            ->getAllWithPaginate($limit);
    }

    /**
     * Create lesson and return model
     * @param array $data
     * @return Model
     */
    public function createLesson(array $data): Model
    {
        if (isset($data['category_id']) && $data['category_id'] == 0) {
            $data['category_id'] = null;
        }
        return $this
            ->lessonRepository
            ->createLesson($data);
    }

    /**
     * Get lesson by id and return model or null
     * @param int $id
     * @return Model|null
     */
    public function getLessonById(int $id): ?Model
    {
        return $this
            ->lessonRepository
            ->getLessonById($id);
    }

    /**
     * Update lesson by id and return model or null
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function updateLesson(int $id, array $data): ?Model
    {
        if ($data['category_id'] == 0) {
            $data['category_id'] = null;
        }
        return $this
            ->lessonRepository
            ->updateLesson($id, $data);
    }

    /**
     * Delete lesson by id
     * @param int $id
     * @return bool
     */
    public function deleteLesson(int $id): bool
    {
        return $this
            ->lessonRepository
            ->deleteLesson($id);
    }

    /**
     * Return lessons collection
     * @return Collection
     */
    public function getAllLessonsCollection(): Collection
    {
        return $this
            ->lessonRepository
            ->getAllLessons();
    }
}
