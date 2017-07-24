<?php

namespace app\controllers;

use Yii;
use app\models\RoomType\RoomType;
use app\models\RoomType\RoomTypeSearch;
use app\components\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomTypeController implements the CRUD actions for RoomType model.
 */
class RoomTypeController extends Controller
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
     * Lists all RoomType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new RoomType();
        
        $searchModel = new RoomTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
               $this->success(Yii::t('flash', 'room_type.save_success')); 
            } else {
               $this->error(Yii::t('flash', 'room_type.save_error')); 
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
     * Updates an existing RoomType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
               $this->success(Yii::t('flash', 'room_type.update_success')); 
            } else {
               $this->error(Yii::t('flash', 'room_type.update_error')); 
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RoomType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
        if ($this->findModel($id)->delete()) {
               $this->success(Yii::t('flash', 'room_type.delete_success')); 
            } else {
               $this->error(Yii::t('flash', 'room_type.delete_error')); 
            }
        return $this->redirect(['index']);
    }

    /**
     * Finds the RoomType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoomType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoomType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
