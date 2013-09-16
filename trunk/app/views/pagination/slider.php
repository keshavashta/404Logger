<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 8/27/13
 * Time: 2:24 AM
 * To change this template use File | Settings | File Templates.
 */


$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>

        <ul class="pagination">
            <?php echo $presenter->render(); ?>
        </ul>

<?php endif; ?>