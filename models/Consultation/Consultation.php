<?php

namespace app\models\Consultation;

use app\models\Professor\Professor;
use app\models\Room\Room;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "consultation".
 *
 * @property integer $id
 * @property integer $professor_id
 * @property integer $room_id
 * @property integer $begin
 * @property integer $end
 * @property string $additional_info
 * @property integer $status
 * @property integer $public
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Professor $professor
 * @property Room $room
 */
class Consultation extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_CANCELED = 2;
    const STATUS_CHANGED_TERM = 3;
    
    const STATUS_PUBLIC = 1;
    const STATUS_NOT_PUBLIC = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultation';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['professor_id', 'room_id', 'begin', 'end'], 'required'],
            [['professor_id', 'room_id', 'begin', 'end', 'status', 'public', 'created_at', 'updated_at'], 'integer'],
            [['additional_info'], 'string'],
            [['professor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professor_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'consultation.id'),
            'professor_id' => Yii::t('app', 'consultation.professor_id'),
            'room_id' => Yii::t('app', 'consultation.room_id'),
            'begin' => Yii::t('app', 'consultation.begin'),
            'end' => Yii::t('app', 'consultation.end'),
            'additional_info' => Yii::t('app', 'consultation.additional_info'),
            'status' => Yii::t('app', 'consultation.status'),
            'public' => Yii::t('app', 'consultation.public'),
            'created_at' => Yii::t('app', 'consultation.created_at'),
            'updated_at' => Yii::t('app', 'consultation.updated_at'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id' => 'professor_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @inheritdoc
     * @return ConsultationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConsultationQuery(get_called_class());
    }
}
