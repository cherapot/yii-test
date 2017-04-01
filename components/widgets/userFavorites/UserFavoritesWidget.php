<?php
namespace app\components\widgets\UserFavorites;

use app\components\widgets\ModuleWidget;
use Yii;

/*
 * Виджет для работы со списком избранных объектов недвижимости пользователя
 */
class UserFavoritesWidget extends ModuleWidget
{
    /**
     * URI для добавления объекта недвижимости в избранное
     *
     * @var string
     */
    public $addUserFavoritesURI;

    /**
     * URI для удаления объекта недвижимости из избранного
     *
     * @var string
     */
    public $deleteUserFavoritesURI;

    /** @inheritdoc */
    public function init()
    {
        $this->registerWidgetAssets(['UserFavorites.js']);
    }

    /** @inheritdoc */
    public function run()
    {
        return '<config class="js-user-favorites-config"' .
            'data-add-user-favorites-uri="' . $this->addUserFavoritesURI . '"' .
            'data-delete-user-favorites-uri="' . $this->deleteUserFavoritesURI . '" ></config>';
    }
}