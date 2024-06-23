<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parcing".
 *
 * @property int $id
 * @property int $car_id
 * @property string $date_in
 * @property string|null $date_out
 * @property string $price
 * @property int|null $discount
 * @property boolean $dedt
 * @property string $status
 *
 * @property Car $car
 */
class Parcing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parcing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id'], 'required'],
            [['car_id'], 'integer'],

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
            'date_in' => 'Дата и время заезда',
            'date_out' => 'Дата и время выезда',
            'price' => 'Цена за парковку',
            'discount' => 'Скидка',
            'dedt' => 'Задолжность по оплате',
            'status' => 'Статус оплаты',
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
