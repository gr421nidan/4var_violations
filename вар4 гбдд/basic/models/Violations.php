<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "violations".
 *
 * @property int $id
 * @property int $car_id
 * @property string $date
 * @property string $time
 * @property string $type
 * @property string $price
 * @property string $status
 *
 * @property Car $car
 */
class Violations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'violations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'date', 'time', 'type', 'price'], 'required'],
            [['car_id'], 'integer'],
            [['date', 'time'], 'safe'],
            [['type'], 'string', 'max' => 20],
            [['price'], 'string', 'max' => 10],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Машина',
            'date' => 'Дата нарушения',
            'time' => 'Время нарушения',
            'type' => 'Тип',
            'price' => 'Цена',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }
}
