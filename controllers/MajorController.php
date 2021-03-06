<?php

namespace app\controllers;

use app\components\web\Controller;
use app\models\Course\Course;
use app\models\Major\Major;
use app\models\Major\MajorSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * MajorController implements the CRUD actions for Major model.
 */
class MajorController extends Controller
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
     * Lists all Major models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MajorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Major model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Major();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'major.save_success'));
            } else {
                $this->error(Yii::t('flash', 'major.save_error'));
            }
            return $this->redirect(['index']);
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
        
    }

    /**
     * Updates an existing Major model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->success(Yii::t('flash', 'major.update_success'));
            } else {
                $this->error(Yii::t('flash', 'major.update_error'));
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing Major model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
        if ($this->findModel($id)->delete()) {
            $this->success(Yii::t('flash', 'major.delete_success'));
        } else {
            $this->error(Yii::t('flash', 'major.delete_error'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Major model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Major the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Major::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * @param int id - major id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', ['model' => $model]);
    }
    
    /**
     * @param int id - major id
     * @return mixed
     */
    public function actionCourses($id)
    {
        $modelMajor = $this->findModel($id);
        $modelsCourse = Course::find()->andWhere(['status' => 1])->andWhere(['major_id' => $modelMajor->id])->all();
        $modelCourse = new Course();
        $modelCourse->major_id = $modelMajor->id;
        $modelCourse->setScenario(Course::SCENARIO_CREATE);
        
        if ($modelCourse->load(Yii::$app->request->post())) {
            if ($modelCourse->save()) {
                $this->success(Yii::t('flash', 'course.save_success'));
            } else {
                $this->error(Yii::t('flash', 'course.save_error'));
            }
        }
        
        return $this->render('courses', [
            'modelMajor' => $modelMajor,
            'modelCourse' => $modelCourse,
            'modelsCourse' => $modelsCourse,
        ]);
    }
}
