<?php
use yii\widgets\ActiveForm;
use common\helpers\AddonUrl;
use common\widgets\webuploader\Images;
use common\widgets\webuploader\Files;
use kartik\datetime\DateTimePicker;

$this->title = $model->isNewRecord ? '创建' : '编辑';
$this->params['breadcrumbs'][] = ['label' => '单页管理', 'url' => AddonUrl::to(['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "<div class='col-sm-1 text-right'>{label}</div><div class='col-sm-11'>{input}{hint}{error}</div>",
                ]
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'title')->textInput(); ?>
                <?= $form->field($model, 'author')->textInput(); ?>
                <?= $form->field($model, 'sort')->textInput(); ?>
                <?= $form->field($model, 'cover')->widget(Images::class, [
                    'config' => [
                        'pick' => [
                            'multiple' => false,
                        ]
                    ]
                ]); ?>
                <?= $form->field($model, 'description')->textarea(); ?>
                <?= $form->field($model, 'content')->widget(\common\widgets\ueditor\UEditor::class, [
                    'formData' => [
                        'drive' => 'local', // 默认本地 支持qiniu/oss 上传
                        'thumb' => [ // 生成缩略图
                            [
                                'widget' => 100,
                                'height' => 100,
                            ],
                        ]
                    ],
                ]) ?>
                <?= $form->field($model, 'status')->radioList(['1' => '启用','0' => '禁用']); ?>
            </div>
            <div class="box-footer text-center">
                <button class="btn btn-primary" type="submit">保存</button>
                <span class="btn btn-white" onclick="history.go(-1)">返回</span>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>