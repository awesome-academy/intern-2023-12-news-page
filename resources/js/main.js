import $ from "jquery"

const $boxSearch = $('.result-search-box');

$('#searchMain').keyup((e) => {
    let $val = $(e.target).val();
    if ($val === '') {
        $boxSearch.hide();
    } else {
        $boxSearch.show();
    }
});

$(document).on('click', function (event) {
    if (!$(event.target).closest($boxSearch).length) {
        $boxSearch.hide();
    }
});

$boxSearch.on('click', function (event) {
    event.stopPropagation();
});
