<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realty".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 *
 * @property Favorites[] $favorites
 */
class Realty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'realty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorites::className(), ['realtyId' => 'id'])
            ->where(['userId' => Yii::$app->user->id]);
    }

}
