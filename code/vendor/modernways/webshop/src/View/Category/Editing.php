<!--  editing Template for Category entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de manières modernes
 created on Sunday 24th of January 2016 11:56:06 AM
 file name modernways/Webshop/src/AnOrmApart/View/Category/Editing.php
-->

<div class="floor" id="second-floor">
    <div class="control-panel">
<a href="<index.php?uc=Admin-index" class="tile _14x1">
    <span class="icon-menu2"></span>
    <span class="screen-reader-text">Home</span>
</a>
        <h1>Categorie</h1>
    </div>
    <form class="room" action="index.php" method="post">
        <header>
            <h2>Gebruiker</h2>
            <div id="command-panel" class="command-panel">
                <button type="submit" value="Category-creatingOne" name="uc">
                    <span class="icon-plus"></span><span class="screen-reader-text">Inserten</span></button>
            </div>
        </header>
        <?php $partialView('Category', 'ReadingAll', $model); ?>
    </form>
</div>
<?php $appStateView(); ?>
