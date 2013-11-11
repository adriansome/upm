<?php
/* @var $this UserController */
/* @var $model User */

require_once(Yii::app()->theme->basepath . '/views/elements/header.php');
?>

<div class="constrained">

    <!-- Begin #sidebar -->
    <div id="sidebar" class="column span4">
        <?php
        if (Yii::app()->user->isLandlord()) {
            // If on Edit Property / Availability Page
            if (isset($id) && (int) $id) {
                ?>
                <a href="/profile" class="back">Back to Properties</a>
                <?php
            }
            ?>

            <nav id="sub-navigation">
                <?php
                $this->widget('Menu', array(
                    'id' => 'submenu',
                    'page_id' => $model->id
                ));
                ?><!-- mainmenu -->
            </nav>

            <?php
            $this->widget('NuggetArea', array(
                'name' => 'nugget area',
            ));
            ?>
        <?php } else { // soldier view...
        }
        ?>
    </div>
    <!-- End #sidebar -->

    <section id="main-content" class="column span12">
        <?php
        if (Yii::app()->user->isLandlord()) {
            include '_landlordProfile.php';
        } else {
            include '_soldierProfile.php';
        }
        ?>
    </section>
</div>

<script type="text/javascript">
    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>";
</script>

<?php if (!Yii::app()->user->isAdmin()) { ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/bootstrap-modal.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/bootstrap-modalmanager.js'); ?>
    <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')) . '/tinymce.min.js'); ?>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/properties.js"></script>

    <?php
}
if (Yii::app()->user->isLandlord()) {

    Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')) . '/jquery.fileupload.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/jquery.ui.widget.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/bootstrap-modal.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/bootstrap-modalmanager.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/jquery.iframe-transport.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')) . '/jquery.fileupload.js');

    $subfolder = str_replace('landlord/', '', $_SESSION['subfolder']);
    ?>

    <input type="hidden" id="subfolder" value="<?php echo $subfolder ?>" />

    <?php
}
require_once(Yii::app()->theme->basepath . '/views/elements/footer.php');
?>