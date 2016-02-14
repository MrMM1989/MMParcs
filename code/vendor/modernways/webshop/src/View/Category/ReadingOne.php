<!--  ReadingOne Template for Category entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de manières modernes
 created on Sunday 24th of January 2016 11:56:06 AM
 file name modernways/Webshop/src/AnOrmApart/View/Category/Editing.php
-->
<div class="floor" id="second-floor" xmlns="http://www.w3.org/1999/html">
    <div class="control-panel">
        <a href="<index.php?uc=Admin-index" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>
        <h1>Categorie</h1>
    </div>
    <form class="room" action="index.php" method="post">
        <header>
            <h2>Categorie</h2>
            <div id="command-panel" class="command-panel">
                <button type="submit" value="Category-updatingOne" name="uc">
                    <span class="icon-pencil"></span><span
                        class="screen-reader-text">Updating</span></button>

                <button type="submit" value="Category-creatingOne" name="uc">
                    <span class="icon-plus"></span><span
                        class="screen-reader-text">Inserten</span></button>
                <button type="submit" value="Category-deleteOne" name="uc">
                    <span class="icon-remove"></span><span
                        class="screen-reader-text">Delete</span></button>

                <a href="index.php?uc=Category-editing">
                    <span class="icon-close"></span><span
                        class="screen-reader-text">Sluiten</span></a>
            </div>
        </header>
        <div class="detail">
            <fieldset>
                <div>
                    <input id="Category-Id" name="Category-Id" style="width: 6em;"
                           type="hidden" value="<?php echo $model->getId(); ?>" readonly/>
                </div>
                <div>
                    <label for="Category-Name">Naam</label>
                    <input id="Category-Name" name="Category-Name"
                           class="text" style="width: 32.5%;" type="text" value="<?php echo $model->getName(); ?>"
                           readonly/>
                </div>
                <div>
                    <label for="Category-Description">Beschrijving</label>
                    <texterea id="Category-Description" name="Category-Description"
                              style="width: 40%;" readonly
                    "><?php echo $model->getDescription(); ?></textarea>
                </div>
            </fieldset>
        </div>
        <div class="feedback">
        </div>
        <?php $partialView('Category', 'ReadingAll', $model); ?>
    </form>
</div>
<?php $appStateView(); ?>
