<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/user-male.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->uomo->fullName ?></p>
                <small><?= Yii::$app->user->identity->uomo->congregazione->nome ?></small>
            </div>
        </div>
		<br>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Assemblee di Circoscrizione', 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->identity->can('area_assemblee')],
                    ['label' => 'Organigramma reparti', 'icon' => 'sitemap', 'url' => ['/organigramma'],'visible' => Yii::$app->user->identity->can('area_assemblee')],
                    ['label' => 'La mia Modulistica', 'icon' => 'folder-open', 'url' => ['/organigramma/miei-reparti'],'visible' => Yii::$app->user->identity->can('area_assemblee')],
                    ['label' => 'Invia rapporto finale', 'icon' => 'paper-plane', 'url' => ['/rapporto/miei-rapporti'],'visible' => Yii::$app->user->identity->can('area_assemblee')],
                    
                    
                    ['label' => 'Discorsi Pubblici', 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->identity->can('area_oratori')],
                    ['label' => 'Oratori', 'icon' => 'black-tie', 'url' => ['/oratore'], 'visible' => Yii::$app->user->identity->can('area_oratori')],
                    ['label' => 'I miei schemi', 'icon' => 'file-text-o', 'url' => ['/oratore-schema'], 'visible' => Yii::$app->user->identity->can('area_oratori')],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
         
                    ['label' => 'Amministrazione', 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Assemblee', 'icon' => 'leanpub', 'url' => ['/assemblea'],'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Uomini', 'icon' => 'male', 'url' => ['/uomo'],'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Reparti', 'icon' => 'th', 'url' => ['/reparto'], 'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Modulistica', 'icon' => 'folder-open', 'url' => ['/reparto/index-modulistica'],],
                    ['label' => 'Congregazioni', 'icon' => 'home', 'url' => ['/congregazione'], 'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Circoscrizione', 'icon' => 'circle', 'url' => ['/circoscrizione/setting'], 'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Schemi', 'icon' => 'files-o', 'url' => ['/schema'], 'visible' => Yii::$app->user->identity->isAdmin],
                    ['label' => 'Comunicazioni', 'icon' => 'bell-o', 'url' => ['/notifica'], 'visible' => Yii::$app->user->identity->isAdmin],
                    //['label' => 'Account', 'icon' => 'id-badge', 'url' => ['/account'], 'visible' => Yii::$app->user->identity->isAdmin],
                    /*[
                        'label' => 'Amministrazione',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                        	['label' => 'Congregazioni', 'icon' => 'home', 'url' => ['/congregazione'],],
                            ['label' => 'Reparti', 'icon' => 'file-code-o', 'url' => ['/reparto'],],
                            ['label' => 'Schemi', 'icon' => 'files-o', 'url' => ['/schema'],],
                            ['label' => 'Uomini', 'icon' => 'male', 'url' => ['/uomo'],],
                            ['label' => 'Account', 'icon' => 'dashboard', 'url' => ['/account'],],
                            
                        ],
                    ],
                    */
                ],
            ]
        ) ?>

    </section>

</aside>
