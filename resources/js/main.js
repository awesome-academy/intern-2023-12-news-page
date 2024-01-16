import $ from "jquery"
import moment from 'moment';

const $boxSearch = $('.result-search-box');
let searchTimeout = 0;

function encodeHTML(s)
{
    return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
}

function addNavSearch($textAll, $textMore, $actionNextPage, $val, index, item)
{
    return $('<div class="d-flex align-center justify-content-center mb-2 js-nav-search">' +
            '<a class="mr-2" href="' + $actionNextPage + '?search=' + $val + '">' + $textAll + '</a>' +
            '<a class="ml-2 js-show-more" data-type="' + index + '" data-text="' + $val + '" href="' + item.next_page_url + '">' + $textMore + '</a>' +
        '</div>');
}

function performSearch($val, $route, $type, $tab = null)
{
    let $boxPostSearch = $('.js-post-search');
    let $boxUserSearch = $('.js-user-search');
    let $boxHashtagSearch = $('.js-hashtag-search');
    let $csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: $route,
        data: {
            search: $val,
            tab: $tab
        },
        type: 'GET',
        headers: {
            'X-CSRF-Token': $csrfToken
        },
        success: function (res) {
            const $actionNextPage = $('.js-search-nextPage').attr('action');

            $.each(res, function (index, item) {
                if (index === 'dataPost') {
                    if ($type === 'search') {
                        $boxPostSearch.empty();
                    }
                    let $routeItem = $boxPostSearch.attr('data-route');
                    let $textPostVerified = $boxPostSearch.attr('data-verify-post');
                    let $mappedElements = $.map(item.data, function (value) {
                        return '<a href="' + $routeItem + '?id=' + value.id + '" class="main-content__item">' +
                            '<div class="w-100 h-100 main-container__item">' +
                                '<div class="info-post-item d-flex">' +
                                    '<img src="' + (value.user !== null && value.user.avatar !== null ? value.user.avatar : 'images/avatar_default.png') + '"' +
                                        'title="Avatar của ' + value.user.name + '" alt="">' +
                                        '<h5>' +
                                            '<div class="d-flex align-items-center">' +
                                                encodeHTML(value.user.name) +
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
                                    encodeHTML(value.title) +
                                '</h5>' +
                                    '<span class="verifyText ml-0 ' + (value.verify === 1 ? "" : "d-none") + '">' + $textPostVerified + '</span>' +
                            '</div>' +
                        '</a>'
                    });
                    if (item.current_page < item.last_page) {
                        const $textAll = $boxPostSearch.attr('data-text-all');
                        const $textMore = $boxPostSearch.attr('data-text-more');

                        let $newElement = addNavSearch($textAll, $textMore, $actionNextPage, $val, index, item)

                        $mappedElements.push($newElement);
                    }
                    $boxPostSearch.append($mappedElements);
                } else if (index === 'dataUser') {
                    if ($type === 'search') {
                        $boxUserSearch.empty();
                    }
                    let $routeItem = $boxUserSearch.attr('data-route');
                    let $mappedElements = $.map(item.data, function (value) {
                        return '<a class="main-content__item" href="' + $routeItem + '?id=' + value.id + '">' +
                            '<div class="w-100 h-100 main-container__item">' +
                                '<div class="info-post-item d-flex">' +
                                    '<img src="' + (value.avatar !== null ? value.avatar : 'images/avatar_default.png') + '"' +
                                        'title="Avatar của ' + value.name + '" alt="">' +
                                    '<h5 class="">' +
                                        '<div class="d-flex align-items-center">' +
                                            encodeHTML(value.name) +
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
                    });
                    if (item.current_page < item.last_page) {
                        const $textAll = $boxUserSearch.attr('data-text-all');
                        const $textMore = $boxUserSearch.attr('data-text-more');

                        let $newElement = addNavSearch($textAll, $textMore, $actionNextPage, $val, index, item)

                        $mappedElements.push($newElement);
                    }
                    $boxUserSearch.append($mappedElements);
                } else {
                    if ($type === 'search') {
                        $boxHashtagSearch.empty();
                    }
                    let $routeItem = $boxHashtagSearch.attr('data-route');
                    let $mappedElements = $.map(item.data, function (value) {
                        return '<a href="' + $routeItem + '&slug=' + value.slug + '" class="text-dark link-underline-light">' + encodeHTML(value.name) + '</a>';
                    });
                    if (item.current_page < item.last_page) {
                        const $textAll = $boxHashtagSearch.attr('data-text-all');
                        const $textMore = $boxHashtagSearch.attr('data-text-more');

                        let $newElement = addNavSearch($textAll, $textMore, $actionNextPage, $val, index, item)

                        $mappedElements.push($newElement);
                    }
                    $boxHashtagSearch.append($mappedElements);
                }
            });

            $boxSearch.show();

        }
    });
}

$('#searchMain').keyup((e) => {
    let $val = $(e.target).val();

    if ($val === '') {
        $boxSearch.hide();
    } else {
        let $route = $(e.target).attr('data-route');
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            performSearch($val, $route, 'search');
        }, 1000);
    }
});

$(document).on('click','.js-show-more',function (e) {
    e.preventDefault();
    let $route = $(e.target).closest('.js-show-more').attr('href');
    let $val = $(e.target).closest('.js-show-more').attr('data-text');
    let $tab = $(e.target).closest('.js-show-more').attr('data-type');

    $(e.target).closest('.js-nav-search').remove()

    performSearch($val, $route, 'continue', $tab);
})

$(document).on('click', function (event) {
    if ($(event.target).closest($boxSearch).length === 0 && $(event.target).closest('#searchMain').length === 0) {
        $boxSearch.hide();
    }
});
