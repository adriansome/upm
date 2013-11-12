
<ul class="resort-listing">
    
    <?php
    
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $this->contents,
        'itemView' => 'provisionalItem',
        'emptyText' => 'You have not yet booked a holiday',
    ));
    ?>

</ul>

