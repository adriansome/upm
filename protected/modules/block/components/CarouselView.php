<?php
Yii::import('zii.widgets.CListView');
class CarouselView extends CListView
{
    public function run()
    {
            $this->registerClientScript();
            $this->renderContent();
    }

    public function renderItems()
    {
            //this line renders the second div
            echo CHtml::openTag('ul',array('class'=>'slides'))."\n"; 
            
            $data=$this->dataProvider->getData();
            if(($n=count($data))>0)
            {
                $owner=$this->getOwner();
                $viewFile=$owner->getViewFile($this->itemView);
                $j=0;
                foreach($data as $i=>$item)
                {
                    $data=$this->viewData;
                    $data['index']=$i;
                    $data['data']=$item;
                    $data['widget']=$this;
                    $owner->renderFile($viewFile,$data);
                    if($j++ < $n-1)
                        echo $this->separator;
                }
            }
            else
                $this->renderEmptyText();
            
            echo CHtml::closeTag('ul');;
    }
}