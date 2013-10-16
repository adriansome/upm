<?php /* @var $data CArrayDataProvider */ 
if (isset($_POST['Search']['holiday'])) {
    $viewData = array(
        'selected' => $_POST['Search']['holiday']
    );
} else {
    $viewData = array();
}
?>
<select name="Search[holiday]" id="Search_holiday">
    <option value="">Choose When</option>
    <?php
    $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$this->contents,
            'itemView'=>'option',
            'template'=>'{items}',
            'viewData' => $viewData
    ));
    ?>
</select>