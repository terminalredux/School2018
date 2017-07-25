<?php

namespace app\controllers;

use app\components\web\Controller;
use app\models\Building\Building;
use app\models\Building\BuildingSearch;
use app\models\Forms\RoomTypesBuildingForm;
use app\models\RoomType\RoomType;
use app\models\RoomTypeBuilding\RoomTypeBuilding;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * BuildingController implements the CRUD actions for Building model.
 */
class BuildingController extends Controller
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
     * Lists all Building models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BuildingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Building model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Building model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Building();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'building.save_success'));
            } else {
                $this->error(Yii::t('flash', 'building.save_error'));
            }
            return $this->redirect(['index']);
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Building model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'building.update_success'));
            } else {
                $this->error(Yii::t('flash', 'building.update_error'));
            }
            return $this->redirect(['index']);
        } 
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing Building model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            $this->success(Yii::t('flash', 'building.delete_success'));
        } else {
            $this->error(Yii::t('flash', 'building.delete_error'));
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Building model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Building the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Building::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * @return mixed
     */
    public function actionRelations($id)
    {
        $model = $this->findModel($id);
        
        $roomTypesBuildingForm = new RoomTypesBuildingForm();
       
        $modelsRoomTypes = RoomType::find()->andWhere(['status' => 1])->all();
        $assignedRoomTypes = RoomType::assignedRoomTypes($id);
        $sortableData = RoomType::generateOrderRoomTypes($id);
       
        if ($roomTypesBuildingForm->load(Yii::$app->request->post())) {
            if ($roomTypesBuildingForm->saveBuildingRoomType($model->id)) {
                $this->success(Yii::t('flash', 'room_type_building.save_success'));
            } else {
                $this->error(Yii::t('flash', 'room_type_building.save_error'));
            }
            return $this->redirect(['index']);
        } 
        
        return $this->render('relations', [
            'model' => $model,
            'roomTypesBuildingForm' => $roomTypesBuildingForm,
            'sortableData' => $sortableData,
            'assignedRoomTypes' => $assignedRoomTypes,
        ]);
    }
    
   
}
