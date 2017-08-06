<?php

namespace app\controllers;

use Yii;
use app\models\CourseBasic\CourseBasic;
use app\models\CourseBasic\CourseBasicSearch;
use app\components\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseBasicController implements the CRUD actions for CourseBasic model.
 */
class CourseBasicController extends Controller
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
     * Lists all CourseBasic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseBasicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new CourseBasic();

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->save()) { 
                $this->error(Yii::t('flash', 'course_basic.save_error'));
            } 
            return $this->redirect(['index']);
        }
        
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Updates an existing CourseBasic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'course_basic.update_success'));
            } else {
                $this->error(Yii::t('flash', 'course_basic.update_error'));
            }
            return $this->redirect(['index']);
        } 
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing CourseBasic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            $this->success(Yii::t('flash', 'course_basic.delete_success'));
        } else {
            $this->error(Yii::t('flash', 'course_basic.delete_error'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the CourseBasic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CourseBasic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CourseBasic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
