import $ from "jquery"
import moment from 'moment';

const $boxSearch = $('.result-search-box');

$('#searchMain').keyup((e) => {
    let $val = $(e.target).val();

    if ($val === '') {
        $boxSearch.hide();
    } else {
        let $boxPostSearch = $('.js-post-search');
        let $boxUserSearch = $('.js-user-search');
        let $boxHashtagSearch = $('.js-hashtag-search');
        let $csrfToken = $('meta[name="csrf-token"]').attr('content');
        let $route = $(e.target).attr('data-route');

        $.ajax({
            url: $route,
            data: {
                search: $val,
            },
            type: 'GET',
            headers: {
                'X-CSRF-Token': $csrfToken
            },
            success: function (res) {
                const $actionNextPage = $('.js-search-nextPage').attr('action');

                $.each(res, function (index, item) {
                    if (index === 'dataPost') {
                        let $route = $boxPostSearch.attr('data-route');
                        let $mappedElements = $.map(item, function (value, key) {
                            if (key < 10) {
                                return '<a href="' + $route + '?id=' + value.id + '" class="main-content__item">' +
                                    '<div class="w-100 h-100 main-container__item">' +
                                        '<div class="info-post-item d-flex">' +
                                            '<img src="' + (value.user !== null && value.user.avatar !== null ? value.user.avatar : 'images/avatar_default.png') + '"' +
                                                'title="Avatar của ' + value.user.name + '" alt="">' +
                                                '<h5>' +
                                                    '<div class="d-flex align-items-center">' +
                                                        value.user.name +
                                                        '<div class="verify-user ml-1 ' + (value.user.verify === 1 ? "" : "d-none") + '">' +
                                                            '<i class="fa-solid fa-check"></i>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="d-flex justify-content-between flex-wrap">' +
                                                        '<span class="item-footer mr-2">' + moment(value.created_at, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY") + '</span>' +
                                                        '<div class="d-flex item-footer">' +
                                                            '<div class="mr-2">' +
                                                                '<i class="fa-solid fa-message text-dark mr-1"></i>' +
                                                                    value.reviews.length +
                                                            '</div>' +
                                                            '<div class="mr-2">' +
                                                                '<i class="fa-solid fa-eye text-dark mr-1"></i>' +
                                                                value.views +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</h5>' +
                                        '</div>' +
                                        '<h5>' +
                                            value.title +
                                        '</h5>' +
                                            '<span class="verifyText ml-0 ' + (value.verify === 1 ? "" : "d-none") + '">This post had been verified</span>' +
                                    '</div>' +
                                '</a>'
                            }
                        });
                        if (item.length > 10) {
                            const $textMore = $boxPostSearch.attr('data-text');
                            let $newElement = $('<div class="d-flex align-center justify-content-center mb-2">' +
                                '<a href="' + $actionNextPage + '?search=' + $val + '">' + $textMore + '</a></div>');

                            $mappedElements.push($newElement);
                        }
                        $boxPostSearch.html($mappedElements);
                    } else if (index === 'dataUser') {
                        let $route = $boxUserSearch.attr('data-route');
                        let $mappedElements = $.map(item, function (value, key) {
                            if (key < 10) {
                                return '<a class="main-content__item" href="' + $route + '?id=' + value.id + '">' +
                                    '<div class="w-100 h-100 main-container__item">' +
                                        '<div class="info-post-item d-flex">' +
                                            '<img src="' + (value.avatar !== null ? value.avatar : 'images/avatar_default.png') + '"' +
                                                'title="Avatar của ' + value.name + '" alt="">' +
                                            '<h5 class="">' +
                                                '<div class="d-flex align-items-center">' +
                                                    value.name +
                                                    '<div class="verify-user ml-1 ' + (value.verify === 1 ? "" : "d-none") + '">' +
                                                        '<i class="fa-solid fa-check"></i>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="d-flex justify-content-between flex-wrap">' +
                                                    '<div class="d-flex item-footer">' +
                                                        '<div class="mr-2">' +
                                                            '<i class="fa-solid fa-newspaper text-dark mr-1"></i>' +
                                                                value.posts.length +
                                                        '</div>' +
                                                        '<div class="mr-2">' +
                                                            '<i class="fa-solid fa-user-plus text-dark mr-1"></i>' +
                                                                value.followers.length +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</h5>' +
                                        '</div>' +
                                    '</div>' +
                                '</a>';
                            }
                        });
                        if (item.length > 10) {
                            const $textMore = $boxUserSearch.attr('data-text');
                            let $newElement = $('<div class="d-flex align-center justify-content-center mb-2">' +
                                '<a href="' + $actionNextPage + '?search=' + $val + '">' + $textMore + '</a></div>');

                            $mappedElements.push($newElement);
                        }
                        $boxUserSearch.html($mappedElements);
                    } else {
                        let $route = $boxHashtagSearch.attr('data-route');
                        let $mappedElements = $.map(item, function (value, key) {
                            if (key < 10) {
                                return '<a href="' + $route + '&slug=' + value.slug + '" class="text-dark link-underline-light">' + value.name + '</a>';
                            }
                        });
                        if (item.length > 10) {
                            const $textMore = $boxHashtagSearch.attr('data-text');
                            let $newElement = $('<div class="d-flex align-center justify-content-center mb-2">' +
                                '<a href="' + $actionNextPage + '?search=' + $val + '">' + $textMore + '</a></div>');

                            $mappedElements.push($newElement);
                        }
                        $boxHashtagSearch.html($mappedElements);
                    }
                });

                $boxSearch.show();

            }
        });
    }
});

$(document).on('click', function (event) {
    if (!$(event.target).closest($boxSearch).length) {
        $boxSearch.hide();
    }
});
