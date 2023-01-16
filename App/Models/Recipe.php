<?php

namespace App\Models;

use App\App;
use App\Core\Model;

class Recipe extends Model
{
    protected ?int $id = 0;
    protected ?string $title = "";
    protected ?string $description = "";
    protected ?string $text = "";
    protected ?int $time = 0;
    protected ?float $rating = 0;
    protected ?int $id_user = 0;

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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $describtion
     */
    public function setDescription(?string $describtion): void
    {
        $this->description = $describtion;
    }

    /**
     * @return int|null
     */
    public function getTime(): ?int
    {
        return $this->time;
    }

    /**
     * @param int|null $time
     */
    public function setTime(?int $time): void
    {
        $this->time = $time;
    }

    /**
     * @return float|null
     */
    public function getRating(): ?float
    {
        return $this->rating;
    }

    /**
     * @param float|null $rating
     */
    public function setRating(?float $rating): void
    {
        $this->rating = $rating;
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

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function deleteRecipes($userId) {
        $recipes = self::getAll("id_user == ?",[$userId]);
        foreach ($recipes as $recipe) {
            $recipe->delete();
        }
    }


    public function isLiked($userID,$recipeID) : ?bool {
        $like = Like::getAll("id_user = ? && id_recipe = ?",[$userID,$recipeID]);
        if (count($like) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function getTableName(): string
    {
        return "recipes";
    }


}