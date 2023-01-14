<?php

namespace App\Models;

use App\Core\Model;

class Like extends Model
{
    protected ?int $id;
    protected ?int $id_user;
    protected ?int $id_recipe;

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


    public function deleteUserLikes($userID)
    {
        $likes = self::getAll("id_user = ?",[$userID]);
        foreach ($likes as $like) {
            $like->delete();
        }
    }

    public function deleteRecipeLikes($recipeID)
    {
        $likes = self::getAll("id_recipe = ?",[$recipeID]);
        foreach ($likes as $like) {
            $like->delete();
        }
    }

    public function getAssociatedRecipe() {
        return Recipe::getOne($this->id_recipe);
    }

}