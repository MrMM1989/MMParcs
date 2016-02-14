<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 19:49
 */
?>
<div class="container-fluid floor">
    <div class="row control-panel">
        <a href="" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>
        <h1>MikMak</h1>
    </div>
    <form class="row showroom" action="" method="post">
        <header class="col-sm-8">
            <h2>Basiseenheid</h2>
            <div id="command-panel" class="command-panel">
                <a href="" class="tile">
                    <span class="icon-plus"></span>
                    <span class="screen-reader-text">Inserting</span>
                </a>

            </div>
        </header>
        <div class="col-sm-4 list">
            <?php echo $this->model->readAll(); ?>
            <table>
            </table>
        </div>
    </form>
</div>
