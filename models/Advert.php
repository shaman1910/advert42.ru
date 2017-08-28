<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property double $price
 * @property string $date
 * @property integer $viewed
 * @property integer $user_id
 * @property integer $status
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'content'], 'string'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['viewed', 'user_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'price' => 'Price',
            'date' => 'Date',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }
}
