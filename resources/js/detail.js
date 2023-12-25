import 'emojionearea/dist/emojionearea';
import $ from "jquery"

$('.textarea-emoji').emojioneArea({
    pickerPosition: 'top',
})

$('.js-reply-comment').click((e) => {
    e.preventDefault();
    // let $src = $(e.target).closest('.js-reply-comment').attr('data-src');
    const $formComment = $('#comment').html();
    let $boxAppend = $(e.target).closest('.js-container-action').find('.append-textarea');

    $('.append-textarea').html('');
    $boxAppend.html($formComment);
})
