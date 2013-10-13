<?php /* @var $data CArrayDataProvider */ ?>
<option value="<?php echo $data['block_id']?>"><?php echo date('d M Y',strtotime(str_replace('/','-',$data['arrival_date']))) ?> - <?php echo date('d M Y',strtotime(str_replace('/','-',$data['departure_date']))) ?></option>
