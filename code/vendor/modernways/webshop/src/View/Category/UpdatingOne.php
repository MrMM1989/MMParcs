<div class="floor" id="second-floor" xmlns="http://www.w3.org/1999/html">
    <div class="control-panel">
        <a href="index.php?uc=Admin-index" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>
        <h1>Categorie</h1>
    </div>
    <form class="room" action="index.php" method="post">
        <header>
            <h2>Categorie</h2>
            <div id="command-panel" class="command-panel">
                <button type="submit" value="Category-updateOne" name="uc">
                    <span class="icon-disk"></span>
                    <span class="screen-reader-text">Update</span>
                </button>
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
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->getName(); ?>" required/>
                </div>
                <div>
                    <label for="Category-Description">Beschrijving</label>
                    <textarea id="Category-Description" name="Category-Description"
                              style="width: 40%;"><?php echo $model->getDescription(); ?></textarea>
                </div>
            </fieldset>
        </div>
        <div class="feedback">
        </div>
    </form>
    <?php $partialView('Category', 'ReadingAll', $model); ?>
</div>
<?php $appStateView(); ?>

