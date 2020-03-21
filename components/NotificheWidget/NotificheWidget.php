<?php
namespace app\components\NotificheWidget;

use yii\base\Widget;
use yii\helpers\Html;

class NotificheWidget extends Widget{
   
    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('list');
    }
}
?>