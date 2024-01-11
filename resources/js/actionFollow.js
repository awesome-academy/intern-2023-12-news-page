import $ from "jquery"
import Toastify from "toastify-js";

$('.js-follow').click((e) => {
    e.preventDefault();
    let $this = $(e.target).closest('.js-follow');
    let $userId = $this.attr('data-user');
    let $route = $this.attr('href');
    let $csrfToken = $('meta[name="csrf-token"]').attr('content');
    let $userFollow = $this.attr('data-user-follow');
    let $text = $this.find('h6').html()
    let $textToast = $text + ' ' + $this.attr('data-toast-success')

    $.ajax({
        url: $route,
        data: {
            userId: $userId,
            followId: $userFollow
        },
        type: 'POST',
        headers: {
            'X-CSRF-Token': $csrfToken
        },
        success: function () {
            let $textReverse = $this.attr('data-reverse');
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

            $this.find('h6').html($textReverse)
            $this.attr('data-reverse', $text)

        }
    })
})
