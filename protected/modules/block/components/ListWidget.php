<?php
class ListWidget extends CWidget
{
	public $name;
	public $scenario;
	public $pageSize;
	public $maxItems;
	public $customQuery;
	public $filters;
	public $item_id;
	public $item_slug;
	public $viewData;

	protected $config;
	protected $page_id;
	protected $contents;
	protected $attributes;
	protected $id;
    protected $_userList = array();

	public function getViewPath($checkTheme=false)
	{
		return Yii::app()->theme->basepath.'/views/lists/'.$this->name;
	}

	public function init()
	{

            $this->page_id = Yii::app()->session['page_id'];
            $this->id = str_replace(' ', '-', $this->name);

            $this->configure();
            
            $this->attributes = $this->itemAttributes();
            
            if ($this->name == 'holidays') {
                $this->_userList = $this->_getUsers();
            }

            if(isset($this->item_id) || isset($this->item_slug)) {
                    $this->loadItem();
            }
            else {
                    $this->loadItems();
            }

	}

	protected function configure()
	{
		$config = file_get_contents(

			Yii::app()->theme->basepath.'/views/lists/'.$this->name.'.json'
		);

		$this->config = json_decode($config);
	}

	public function itemAttributes(array $params = array())
	{
            $attributes = Yii::app()->utility->object_to_array($this->config->attributes);
            // Add a slug if a title field is present
            if (isset($attributes['title'])) {
                $attributes['slug'] = array(
                    'type' => 'hidden'
                );
            }
            
            foreach ($attributes as $field => $properties) {
                $values = array();
                if (isset($properties['source']) && $properties['source'] === 'db') {
                    if ($field === 'country') {
                        Yii::import('application.modules.block.controllers.*');
                        $management = new ManagementController('block');
                        $values = $management->actionLoadCountryList();
                        $withHolidays = FALSE;
                        if (isset($params['withHolidays'])) {
                            $withHolidays = $params['withHolidays'];
                        }
                        $attributes[$field]['values'] = $this->_getCountryList($values, $withHolidays);
                    }
                }

            }

	    return $attributes;
	}

	protected function loadItems()
	{
		$params = array();
		
		if(isset($this->maxItems))
			$params['limit'] = $this->maxItems;
        // Run a custom query to load items
		if ($this->customQuery || $this->filters) {
            if (!$this->customQuery) {
                $sql = "SELECT b.* "
                        . "FROM block AS b "
                        . "LEFT JOIN content AS c "
                        . "ON c.`block_id` = b.`id` "
                        . "WHERE b.`name` LIKE '{$this->name} item%' ";
                foreach ($this->filters as $field => $fieldData) {
                    $fieldType = $fieldData['field_type'];
                    $value = $fieldData['value'];
                    $sql .= " AND c.`name` = '{$field}' AND c.`{$fieldType}` = '{$value}'";                       
                }
            } else {
                $sql = $this->customQuery;
            }
            $items = Block::model()->findAllBySql($sql, $params);
		} else {
                    $items = Block::model()->with('contents')->findAll(array(
                            'condition'=>'t.name LIKE "'.$this->name.' item%"'
                    ), $params);
		}

		$list = array();
                
                foreach($items as $index=>$item) 
                {
                    $list[$index] = $this->loadContents($item);
                    $list[$index]['block_id'] = $item->id;
                }

                $listData = array(
                    'id' => 'title',
                    'keyField' => 'title'
                );
                
                if (isset($this->pageSize)) {
                    $listData['pagination'] = array(
                        'pageSize' => $this->pageSize
                    );
                }
                
                $dataProvider = new CArrayDataProvider($list, $listData);
                
                $this->contents = $dataProvider;
	}
	
