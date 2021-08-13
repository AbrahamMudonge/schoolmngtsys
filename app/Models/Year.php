<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "year".
 *
 * @property int $yearID
 * @property int $yearStatus
 *
 * @property AcademicleaveOrTransfer[] $academicleaveOrTransfers
 * @property MarksPerUnit[] $marksPerUnits
 * @property Students $year
 */
class Year extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['yearStatus'], 'required'],
            [['yearStatus'], 'integer'],
            [['yearID'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['yearID' => 'studentID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'yearID' => 'Year ID',
            'yearStatus' => 'Year Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicleaveOrTransfers()
    {
        return $this->hasMany(AcademicleaveOrTransfer::className(), ['yearID' => 'yearID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarksPerUnits()
    {
        return $this->hasMany(MarksPerUnit::className(), ['yearID' => 'yearID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYear()
    {
        return $this->hasOne(Students::className(), ['studentID' => 'yearID']);
    }
}
