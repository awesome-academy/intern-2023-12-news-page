import $ from "jquery"
import "./profile"

(function () {
    let tagList = [];
    let idList = [];

    const $tagList = $("#tagList");
    const $newTag = $("#newTag");
    const $boxSearch = $('.hashtag-result');
    const $storageTag = $("input[name=hashtag]");

    $(document).on('click', function (event) {
        if (!$(event.target).closest($boxSearch).length) {
            $boxSearch.hide();
        }
    });

    $boxSearch.on('click', function (event) {
        event.stopPropagation();
    });

    tagList_render();

    function tagList_render()
    {
        $tagList.empty();
        tagList.map(function (_tag) {
            var temp = '<li>' + _tag + '<span class="rmTag">&times;</span></li>';
            $tagList.append(temp);
        });
    }

    $newTag.on('keyup', function (e) {
        let $val = $(e.target).val();
        if ($val === '') {
            $boxSearch.hide();
        } else {
            $boxSearch.show();
        }
    });

    $('.hashtag-result li').click((e) => {
        let $slug = $(e.target).attr('data-slug');
        let $id = $(e.target).attr('data-id');

        if ($slug.replace(/\s/g, '') !== '') {
            idList.push($id);
            tagList.push($slug);
            $newTag.val('');
            tagList_render();
        }
    });

    $tagList.on("click", "li>span.rmTag", function () {
        var index = $(this).parent().index();
        idList.splice(index, 1);
        tagList.splice(index, 1);
        tagList_render();
    });

    $('#posts').one('submit', function (e) {
        e.preventDefault();
        $storageTag.val(null);
        $storageTag.val(idList.join(','));
        $(this).submit();
    });
})();
