import 'bootstrap/dist/js/bootstrap.bundle'
import $ from "jquery"

$('.js-report').click((e) => {
    e.preventDefault();
    let $title = $(e.target).closest('.js-parent').find('.js-title-report').html();
    let $boxImportTitle = $('.js-import-title');

    $boxImportTitle.html('');
    $boxImportTitle.html($title);
})
