<?php
use yii\helpers\Html;

//\yii\bootstrap\BootstrapAsset::register($this); // using bootstrap css for template
//\yii\web\YiiAsset::register($this); // using javascript framework in this template
app\assets\ApplicationUiAssetBundle::register($this);
?>
<?php $this->beginPage(); ?>
<!doctype html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>">
    <title><?php echo Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
    <?php echo Html::csrfMetaTags(); //Generates the meta tags containing CSRF token information. ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
    <!--login area-->
    <div class="authorization-indicator">
        <?php 
        if (Yii::$app->user->isGuest) {
            echo Html::tag('span', 'Guest');
            echo Html::a('Login', 'site/login');
        } else {
            echo Html::tag('span', Yii::$app->user->identity->username);
            echo Html::a('Logout', 'site/logout');
        }
        ?>
    </div>
    <!-- end of login area -->
    <?php echo $content; ?>
    <footer class="footer"><?php echo Yii::powered(); ?></footer>
</div>
<?php $this->endBody(); ?>
</body>
</html>

<?php $this->endPage(); ?>