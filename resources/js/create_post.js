import $ from "jquery"
import "select2/dist/js/select2"
import 'summernote/dist/summernote-lite';
import Toastify from "toastify-js";

(function () {
    $('#content').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 300
    });
    $('select').select2();

    let tagList = [];
    let slugList = [];
    let addList = [];

    const $tagList = $("#tagList");
    const $newTag = $("#newTag");
    const $boxSearch = $('.hashtag-result');
    const $storageTag = $("input[name=hashtag]");
    const $btnAdd = $(".js-add-tag");
    const $hashtagAdd = $("input[name=newHashtag]");

    function encodeHTML(s)
    {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
    }

    $(document).ready(function () {
        let $type = $storageTag.attr('data-type');
        if ($type !== undefined) {
            let $dataUpdate = JSON.parse($storageTag.val());

            $dataUpdate.forEach(function (value) {
                tagList.push(value.slug);
                slugList.push(value.slug);
            });
        }
        tagList_render();
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest($boxSearch).length) {
            $boxSearch.hide();
        }
    });

    $boxSearch.on('click', function (event) {
        event.stopPropagation();
    });

    function tagList_render()
    {
        $tagList.empty();
        tagList.map(function (_tag) {
            let temp = '<li><label>' + encodeHTML(_tag) + '</label><span class="rmTag">&times;</span></li>';
            $tagList.append(temp);
        });
    }

    $newTag.on('keyup', function (e) {
        let $val = $(e.target).val();
        if ($val === '') {
            $boxSearch.hide();
        } else {
            $boxSearch.show();
            $boxSearch.find('li').each((index, value) => {
                let $valueSearch = $(value).text().toLowerCase();
                let $slugSearch = $(value).data('slug');

                if (tagList.includes($slugSearch)) {
                    $(value).hide();
                } else {
                    if ($valueSearch.includes($val)) {
                        $(value).show();
                    } else {
                        $(value).hide();
                    }
                }
            });
        }
    });

    $btnAdd.click((e) => {
        e.preventDefault();
        let newTag = $("#newTag").val().trim().toLowerCase();
        const $textToast = $(e.target).attr('data-toast');
        if (newTag !== '') {
            if (tagList.indexOf(newTag) === -1 && addList.indexOf(newTag) === -1) {
                tagList.push(newTag);
                addList.push(newTag);
                $newTag.val('');
                tagList_render();
            } else {
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
            }
        }
    });

    $boxSearch.find('li').click((e) => {
        let $slug = $(e.target).attr('data-slug');

        if ($slug.replace(/\s/g, '') !== '' && !tagList.includes($slug)) {
            slugList.push($slug);
            tagList.push($slug);
            $newTag.val('');
            tagList_render();
        }
    });

    $tagList.on("click", "li>span.rmTag", function () {
        let index = $(this).parent().index();
        let textTagAdd = $(this).parent().find('label').html();

        if ($.inArray(textTagAdd, addList) !== -1) {
            addList = $.grep(addList, function (value) {
                return value !== textTagAdd;
            });
        } else {
            slugList = $.grep(slugList, function (value) {
                return value !== textTagAdd;
            });
        }
        tagList.splice(index, 1);

        tagList_render();
    });

    $('#posts').one('submit', function (e) {
        e.preventDefault();
        $storageTag.val(null);
        if (slugList.length > 0) {
            $storageTag.val(slugList.join(','));
        }
        if (addList.length > 0) {
            $hashtagAdd.val(addList.join(','));
        }

        $(this).submit();
    });
})();
