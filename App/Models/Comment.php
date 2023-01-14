<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    protected ?int $id;
    protected ?int $recipe_id;
    protected ?string $text;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getRecipeId(): ?int
    {
        return $this->recipe_id;
    }

    /**
     * @param int|null $recipe_id
     */
    public function setRecipeId(?int $recipe_id): void
    {
        $this->recipe_id = $recipe_id;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function deleteComments($userID)
    {
        $comments = self::getAll("id = ?",[$userID]);
        foreach ($comments as $comment) {
            $comment->delete();
        }
    }
}