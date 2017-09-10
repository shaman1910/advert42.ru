<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
class Advert extends ActiveRecord
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
            [['title', 'description', 'content', 'price'], 'required'],
            [['description', 'content'], 'string'],
            [['price'], 'number'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['status'], 'default', 'value' => 1],
            [['title'], 'string', 'max' => 255],
            [['viewed'], 'default', 'value' => 0],
            [['category_id'], 'default', 'value' => 1],
            [['user_id'], 'default', 'value' => Yii::$app->user->identity->id],


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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public static function getPopular($id)
    {
        return Advert::find()->orderBy('viewed desc')->limit($id)->all();
    }

    public function getDate($format)
    {
        return Yii::$app->formatter->asDate($this->date, $format);
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }

}
