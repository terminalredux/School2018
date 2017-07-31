<?php

namespace app\controllers;

use app\components\web\Controller;
use app\models\Consultation\Consultation;
use app\models\Consultation\ConsultationSearch;
use app\models\Forms\ConsultationForm;
use app\models\Professor\Professor;
use app\models\Room\Room;
use app\models\RoomTypeBuilding\RoomTypeBuilding;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * ConsultationController implements the CRUD actions for Consultation model.
 */
class ConsultationController extends Controller
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
     * Deletes an existing Consultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $professorId = $model->professor_id;
        if(!$model->delete()) {
            $this->error(Yii::t('flash', 'consulation.delete_error'));
        }

        return $this->redirect(['professor-consultation', 'professorId' => $professorId]);
    }

    /**
     * Finds the Consultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consultation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * @param int professorId
     * @return mixed
     */
    public function actionProfessorConsultation($professorId)
    {
        $modelProfessor = Professor::find()->andWhere(['status' => 1])->andWhere(['id' => $professorId])->limit(1)->one();
        
        $modelConsultationForm = new ConsultationForm();
        $modelConsultationForm->professor_id = $modelProfessor->id;
        $modelConsultationForm->setScenario(ConsultationForm::SCENARIO_CREATE);
        
        $consultations = Consultation::find()->andWhere(['!=', 'status', 0])
                                             ->andWhere(['professor_id' => $modelProfessor->id])
                                             ->orderBy(['begin' => 'asc'])
                                             ->all();
        
        if ($modelConsultationForm->load(Yii::$app->request->post())) {
            if (!$modelConsultationForm->saveConsultation()) {
                $this->error(Yii::t('flash', 'consultation.save_error'));
            }
            return $this->refresh();
        } 
        
        return $this->render('professor-consultation', [
            'modelProfessor' => $modelProfessor,
            'model' => $modelConsultationForm,
            'consultations' => $consultations,
        ]);
    }
    
    /**
     * Action depends on select building 
     * and populates select rooms list
     * @return string
     */
    public function actionRoomsList($buildingId)
    {
        $array = [];
        $models = RoomTypeBuilding::find()->andWhere(['status' => 1])->andWhere(['building_id' => $buildingId])->all();
        foreach ($models as $model) {
            array_push($array, $model->id);
        }
        $modelsRoom = Room::find()->andWhere(['status' => 1])->andWhere(['room_type_building_id' => $array])->all();
        
        if ($modelsRoom) {
            foreach ($modelsRoom as $room) {
                echo '<option value="' . $room->id . '">' . $room->number . ' (' . $room->roomTypeBuilding->roomType->type . ')</option>'; 
            }
        } else {
            echo '<option>' . Yii::t('app', 'room.no_rooms') . '</option>';
        }
    }
    
    /**
     * Sets consultation to public
     */
    public function actionPublic($id)
    {
        $model = $this->findModel($id);
        $model->public = Consultation::STATUS_PUBLIC;
        
        if (!$model->save()) {
            $this->error(Yii::t('flash', 'consultation.publish_error'));
        }
        
        return $this->redirect(['professor-consultation', 'professorId' => $model->professor_id]);
    }
   
    /**
     * Sets consultation to not public
     */
    public function actionNotPublic($id)
    {
        $model = $this->findModel($id);
        $model->public = Consultation::STATUS_NOT_PUBLIC;
        
        $professorId = $model->professor_id;
        if(!$model->save()) {
            $this->error(Yii::t('flash', 'consulation.delete_error'));
        }

        return $this->redirect(['professor-consultation', 'professorId' => $professorId]);
    }
    
    /**
     * Cancel consulatation
     */
    public function actionCancel($id)
    {
        $model = Consultation::find()->andWhere(['status' => 1])->andWhere(['id' => $id])->limit(1)->one();
        $model->status = Consultation::STATUS_CANCEL;
        
        if (!$model->save()) {
            $this->error(Yii::t('flash', 'consultation.cancel_error'));
        }
        
        return $this->redirect(['professor-consultation', 'professorId' => $model->professor_id]);
    }
    
    
    
    
}
