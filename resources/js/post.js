import $ from "jquery"

$('.js-delete').on('submit', function (e) {
    e.preventDefault();
    let $question = $('.js-delete button').attr('data-ask');
    if (confirm($question)) {
        $(this).off('submit');
        $(this).submit();
    }
});
