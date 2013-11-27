<?php
// Display properties list if not editing an existing property
if (isset($id) && (int) $id) {

    // check whether this property belongs to this user (landlord)
    $property = Block::model()->findByPk($id);

    if (Yii::app()->user->id != $property->getContentValue('user_id', 'string_value')) {
        ?>
        <p>You do not have permission to view this page</p>
        <?php
    } else {
        ?>
        <input type="hidden" id="get-params" data-id="<?php echo $id; ?>"/>
        <?php
        $this->widget('ListWidget', array(
            'name' => 'properties',
            'scenario' => 'edit',
            'item_id' => $id,
            'filters' => array(
                'user_id' => array(
                    'field_type' => 'string_value',
                    'value' => Yii::app()->user->id
                )
            )
        ));
    }
} else {
    ?>
    <h1>Welcome to Give Us Time - <?php echo $model->fullname; ?></h1>

    <div class="properties-container">
    </div>

    <div class="landlord-details">
        <h2>Your Details</h2>
        <div class="inner-content">
            <div class="details-row" id="address">
                <div class="landlord-name"><?php echo $model->fullname; ?></div>
                <p><br/>

                    <?php

                    	/*
                    	if($model->address1) {
                    		echo $model->address1 . ',';
                    	};
                    	if($model->address2) {
                    		echo $model->address2 . ',<br/>';
                    	};

                    	if($model->area) {
							echo $model->area . ',';
                    	};
                    	if($model->city) {
							echo $model->city . ',<br/>';
                    	};

                    	if($model->county) {
							echo $model->county . ',<br/>';
                    	};

                    	if($model->postcode) {
							echo $model->postcode . ',<br/>';
                    	};

                    	if($model->country) {
							echo $model->country . ',<br/><br/>';
                    	};
                    	echo $model->phone_number;
                    	*/
					?>

                    <?php echo "
                                        $model->address1, $model->address2 <br/>
                                        $model->area, $model->city, <br/>
                                        $model->county <br/>
                                        $model->postcode.<br/>
                                        $model->country<br/><br/>
										$model->phone_number
                                        " ?>
                </p>
                <a data-toggle="edit-item" data-target="profile" class="action-button edit" href="/user/profileupdate/">Edit</a>
            </div>
            <div class="details-row" id="email">
                <p>
                    <span>Username: </span><?php echo $model->email ?>
                </p>
                <a data-toggle="edit-item" data-target="profile" class="action-button edit" href="/user/profileupdateemail">Edit</a>
            </div>
            <div class="details-row" id="password">
                <p>
                    <span>Password: </span>*****
                </p>
                <a data-toggle="edit-item" data-target="profile" class="action-button edit" href="/user/profileupdatepassword/">Edit</a>
            </div>
        </div>
    </div>

    <br/>
    <p>Thank you for supporting Give Us Time. Your holiday donations are very much appreciated. Please continue to support military families during their holidays by giving them their privacy.</p>
<?php } ?>