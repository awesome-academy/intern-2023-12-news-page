import $ from "jquery"
import 'emojionearea/dist/emojionearea';
import Toastify from 'toastify-js'

$('.textarea-emoji').emojioneArea({
    pickerPosition: 'top',
})

$('#comment').on('submit', function (e) {
    e.preventDefault();

    let $postId = $(e.target).find('button[type=submit]').data('post');
    let $userId = $(e.target).find('button[type=submit]').data('user');
    let $routeUser = $(e.target).find('button[type=submit]').data('route-info');
    let $content = $(e.target).find('.emojionearea-editor').html();
    let $route = $(e.target).attr('action');
    let $csrfToken = $('meta[name="csrf-token"]').attr('content');
    let $data = new FormData();

    if ($content === '') {
        const $textToast = $(e.target).find('button[type=submit]').data('validate-false');

        Toastify({
            text: $textToast,
            duration: 3000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, rgb(255, 0, 0), rgb(255, 153, 153))"
            }
        }).showToast();
    } else {
        $(e.target).find('.emojionearea-editor').html('');
        let $textToast = $(e.target).find('button[type=submit]').data('validate-true');
        let $nameIncognito = $(e.target).find('input[name=name]').val();

        $data.append('postId', $postId);
        $data.append('userId', $userId);
        $data.append('content', $content);

        $.ajax({
            url: $route,
            data: $data,
            processData: false,
            contentType: false,
            type: 'POST',
            headers: {
                'X-CSRF-Token': $csrfToken
            },
            success: function (res) {
                let $blockReview = $('.comments-detail');
                let $html = '<div class="item-comment-detail js-parent">' +
                    '<div class="d-flex flex-wrap">' +
                        '<div class="icon-detail">' +
                            '<img src="' + (res.user !== null && res.user.avatar !== null ? res.user.avatar : 'images/avatar_default.png') + '"' +
                                'title="Avatar của ' + (res.user !== null ? res.user.name : $nameIncognito) + '" alt="">' +
                        '</div>' +
                        '<div class="info-detail d-flex flex-column">' +
                            '<h6>' +
                                '<a class="name-comment" href="' + (res.user !== null ? $routeUser + "?id=" + res.user.id : "") + '">' + (res.user !== null ? res.user.name : $nameIncognito) + '</a>' +
                                    '<span class="js-title-report content-comment font-weight-bold">' + res.content + '</span>' +
                            '</h6>' +
                            '<div class="js-container-action">' +
                                '<div class="mb-2 d-flex justify-content-between">' +
                                    '<div class="d-flex item-footer">' +
                                        '<a href="#" class="js-report btn-report-comment" data-toggle="modal" data-target="#reportModal" data-id="' + res.id + '" data-type="review">' +
                                            '<i class="fa-solid fa-flag text-dark"></i>' +
                                        '</a>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>';
                $blockReview.append($html);
                Toastify({
                    text: $textToast,
                    duration: 3000,
                    close: true,
                    gravity: "bottom",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, rgb(0, 100, 0), rgb(0, 255, 0))"
                    }
                }).showToast();
            }
        });
    }
})
