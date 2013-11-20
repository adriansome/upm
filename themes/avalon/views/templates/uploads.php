<?php
$this->pageTitle = $model->window_title;
?>

<?php require_once(Yii::app()->theme->basepath . '/views/elements/header.php'); ?>

<!-- Begin #banner -->
<div class="banner">
    <div class="constrained">
        <h1>
            <?php
            $this->widget('SingleLineText', array(
                'name' => 'page heading',
                'scope' => 'page',
            ));
            ?>
        </h1>
    </div>
</div>
<!-- End #banner -->

<!-- Begin #main -->
<div id="main">
    <div class="constrained">

        <!-- Begin #main-content -->
        <div class="column span13" id="main-content">

            <p><span class="highlighted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam.</span></p>

            <form action="#" method="post" class="upload-form">
                <fieldset>
                    <!--<legend>Choose image to upload</legend>-->
                    <h2>Choose image to upload</h2>
                    <div class="form-column one-half">
                        <input type="text" placeholder="Enter a caption" />
                    </div>
                    <div class="form-column one-half">
                        <input type="file" placeholder="Choose image">
                    </div>
                    <div class="form-row button-row">
                        <input type="submit">
                    </div>

                </fieldset>
            </form>
        </div>
        <!-- End #main-content -->

    </div>
</div>
<!-- End #main -->

<?php require_once(Yii::app()->theme->basepath . '/views/elements/footer.php'); ?>