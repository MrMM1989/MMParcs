<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 13/01/2016
 * Time: 22:05
 */
?>
<div class="container-fluid floor">
    <?php $partialView('Shared', 'Header'); ?>
    <article class="row showroom">
        <div class="col-sm-12">
            Showroom
            <a href="master.php?uc=Haal-de-doos-uit-het-magazijn">Doos halen uit magazijn</a>
            <form action="master.php" method="get">
            <button type="submit" name="uc"
                    value="haal-de-laptop-uit-het-magazijn">Laptop uit het magazijn halen</button>
            </form>
        </div>
    </article>
    <?php $partialView('Shared', 'Footer'); ?>
</div>
