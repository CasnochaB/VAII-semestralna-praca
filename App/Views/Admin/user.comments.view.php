<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Models\Comment $comment */
$comments = $data['comments'];
?>

<div class="spacing"></div>

<h1>História komentárov užívateľa <?=$auth->getLoggedUserName()?> </h1>
<div class="spacing"></div>

<div class="container">
    <?php foreach ($comments as $comment) { ?>
        <div class="border row" style="background-color: rgba(5,4,0,0.35)">
            <div class="col" >
            <h3>
                Komentár pre: <a href="?c=recipes&a=open&id=<?=$comment->getIdRecipe()?>"><?= $comment->getAssociatedRecipe($comment->getIdRecipe())->getTitle()?></a>
            </h3>
            <h2>
                &emsp; <?=$comment->getText()?>
            </h2>
            </div>
            <div class="col center-offset" style="max-width: 60px">
                <a class="btn btn-primary" style="float: right;" href="?c=admin&a=deleteComment&id=<?=$comment->getId()?>">zmazať</a>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>