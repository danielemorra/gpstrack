<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->user->isGuest ? 'GpsTrack' : 'GpsTrack | ' .Yii::$app->user->identity->ute_username,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
//                    'class' => 'navbar-inverse navbar-fixed-top',
//                    'class' => 'navbar-dm9 navbar-fixed-top',
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Uscite', 'url' => ['/attivita'], 'visible' => !Yii::$app->user->isGuest],
                  ['label' => 'Sfide', 'url' => ['/sfida-iscrizione'], 'visible' => !Yii::$app->user->isGuest],
//                 	['label' => 'Ub/Comp.', 'url' => ['/ubicazione-componente']],
//                    ['label' => 'Attrezzatura', 'url' => ['/mezzo-trasporto'], 'visible' => !Yii::$app->user->isGuest],
               		[
                		'label' => 'Attrezzatura',
                		'items' => [
                				['label' => 'Attrezzatura', 'url' => Yii::$app->homeUrl.'?r=mezzo-trasporto'],
                				'<li class="divider"></li>',
                                ['label' => 'Componenti', 'url' => Yii::$app->homeUrl.'?r=componenti'],
                                '<li class="divider"></li>',
                                ['label' => 'Manutenzione', 'url' => Yii::$app->homeUrl.'?r=manutenzione'],
                                ['label' => 'Utilizzo', 'url' => Yii::$app->homeUrl.'?r=utilizzo-componente'],
                                ['label' => 'Ubicazione', 'url' => Yii::$app->homeUrl.'?r=ubicazione-componente'],
                                '<li class="divider"></li>',
                                ['label' => 'Venditori', 'url' => Yii::$app->homeUrl.'?r=fornitori'],
                		],
                        'visible' => !Yii::$app->user->isGuest,
               		],
//               		[
//                		'label' => 'Componenti',
//                		'items' => [
//                				['label' => 'Componenti', 'url' => Yii::$app->homeUrl.'?r=componenti'],
//                				'<li class="divider"></li>',
////                 				'<li class="dropdown-header">Dropdown Header</li>',
//                                ['label' => 'Manutenzione', 'url' => Yii::$app->homeUrl.'?r=manutenzione'],
//                				['label' => 'Utilizzo', 'url' => Yii::$app->homeUrl.'?r=utilizzo-componente'],
//                				['label' => 'Ubicazione', 'url' => Yii::$app->homeUrl.'?r=ubicazione-componente'],
//                                '<li class="divider"></li>',
//                                ['label' => 'Venditori', 'url' => Yii::$app->homeUrl.'?r=fornitori'],
//                		],
//                        'visible' => !Yii::$app->user->isGuest,
//               		],
                	[
                		'label' => "Backend",
                		'items' => [
                                ['label' => 'Sfide/Obiettivi', 'url' => Yii::$app->homeUrl.'?r=sfida'],
                                ['label' => 'Specialita sfide', 'url' => Yii::$app->homeUrl.'?r=sfida-specialita'],
                                '<li class="divider"></li>',
                                ['label' => 'Tipologie Attrezzatura', 'url' => Yii::$app->homeUrl.'?r=tipologia-mzt'],
                				'<li class="divider"></li>',
                				// '<li class="dropdown-header">Dropdown Header</li>',
                				['label' => 'Categorie Componenti', 'url' => Yii::$app->homeUrl.'?r=categoria'],
                                '<li class="divider"></li>',
                                ['label' => 'Parametri', 'url' => Yii::$app->homeUrl.'?r=param'],
                                '<li class="divider"></li>',
                                ['label' => 'Utenti', 'url' => Yii::$app->homeUrl.'?r=utente'],
                		],
                        'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->ute_username == 'dm9',
                	],
                		
               		/*dm9*
                	['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']], */
                    ['label' => 'Contatti', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; dm9.it <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