	/**
	 * Load a specific item for output
	 *
	 * @param $id The ID of the item from the database
	 */
	protected function loadItem() {

		// Prioritise looking up item slug over item ID
		if ($this->item_id) {
			$item = Block::model()->with('contents')->find(array(
				'condition'=>'t.name LIKE "'.$this->name.' item%" AND t.id = "' . $this->item_id . '"',
			));						
		} else {
                    $sql = "SELECT b.* "
                            . "FROM block AS b "
                            . "LEFT JOIN content AS c "
                            . "ON c.`block_id` = b.`id` "
                            . "WHERE b.`name` LIKE '{$this->name} item%' "
                            . "AND c.`name` = 'slug' "
                            . "AND c.`string_value` = '{$this->item_slug}'";

                    $item = Block::model()->findBySql($sql);
		}

		// Make sure we have the record
		if ($item) {
			$content = $this->loadContents($item);

			$this->contents = new CArrayDataProvider($content, array(
				'id'=>'title',
				//'keyField'=>'title'
			));
		}
		
	}
	
	/**
	 * Loads content for a specific item
	 * @param Block $item
	 */
	protected function loadContents(Block $item) {

		$contents = array();

		foreach($item->contents as $content)
		{
                        // Without this line, there are errors if any fields get renamed
                        // Or remove
                        if (!isset($this->attributes[$content->name])) {
                            continue;
                        }
			switch($this->attributes[$content->name]['type'])
			{
				case 'singleline':
				case 'multiline':
					$contents[$content->name] = htmlspecialchars($content->string_value);
					break;

				case 'html':
					$contents[$content->name] = $content->string_value;
					break;

				case 'date':
					$contents[$content->name] = date($this->attributes[$content->name]['format'], strtotime($content->date_value));
					break;

				case 'file':
                                case 'image':
					$contents[$content->name] = $content->file_value;
					break;

				case 'list':
					$contents[$content->name] = $content->string_value;
					break;

				case 'boolean':
					$contents[$content->name] = $content->boolean_value;
					break;
				
				case 'list':
					$contents[$content->name] = $content->string_value;
					break;
				
				case 'hidden':
                                        if ($this->name == 'holidays' && $content->name == 'booked_by') {
                                            if (isset($this->_userList[$content->string_value])) {
                                                // Replace user ID with a User object
                                                $contents[$content->name] = $this->_userList[$content->string_value];
                                            }
                                        } else {
                                            $contents[$content->name] = $content->string_value;
                                        }
					break;				
				
				default:
					throw new CHttpException(500, 'Unknown type "'.$this->attributes[$content->name]['type'].'" for attribute "'.$content->name.'"');
			}
		}

		return $contents;
	}

	public function run()
	{
            // Throw error if we've got nothing
            if (!$this->contents) {
                throw new CHttpException(404, 'Could not find the requested item.');
            } else if(Yii::app()->user->isAdmin() || Yii::app()->user->isEditor()){
                echo '<div>';
                $this->render($this->scenario);
                require(Yii::app()->basepath.'/modules/block/widgets/views/_listManagement.php');
                echo '</div>';
            } else {
                $this->render($this->scenario);
            }
	}
        
    protected function _getUsers()
    {
        // Load users list for holiday items
        $userList = array();
        $users = User::model()->findAll();
        foreach ($users as $user) {
            $userList[$user->id] = $user;
        }
        return $userList;
    }
    
    /**
     * Get the list of countries
     * @param array $values
     *      An array containing countries from the database
     */
    protected function _getCountryList(array $values = array(), $withHolidays=FALSE)
    {
        
        if (!$withHolidays) {
            $rows = Yii::app()->db->createCommand()
                    ->select('country_id')
                    ->from('property_country')
                    ->queryAll();
        } else {
            $sql = "SELECT * "
                    . "FROM block AS b "
                    . "LEFT JOIN content AS c "
                    . "ON b.id = c.block_id "
                    . "LEFT JOIN property_country AS pc "
                    . "ON pc.property_id = c.string_value "
                    . "WHERE b.name LIKE '%holidays item%' "
                    . "AND c.name = 'property_id' "
                    . "AND pc.property_id = c.string_value ";
            $command = Yii::app()->db->createCommand($sql);
            $rows = $command->queryAll();
        }
        
        $countryIds = array();
        foreach ($rows as $row) {
            $countryIds[] = $row['country_id'];
        }
        
        $list = array();

        foreach ($countryIds as $id) {
            $list[$id] = $values[$id];
        }

        return $list;
    }
}
