<div class="container-fluid floor">
    <?php $partialView('Shared', 'Header'); ?>
    <article class="showroom">
        <div class="row">
            <div class="col-sm-3">
                <a href="master.php?usecase=Product-editing" class="btn btn-primary">Product</a>
            </div>
            <div class="col-sm-3">
                <a href="master.php?usecase=Supplier-editing" class="btn btn-primary">Supplier</a>
            </div>
            <div class="col-sm-6">
                <img scr="http://etc.usf.edu/clipart/4700/4779/table_1_lg.gif" alt="afbeelding"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <a href="master.php?usecase=Customer-editing" class="btn btn-primary">Customer</a>
            </div>
            <div class="col-sm-3">
                <a href="master.php?usecase=Order-editing" class="btn btn-primary">Order</a>
            </div>
            <div class="col-sm-3">
                <a href="master.php?usecase=Country-editing" class="btn btn-primary">Country</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Category-editing" class="btn btn-primary">Category</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=User-editing" class="btn btn-primary">Gebruikers</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Role-editing" class="btn btn-primary">Rollen</a>
            </div>
            <div class="col-sm-3">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);?>?uc=Admin-loggingIn--">Aanmelden</a>
            </div>
            <div class="col-sm-3">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);?>?uc=Admin-logout--">Afmelden</a>
            </div>

        </div>
    </article>
    <?php $partialView('Shared', 'Footer'); ?>
</div>
<?php $appStateView(); ?>

