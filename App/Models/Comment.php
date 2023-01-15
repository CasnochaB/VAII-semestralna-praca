<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    protected ?int $id;
    protected ?int $id_user;
    protected ?int $id_recipe;
    protected ?string $text;

    protected ?User $creator = null;
    protected ?Recipe $recipe = null;
    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * @param int|null $id_user
     */
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }


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
    public function getIdRecipe(): ?int
    {
        return $this->id_recipe;
    }

    /**
     * @param int|null $id_recipe
     */
    public function setIdRecipe(?int $id_recipe): void
    {
        $this->id_recipe = $id_recipe;
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

    public function deleteUserComments($userID)
    {
        $comments = self::getAll("id_user = ?",[$userID]);
        foreach ($comments as $comment) {
            $comment->delete();
        }
    }


    public function deleteRecipeComments($recipeID)
    {
        $comments = self::getAll("id_recipe = ?",[$recipeID]);
        foreach ($comments as $comment) {
            $comment->delete();
        }
    }

    public function loadUser()
    {
        $this->creator = ($this->id_user == null) ? null : User::getOne($this->id_user);
    }

    public function loadRecipe()
    {
        $this->recipe = ($this->id_recipe == null) ? null : Recipe::getOne($this->id_recipe);
    }


}