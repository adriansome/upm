<?php /* @var $this ListWidget */ 
$itemCount = size($this->contents);
$beginDate = '20/10/2013';
?>
<h1>Results&ndash; March 4, <?php //echo $this->viewData['attributes']['location']['values'][$_POST['Search']['location']]?></h1>
<?php
echo "<p>We have {$itemCount} matches for "
    . "beginning in the week of {$beginDate}</p>";
?>
<ul class="resort-listing search-listing">
        <?php
        $this->widget('zii.widgets.CListView', array(
                'id'=>'holidays',
                'dataProvider'=>$this->contents,
                'itemView'=>'item',
                'htmlOptions' => array(
                        'class' => 'constrained'					   
                ),
                //'summaryText'=> 'Properties',
                'template'=>'{items}',
                /*'pager'=>array(
                    'class'=>'CLinkPager',
                    'header'=>'',
                ),*/
                'viewData'=>array('attributes'=>$this->viewData['attributes'])
        ));
        ?>
</ul>
				
