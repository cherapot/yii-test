/**
 * Created by redrice on 31.03.2017.
 */

var UserFavorites;

UserFavorites = {

    /* селектор недвижимости для добавления в избранное */
    userFavoritesSelector: '.js-user-favorites-control',

    /* селектор недвижимости для добавления в избранное */
    userFavoritesConfigSelector: '.js-user-favorites-config',

    init: function () {
        this.showButtonForAddUserFavorite();
    },

    showButtonForAddUserFavorite: function () {
        $(UserFavorites.userFavoritesSelector).on('click', function (e) {
            console.log("hello");
            var userFavoritesButton = e.target;
            //console.log($(UserFavorites.userFavoritesConfigSelector).data('add-user-favorites-uri'));
            console.log($(userFavoritesButton).text());
            var state = $(userFavoritesButton).attr('data-state'),
                uri;
            console.log(state);
            if (state === 'empty'){
                uri = $(UserFavorites.userFavoritesConfigSelector).data('add-user-favorites-uri');
            } else {
                uri = $(UserFavorites.userFavoritesConfigSelector).data('delete-user-favorites-uri');
            }
            $.get(
                document.location.protocol + "//" + document.location.host + uri,
                function (response) {
                    // показать toast c колличеством отфильтрованных элементов
                    console.log(response);
                    if(response === 'true') {
                        //$(userFavoritesButton).text(text);
                        $(userFavoritesButton).attr('data-state', 'active');
                        console.log(uri);
                    }
                }
            );
        });
    }

};

$(document).ready(function () {
    return UserFavorites.init();
});