<?php /* @var $this ListWidget */

$locationText = $this->viewData['attributes']['location']['values'][$_POST['Search']['location']];

?>
<h1>Results&ndash; March 4, <?php echo $locationText; ?></h1>
<ul class="resort-listing search-listing">
    <?php
    $itemCount = count($this->contents->getData());
    $summaryText = "<p>We have {$itemCount} match";
    $summaryText .= ($itemCount > 1) ? 'es' : '';
    $summaryText .= " for {$locationText} beginning in the week of March 4, 2014</p>";
    $this->widget('zii.widgets.CListView', array(
            'id'=>'properties',
            'dataProvider'=>$this->contents,
            'itemView'=>'item',
            'htmlOptions' => array(
                    'class' => 'constrained'					   
            ),
            'summaryText'=> $summaryText,
            'template'=>'{summary} {items}',
            /*'pager'=>array(
                'class'=>'CLinkPager',
                'header'=>'',
            ),*/
            'viewData'=>array('attributes'=>$this->viewData['attributes'])
    ));
    ?>
</ul>

