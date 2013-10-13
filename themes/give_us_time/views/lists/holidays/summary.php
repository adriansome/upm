<?php /* @var $data CArrayDataProvider */ ?>
<li class="<?php echo $data['status']; ?>">
    <span class="timeframe"><?php output_holiday_dates($data['arrival_date'], $data['departure_date']) ?></span>
    <span class="capacity"><?php echo $data['number_of_bedrooms'] ?> Bed, Sleeps <?php echo $data['sleeps_number'] ?></span>
    <span class="status"><?php
        if ($data['status'] == 'available') {
            $booked_by = 'Available';
        } else {
            $booked_by = "Booked";
            if  (isset($data['booked_by']) && $data['booked_by'] instanceof User) {
                $user = $data['booked_by'];
                $name = $user->initial . '. ' . $user->lastname;
                $booked_by .= " by {$name}"; 
            } else {
                $data['booked_by'] = '';
            }
            
        }
        echo $booked_by;
    ?></span>
    <span class="actions">
    <?php
    switch($data['status']) {

        case 'booked':
            break;

        case 'provisionally-booked':
            ?>
            <a class="action-button accept" data-toggle="accept-item" data-id="<?php echo $data['booked_by']->id ?>"
               href="<?php echo Yii::app()->createUrl('/block/management/update/id/'.$data['block_id'].'/list/holidays'); ?>">Accept</a>
            <a class="action-button reject" data-toggle="reject-item" data-id="<?php echo $data['booked_by']->id ?>"
               href="<?php echo Yii::app()->createUrl('/block/management/update/id/'.$data['block_id'].'/list/holidays'); ?>">Reject</a>
            <?php
            break;

        default:
            ?>
            <a class="action-button edit" data-toggle="edit-item"
               href="<?php echo Yii::app()->createUrl('/block/management/update/id/'.$data['block_id'].'/list/holidays'); ?>">Edit Holiday</a>
            <a class="action-button delete" data-toggle="delete-item"
               data-id="<?php echo $data['block_id'] ?>"
               href="<?php echo Yii::app()->createUrl('/block/management/delete/'.$data['block_id']);?>">Delete Holiday</a>
            <?php
            break;            

    }
    ?>
    </span>
</li>