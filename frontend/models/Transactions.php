<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property float $amount
 * @property string|null $description
 * @property string $type
 * @property string $created
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'amount', 'type', 'created'], 'required'],
            [['user_id', 'category_id'], 'integer'],
            [['amount'], 'number'],
            [['created'], 'safe'],
            [['description', 'type'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'amount' => 'Amount',
            'description' => 'Description',
            'type' => 'Type',
            'created' => 'Created',
        ];
    }
}
