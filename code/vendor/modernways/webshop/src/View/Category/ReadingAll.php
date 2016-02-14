<!--  reading all Template for Category entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de manières modernes
 created on Sunday 24th of January 2016 11:56:06 AM
 file name modernways/identity/src/AnOrmApart/View/User/ReadingAll.php
-->
<div class="list">
    <?php
    if (count($model->getList()) > 0) {
        ?>
        <table>
            <?php
            foreach ($model->getList() as $item) {
                ?>
                <tr>
                    <td>
                        <a href="index.php?uc=Category-readingOne_<?php echo $item['Id']; ?>">
                            <span class="icon-arrow-right"></span><span
                                class="screen-reader-text">Select</span></a>
                    </td>
                    <td>
                        <?php echo $item['Id']; ?>
                    </td>
                    <td>
                        <?php echo $item['Name']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        ?>
        <p>Geen Categorieën gevonden!</p>
        <?php
    }
    ?>
</div>
