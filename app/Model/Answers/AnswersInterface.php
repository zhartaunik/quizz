<?php

declare(strict_types=1);

namespace App\Model\Answers;

interface AnswersInterface
{
    /**
     * Get all answers for the desired question.
     *
     * @param int $questionId
     * @return array|null
     */
    public function getAnswers(int $questionId): ?array;

    /**
     * Verify if number of correct answers is more than one.
     *
     * @param int $questionId
     * @return bool
     */
    public function isMultipleValid(int $questionId): bool;
}