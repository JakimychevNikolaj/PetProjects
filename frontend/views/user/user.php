<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = $user->name;

$this->registerJsFile('js/article.js', ['position' => yii\web\View::POS_END]);
$this->registerJsFile('js/comment.js', ['position' => yii\web\View::POS_END]);

?>

<?php if (\Yii::$app->user->id === $user->userId) : ?>
    <h1>Create new post</h1>

    <div class="row">
        <div class="col-lg-5">
            <?php \yii\widgets\Pjax::begin(['timeout' => 5000]); ?>
            <?php $form =
                ActiveForm::begin(['id' => 'post-form', 'options' => ['enctype' => 'multipart/form-data'],
                    'action' => ['post/create']]); ?>

            <?= $form->field($post, 'imageFile')->fileInput() ?>
            <?= $form->field($post, 'content')->textarea(['rows' => 6, 'class' => 'post-text-input-field form-control']); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
    </div>
<?php endif; ?>

<?php \yii\widgets\Pjax::begin(['timeout' => 5000]); ?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
    'viewParams' => ['commentsProvider' => $commentsProvider, 'comment' => $comment]
]);
?>
<?php \yii\widgets\Pjax::end(); ?>
