import $ from "jquery";
import Pusher from "pusher-js";
import Toastify from "toastify-js";

$(document).ready(function () {
    let $count = parseInt($('.js-count-notification').text());
    const $btnInfo = $('#followInfo')
    const PUSHER_APP_KEY = $btnInfo.attr('data-pusher');
    const routerNotification = $btnInfo.attr('data-route-notification');
    const userId = $btnInfo.attr('data-user');
    const textUserNotifyFirst = $btnInfo.attr('data-text-notification');
    const textUserContentNotifyFirst = $btnInfo.attr('data-content-notification');
    let $csrfToken = $('meta[name="csrf-token"]').attr('content');

    const pusher = new Pusher('' + PUSHER_APP_KEY + '', {
        encrypted: true,
        cluster: "ap1"
    });
    const channel = pusher.subscribe('NotificationEvent');
    channel.bind('send-notification', function (data) {
        if (data.following_id === userId) {
            const newNotificationHtml = '<li class="position-relative notification-drop-item js-read-notification">' +
                textUserNotifyFirst + " " + data.name + " " + textUserContentNotifyFirst +
                '<i class="fa-solid fa-circle js-toast-icon"></i>' +
            '</li>'

            $('.notification-drop-content').prepend(newNotificationHtml);
            $count += 1;
            $('.js-count-notification').text($count);
            Toastify({
                text: textUserNotifyFirst + " " + data.name + " " + textUserContentNotifyFirst,
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

    $(".notification-drop .item-notification-drop").click((e) => {
        let $this = $(e.target).closest('.item');
        $this.find('.notification-drop-content').toggle();
    });

    $(document).on('click','.js-read-notification',function (e) {
        let $this = $(e.target).closest('.js-read-notification');
        let $id = $this.attr('data-id');

        if ($this.find('.js-toast-icon').length > 0) {
            if ($id !== undefined) {
                $.ajax({
                    url: routerNotification,
                    type: 'GET',
                    data: {
                        'id': $id
                    },
                    headers: {
                        'X-CSRF-Token': $csrfToken
                    },
                });
            }
            $this.find('.js-toast-icon').remove();
            $count -= 1;
            $('.js-count-notification').text($count);
        }
    });

    $(document).on('click','.js-more-notification',function (e) {
        e.preventDefault();
        let $this = $(e.target).closest('.js-more-notification');
        let $tab = $this.attr('data-tab');
        let $route = $this.attr('href');
        let $text = $this.html().trim();

        $this.remove();

        $.ajax({
            url: $route,
            type: 'GET',
            data: {
                'tab': $tab
            },
            headers: {
                'X-CSRF-Token': $csrfToken
            },
            success: function (data) {
                let $newNotificationHtml = $.map(data.data, function (value) {
                    return '<li class="position-relative notification-drop-item js-read-notification">' +
                        textUserNotifyFirst + " " + value.data + " " + textUserContentNotifyFirst +
                        '<i class="fa-solid fa-circle js-toast-icon ' + (value.read_at ? 'd-none' : '') + '"></i>' +
                    '</li>';
                }).join('');

                if (data.current_page < data.last_page) {
                    $newNotificationHtml += '<div class="w-100 text-center">' +
                        '<a class="show-more-notification js-more-notification" ' +
                            'data-tab="' + (data.current_page + 1) + '" href="' + $route + '">' +
                            $text +
                        '</a>' +
                    '</div>';
                }

                $('.notification-drop-content').append($newNotificationHtml);
            }
        });
    })
});
