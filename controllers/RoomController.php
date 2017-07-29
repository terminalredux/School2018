<?php

namespace app\controllers;

use Yii;
use app\models\Room\Room;
use app\models\Room\RoomSearch;
use app\components\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
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
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex($buildingId)
    {
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Room();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'buildingId' => $buildingId]);
        } 
        
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'buildingId' => $buildingId
        ]);
    }

    /**
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Room();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'room.save_success'));
            } else {
                $this->error(Yii::t('flash', 'room.save_error'));
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        
        return $this->render('create', [
            'model' => $model,
        ]);  
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $buildingId)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'room.update_success'));
            } else {
                $this->error(Yii::t('flash', 'room.update_error'));
            }
            return $this->redirect(['index', 'id' => $model->id, 'buildingId' => $buildingId]);
        } 
        
        return $this->render('update', [
            'model' => $model,
            'buildingId' => $buildingId,
        ]);
        
    }

    /**
     * Deletes an existing Room model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $buildingId)
    {
        if($this->findModel($id)->delete()) {
            $this->success(Yii::t('flash', 'room.delete_success'));
        } else {
            $this->error(Yii::t('flash', 'room.delete_error'));
        }

        return $this->redirect(['index', 'buildingId' => $buildingId]);
    }

    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
