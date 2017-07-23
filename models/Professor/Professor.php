<?php

namespace app\models\Professor;

use Yii;
use app\models\AcademicTitle\AcademicTitle;

/**
 * This is the model class for table "professor".
 *
 * @property integer $id
 * @property integer $academic_title_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property integer $gender
 * @property string $website
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AcademicTitle $academicTitle
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['academic_title_id', 'firstname', 'lastname', 'gender'], 'required'],
            [['academic_title_id', 'gender', 'status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 50],
            [['website', 'email'], 'string', 'max' => 255],
            [['academic_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicTitle::className(), 'targetAttribute' => ['academic_title_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'professor.id'),
            'academic_title_id' => Yii::t('app', 'professor.academic_title_id'),
            'firstname' => Yii::t('app', 'professor.firstname'),
            'middlename' => Yii::t('app', 'professor.middlename'),
            'lastname' => Yii::t('app', 'professor.lastname'),
            'gender' => Yii::t('app', 'professor.gender'),
            'website' => Yii::t('app', 'professor.website'),
            'email' => Yii::t('app', 'professor.email'),
            'status' => Yii::t('app', 'professor.status'),
            'created_at' => Yii::t('app', 'professor.created_at'),
            'updated_at' => Yii::t('app', 'professor.updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicTitle()
    {
        return $this->hasOne(AcademicTitle::className(), ['id' => 'academic_title_id']);
    }

    /**
     * @inheritdoc
     * @return ProfessorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfessorQuery(get_called_class());
    }
}
