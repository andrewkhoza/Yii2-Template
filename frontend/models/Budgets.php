<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "budgets".
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property string $created
 */
class Budgets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'budgets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'created'], 'required'],
            [['user_id'], 'integer'],
            [['amount'], 'number'],
            [['created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'created' => 'Created',
        ];
    }
}
