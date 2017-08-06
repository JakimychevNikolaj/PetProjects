<?php
use yii\widgets\ListView;

?>

<?php \yii\widgets\Pjax::begin(['timeout' => 5000]); ?>
<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_articles',
    'viewParams' => ['commentsProvider' => $commentsProvider, 'commentForm' => $commentForm]
]);
?>
<?php \yii\widgets\Pjax::end(); ?>

