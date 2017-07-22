<?php

namespace app\controllers;

use app\components\web\Controller;
use app\models\AcademicTitle\AcademicTitle;
use app\models\AcademicTitle\AcademicTitleSearch;
use app\models\Forms\AcademicTitleForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * AcademicTitleController implements the CRUD actions for AcademicTitle model.
 */
class AcademicTitleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AcademicTitle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AcademicTitleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new AcademicTitle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AcademicTitle();

        if ($model->load(Yii::$app->request->post()) && $model->saveAcademicTitle()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AcademicTitle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AcademicTitle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * @return mixed
     */
    public function actionOrder()
    {
        $modelForm = new AcademicTitleForm();
        $models = AcademicTitle::find()->andWhere(['status' => 1])->orderBy(['order' => 'asc'])->all();
        $sortableData = AcademicTitle::generateOrderItems($models);
        
        if ($modelForm->load(Yii::$app->request->post())) {
            var_dump('We are in');
            return $this->redirect(['index']);
        } 
       
        
        return $this->render('order', [
            'modelForm'    => $modelForm,
            'sortableData' => $sortableData
        ]);
    }

    /**
     * Finds the AcademicTitle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AcademicTitle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcademicTitle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
