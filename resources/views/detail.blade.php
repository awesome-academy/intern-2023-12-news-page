@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/modalReport.js') }}" defer></script>
    <script src="{{ asset('js/detail.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="main-content__box js-parent">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="icon-detail">
                            <img
                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                        </div>
                        <div class="info-detail">
                            <h5>
                                <a href="{{ route('info') }}">{{Auth::user()->name ?? 'Nguyễn Phú Trường'}}</a>
                            </h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 10px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-right: 10px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                            enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                    <div style="">
                                        <svg class="svg-icon"
                                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M862.3616 605.44c-44.1344 0.4608-74.752 21.7088-94.2592 45.7216-19.1488-24.32-49.8176-45.7216-95.0784-45.7216-29.9008 0-54.7328 9.6768-73.7792 28.8256-34.8672 35.0208-35.584 87.7568-35.2256 89.3952-0.8704 5.3248-18.8928 131.9936 192.768 237.4656 3.584 1.792 7.5264 2.7136 11.4176 2.7136 4.1472 0 8.2432-1.024 11.9808-3.0208 128-67.9424 194.56-150.2208 192.512-239.8208C972.7488 674.56 943.7184 605.44 862.3616 605.44zM767.8464 909.312c-162.816-85.4528-153.7024-174.08-152.9344-181.6064-0.0512-9.4208 3.6352-40.192 20.6848-57.2928 9.216-9.2672 21.4528-13.7728 37.4784-13.7728 54.2208 0 68.1472 49.5104 69.4784 54.9888 2.6624 11.3664 12.6976 19.4048 24.3712 19.6608 11.2128-1.2288 22.0672-7.4752 25.2416-18.688 0.6656-2.2528 16.3328-55.3984 71.6288-55.9616 57.1392 0 57.7536 61.7472 57.8048 67.3792C923.0336 787.7632 868.5568 853.248 767.8464 909.312zM768.0512 321.4848c0-155.2384-126.3104-281.6-281.6-281.6s-281.6 126.3104-281.6 281.6c0 109.6192 63.0784 204.5952 154.7264 251.0848-168.8576 54.1184-308.3264 207.4624-308.3264 363.3152 0 14.1312 11.4688 25.6 25.6 25.6s25.6-11.4688 25.6-25.6c0-164.864 193.792-332.8 384-332.8C641.6896 603.0848 768.0512 476.7744 768.0512 321.4848zM486.4512 551.8848c-127.0272 0-230.4-103.3728-230.4-230.4 0-127.0272 103.3728-230.4 230.4-230.4s230.4 103.3728 230.4 230.4C716.8512 448.512 613.4784 551.8848 486.4512 551.8848z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action-detail col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-danger js-report" data-toggle="modal" data-target="#reportModal">
                        <h6 class="m-0">{{ __("Report") }}</h6>
                    </a>
                    <a class="btn btn-success">
                        <h6 class="m-0">{{ __("Follow") }}</h6>
                    </a>
                </div>
            </div>
            <div class="category-detail">
                {{ __('Category') }}:<a href="{{ route('search') }}"> Chứng khoán</a>
            </div>
            <h3 class="title-detail">
                <span class="js-title-report">
                    Thủ tướng Phạm Minh Chính đón Thủ tướng Campuchiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </span>
            </h3>
            <div>
                <!--?xml encoding="UTF-8"--><!--?xml encoding="UTF-8"-->
                <h2 class="detail-sapo" data-role="sapo"
                    style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    <img
                        src="https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/9/bhyt-1696859532104736403076.jpg"
                        style="width: 730px;"><br></h2>
                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    <img
                        src="https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/31/nguyen-thi-ngoc-xuan-binh-duong-16987458331681153603858-88-525-854-1751-crop-16987459732781018510786.jpg"
                        alt="‘Thiếu thuốc vật tư y tế không phải lỗi của người dân, cần có cơ chế trả lại tiền’"><br>
                </p>
                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    ====================================================</p>
                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    <img
                        src="https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/31/nguyen-thi-ngoc-xuan-binh-duong-16987458331681153603858-88-525-854-1751-crop-16987459732781018510786.jpg"
                        alt="‘Thiếu thuốc vật tư y tế không phải lỗi của người dân, cần có cơ chế trả lại tiền’"><br>
                </p>
                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    <img
                        src="https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/31/nguyen-thi-ngoc-xuan-binh-duong-16987458331681153603858-88-525-854-1751-crop-16987459732781018510786.jpg"
                        style="width: 730px;"><br></p>
                <h2 class="detail-sapo" data-role="sapo"
                    style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0px 0px 24px; font-weight: 700; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); font-family: Roboto;">
                    Bộ Y tế vừa công bố dự thảo, lấy ý kiến về thông tư quy định thanh toán chi phí thuốc, vật tư y tế
                    trực tiếp cho người bệnh tham gia bảo hiểm y tế.</h2>
                <div data-check-position="body_start"
                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; font-family: Roboto;"></div>
                <div class="detail-cmain"
                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; padding-bottom: 24px; border-bottom: 1px solid rgb(242, 242, 242); margin-bottom: 24px; font-family: Roboto;">
                    <div class="detail-content afcbc-body" data-role="content" itemprop="articleBody"
                         style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; font-size: 17px; line-height: 30px; color: rgb(34, 34, 34); max-width: 100%;">
                        <figure class="VCSortableInPreviewMode" type="Photo"
                                style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; display: inline-block; flex-direction: column; margin-right: auto; margin-bottom: 15px; margin-left: auto; position: relative; transition: all 0.3s ease-in-out 0s; width: 730px; visibility: visible; overflow-wrap: break-word; cursor: default; max-width: 100%;">
                            <div id="adbro" class="adbro-animated adbro-md"
                                 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; position: relative; overflow: hidden; width: 730px; height: 487px; top: 0px; margin-bottom: -487px; z-index: 1;"></div>
                            <div
                                style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                <a href="https://cdn.tuoitre.vn/471584752817336320/2023/10/9/bhyt-1696859532104736403076.jpg"
                                   data-fancybox="content"
                                   data-caption="Thay vì mang theo thẻ bảo hiểm y tế cứng, người dân có thể làm thủ tục qua ứng dụng VssID - Ảnh: NAM TRẦN"
                                   rel="nofollow" target="_blank"
                                   style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px !important;"><img
                                        data-author=""
                                        src="https://cdn.tuoitre.vn/thumb_w/730/471584752817336320/2023/10/9/bhyt-1696859532104736403076.jpg"
                                        id="img_635837749958516736" w="2000" h="1333"
                                        alt="Thay vì mang theo thẻ bảo hiểm y tế cứng, người dân có thể làm thủ tục qua ứng dụng VssID - Ảnh: NAM TRẦN"
                                        title="Thay vì mang theo thẻ bảo hiểm y tế cứng, người dân có thể làm thủ tục qua ứng dụng VssID - Ảnh: NAM TRẦN"
                                        rel="lightbox" photoid="635837749958516736"
                                        data-original="https://cdn.tuoitre.vn/471584752817336320/2023/10/9/bhyt-1696859532104736403076.jpg"
                                        type="photo" width="2000" height="1333" fetchpriority="high"
                                        data-adbro-processed="true" class="lightbox-content"
                                        style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; width: 730px; max-width: 100%; display: inline-block; image-rendering: -webkit-optimize-contrast; color: transparent; height: auto; margin: 0px auto; vertical-align: top;"></a>
                                <div id="wrapper-inimage-pos-sponsor-0"
                                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                    <div id="in-images"
                                         style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                        <div id="zone-joqxux31"
                                             style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                            <div id="share-joqxuxkg"
                                                 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                                <div id="placement-josbvfxe" revenue="cpm"
                                                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                                    <div id="banner-joqxux31-josbvgf9"
                                                         style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; min-height: 0px; min-width: 0px;">
                                                        <div id="slot-1-joqxux31-josbvgf9"
                                                             style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="PhotoCMS_Caption"
                                        style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; max-width: 100%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-bottom: 1px solid rgb(242, 242, 242); padding: 8px 0px;">
                                <p data-placeholder="Nhập chú thích ảnh"
                                   style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; line-height: 22px; color: rgb(143, 143, 143); margin-bottom: 0px !important; font-size: 16px !important;">
                                    Thay vì mang theo thẻ bảo hiểm y tế cứng, người dân có thể làm thủ tục qua ứng dụng
                                    VssID - Ảnh: NAM TRẦN</p></figcaption>
                        </figure>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            Bộ Y tế đề xuất quỹ bảo hiểm y tế (<a class="link-inline-content"
                                                                  href="https://tuoitre.vn/bhyt.html" title="BHYT"
                                                                  data-rel="follow"
                                                                  style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px;">BHYT</a>)
                            thanh toán chi phí thuốc, vật tư y tế trực tiếp cho người bệnh có thẻ bảo hiểm y tế hoặc
                            thanh toán chi phí thuốc, vật tư y tế cho cơ sở khám bệnh, chữa bệnh khi đủ các điều kiện:
                        </p>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            - Thuốc, vật tư y tế mà người bệnh được kê đơn thuộc phạm vi quyền lợi của người tham gia
                            bảo hiểm y tế.</p>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            - Người bệnh được chẩn đoán, kê đơn và chỉ định thuốc, vật tư y tế nhưng tại thời điểm sử
                            dụng hoạt chất thuốc, vật tư y tế không sẵn có tại cơ sở khám bệnh, chữa bệnh; không sẵn có
                            thuốc thành phẩm nào chứa hoạt chất mà người bệnh được chỉ định; không sẵn có vật tư y tế
                            phù hợp mà người bệnh được chỉ định sử dụng.</p>
                        <div class="VCSortableInPreviewMode  alignRight" type="RelatedNewsBox" data-style="align-right"
                             relatednewsboxtype="type-2"
                             style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; display: inline-block; flex-direction: column; margin: 0px auto 15px 15px; position: relative; transition: all 0.3s ease-in-out 0s; width: 328.5px; visibility: visible; overflow-wrap: break-word; cursor: default; max-width: 100%; float: right;">
                            <div class="kbwscwl-relatedbox type-2 tuoitre"
                                 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; float: right; margin-bottom: 0px; border-top: 3px solid rgb(237, 28, 36); border-bottom: 3px solid rgb(237, 28, 36); width: 328.5px;">
                                <ul class="kbwscwlr-list"
                                    style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; list-style: none; padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;">
                                    <li class="kbwscwlrl" data-date="06/11/2023 18:25" data-id="20231106172541112"
                                        data-avatar="https://cdn.tuoitre.vn/471584752817336320/2023/11/6/dscf9657-1688302924234239861849-70-0-1320-2000-crop-1699266200534799675988.jpg"
                                        data-url="/thieu-thuoc-vat-tu-y-te-cac-benh-vien-dang-rao-riet-lap-cac-hoi-dong-dau-thau-20231106172541112.htm"
                                        data-title="Thiếu thuốc, vật tư y tế: Các bệnh viện đang ráo riết lập các hội đồng đấu thầu"
                                        style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; list-style-position: initial; list-style-image: initial; color: rgb(237, 28, 36); margin-left: 15px; padding: 20px 0px; border-bottom: 1px solid rgb(226, 226, 226); list-style-type: disc !important;">
                                        <h4 class="kbwscwlrl-title"
                                            style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; line-height: 1.3; font-weight: 700; font-size: 21px; margin: 0px !important; padding: 0px !important;">
                                            <a target="_blank"
                                               href="https://tuoitre.vn/thieu-thuoc-vat-tu-y-te-cac-benh-vien-dang-rao-riet-lap-cac-hoi-dong-dau-thau-20231106172541112.htm"
                                               class="title link-callout"
                                               style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(51, 51, 51); outline: 0px; font-size: 16px; margin-bottom: 5px; display: block; line-height: 19px;">Thiếu
                                                thuốc, vật tư y tế: Các bệnh viện đang ráo riết lập các hội đồng đấu
                                                thầu</a></h4></li>
                                </ul>
                            </div>
                        </div>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            Việc thanh toán chi phí thuốc, vật tư y tế trực tiếp cho người tham gia bảo hiểm y tế, Bộ Y
                            tế hướng dẫn:</p>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            Trong trường hợp người bệnh (thân nhân, người đại diện hợp pháp) mua thuốc,&nbsp;<a
                                class="link-inline-content"
                                href="https://tuoitre.vn/da-co-nhieu-van-ban-go-nhung-dau-thau-thuoc-vat-tu-y-te-van-rat-cham-2023060708123873.htm"
                                title="vật tư y tế " data-rel="follow"
                                style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px;">vật
                                tư y tế&nbsp;</a>tại nhà thuốc bệnh viện của cơ sở khám bệnh chữa bệnh nơi người bệnh
                            điều trị hoặc mua thuốc tại đơn vị cung ứng thuốc, vật tư y tế đã trúng thầu tại cơ sở y tế
                            sẽ được hoàn trả chi phí.</p>
                        <div id="InreadPc"
                             style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                            <div id="zone-jnvk0c1v"
                                 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                <div id="share-jnvk0cro"
                                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;"></div>
                            </div>
                        </div>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            Để được chi trả bảo hiểm y tế, người bệnh phải xuất trình với cơ quan&nbsp;<a
                                class="VCCTagItemInNews" data-zoneid="0" data-id="0"
                                href="https://tuoitre.vn/bao-hiem-xa-hoi.html" target="_blank" title="bảo hiểm xã hội"
                                style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px;">bảo
                                hiểm xã hội</a>&nbsp;đơn thuốc, vật tư y tế. Đơn thuốc này phải được chỉ định bởi cán bộ
                            y tế tại cơ sở khám bệnh, chữa bệnh và hóa đơn mua thuốc, vật tư y tế hợp pháp, hợp lệ để
                            làm căn cứ thanh toán.</p>
                        <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 1em;">
                            Cơ quan bảo hiểm xã hội có trách nhiệm thanh toán trực tiếp chi phí thuốc, vật tư y tế cho
                            người bệnh. Chi phí bằng với chi phí được ghi trên hóa đơn của người bệnh mà nhà thuốc bệnh
                            viện hoặc đơn vị cung ứng cung cấp và theo mức hưởng trong phạm vi quyền lợi của người tham
                            gia&nbsp;<a class="link-inline-content" href="https://tuoitre.vn/bao-hiem-y-te.html"
                                        title="bảo hiểm y tế" data-rel="follow"
                                        style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px;">bảo
                                hiểm y tế</a>.</p>
                        <div class="VCSortableInPreviewMode alignCenter" data-back="#FFFBF2" data-border="#F2D1AA"
                             data-text-color="#333333" id="ObjectBoxContent_1702262405763" type="content"
                             style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px; flex-direction: column; margin: 0px auto 15px; position: relative; transition: all 0.3s ease-in-out 0s; width: 730px; visibility: visible; overflow-wrap: break-word; cursor: default; max-width: 100%; border: 1px solid rgb(242, 209, 170); padding: 10px; background-color: rgb(255, 251, 242); color: rgb(51, 51, 51);">
                            <div placeholder="Nhập nội dung..."
                                 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; outline: 0px;">
                                <h2 style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin: 0.5em 0px; line-height: 1.3; font-weight: 700; font-size: 25px;">
                                    <span
                                        style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision;">Bệnh viện phải chịu trách nhiệm nếu thiếu thuốc, vật tư y tế</span>
                                </h2>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Dự thảo thông tư cũng quy định rõ trách nhiệm của cơ sở khám chữa bệnh.</p>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Thứ nhất, cơ sở có trách nhiệm thực hiện&nbsp;<a class="link-inline-content"
                                                                                     href="https://tuoitre.vn/de-nghi-doanh-nghiep-tron-dong-bao-hiem-xa-hoi-khong-duoc-dau-thau-thi-cong-mua-sam-tu-ngan-sach-20230413190255051.htm"
                                                                                     title="đấu thầu mua sắm"
                                                                                     data-rel="follow"
                                                                                     style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; color: rgb(34, 106, 197); outline: 0px;">đấu
                                        thầu mua sắm</a>&nbsp;theo đúng quy định pháp luật, bảo đảm cung ứng thuốc đầy
                                    đủ, kịp thời cho người bệnh.</p>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Thứ hai, trường hợp cơ sở khám không có đủ thuốc cung ứng thì cần chuyển người bệnh
                                    đến cơ sở khám bệnh chữa bệnh có đủ điều kiện cung cấp thuốc, vật tư cho người
                                    bệnh.</p>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Thứ ba, trường hợp cơ sở khám bệnh, chữa bệnh không có sẵn thuốc, vật tư y tế để
                                    điều trị cho người bệnh, vì một trong những lý do khách quan như: đã thực hiện đấu
                                    thầu nhưng không có đơn vị trúng thầu; đã có kết quả thầu nhưng tại thời điểm chỉ
                                    định thuốc, vật tư y tế cho người bệnh nhà cung cấp không cung ứng được; chậm có kết
                                    quả đấu thầu tập trung cấp quốc gia, cấp địa phương và đàm phán giá, tuy nhiên cơ sở
                                    khám bệnh chữa bệnh chưa kịp thời tổ chức mua sắm đấu thầu được.</p>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Đối với trường hợp này cơ sở khám chữa bệnh chịu trách nhiệm giải trình.</p>
                                <p style="-webkit-font-smoothing: antialiased; text-rendering: geometricprecision; margin-top: 1em; margin-bottom: 7px;">
                                    Thứ tư, nếu không chuyển người bệnh đến cơ sở điều trị khác, cơ sở có trách nhiệm
                                    hướng dẫn người bệnh nhằm bảo đảm chất lượng mua thuốc, vật tư y tế và thông báo với
                                    cơ quan bảo hiểm về trường hợp người bệnh tự mua.</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tags-detail d-flex flex-wrap">
                <h3 class="txt">{{ __('Tags') }}:</h3>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
                <h4 class="item-tag">
                    <a href="" title="chứng khoán">chứng khoán</a>
                </h4>
            </div>
            <div class="comments-detail">
                <h4>{{ __('Comments') }}</h4>
                <form method="POST" action="" id="comment">
                    @csrf
                    <textarea name="review" class="textarea-emoji"></textarea>
                    <div class="w-100 text-end">
                        <button type="submit" class="btn btn-success mt-2" data-src="">{{ __('Save') }}</button>
                    </div>
                </form>
                <div class="item-comment-detail js-parent">
                    <div class="d-flex flex-wrap">
                        <div class="icon-detail">
                            <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                title="Avatar của Nguyễn Phú Trường" alt="">
                        </div>
                        <div class="info-detail d-flex flex-column">
                            <h5>
                                <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                <span class="js-title-report">
                                    Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                    nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                    ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                </span>
                            </h5>
                            <div class="js-container-action">
                                <div class="mb-2 d-flex justify-content-between">
                                    <div class="d-flex item-footer">
                                        <a href="#" class="js-reply-comment" data-src="" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                fill="#000000" version="1.1" id="Layer_1" viewBox="0 0 490.001 490.001"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                            <path
                                                                d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                            <rect x="255.001" y="115" width="80" height="20"/>
                                                            <rect x="350" y="115" width="60" height="20"/>
                                                            <rect x="255.001" y="165" width="180" height="20"/>
                                                            <rect x="255.001" y="215" width="75" height="20"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="#" class="js-report" data-toggle="modal" data-target="#reportModal">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                    fill="#9F9F9F"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="append-textarea"></div>
                            </div>
                            <div class="item-comment-detail js-parent">
                                <div class="d-flex flex-wrap">
                                    <div class="icon-detail">
                                        <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                             title="Avatar của Nguyễn Phú Trường" alt="">
                                    </div>
                                    <div class="info-detail d-flex flex-column">
                                        <h5>
                                            <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                            <span>
                                                Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                                nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                                ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                            </span>
                                        </h5>
                                        <div class="js-container-action">
                                            <div class="mb-2 d-flex justify-content-between">
                                                <div class="d-flex item-footer">
                                                    <a href="#" class="js-reply-comment" data-src=""
                                                       style="margin-right: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            fill="#000000" version="1.1" id="Layer_1"
                                                            viewBox="0 0 490.001 490.001"
                                                            xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                                    <path
                                                                        d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                                    <rect x="255.001" y="115" width="80" height="20"/>
                                                                    <rect x="350" y="115" width="60" height="20"/>
                                                                    <rect x="255.001" y="165" width="180" height="20"/>
                                                                    <rect x="255.001" y="215" width="75" height="20"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    </a>
                                                    <a href="#" class="js-report" data-toggle="modal"
                                                       data-target="#reportModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                                fill="#9F9F9F"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="append-textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-comment-detail js-parent">
                                <div class="d-flex flex-wrap">
                                    <div class="icon-detail">
                                        <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                             title="Avatar của Nguyễn Phú Trường" alt="">
                                    </div>
                                    <div class="info-detail d-flex flex-column">
                                        <h5>
                                            <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                            <span>
                                                Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                                nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                                ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                            </span>
                                        </h5>
                                        <div class="js-container-action">
                                            <div class="mb-2 d-flex justify-content-between">
                                                <div class="d-flex item-footer">
                                                    <a href="#" class="js-reply-comment" data-src=""
                                                       style="margin-right: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            fill="#000000" version="1.1" id="Layer_1"
                                                            viewBox="0 0 490.001 490.001"
                                                            xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                                    <path
                                                                        d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                                    <rect x="255.001" y="115" width="80" height="20"/>
                                                                    <rect x="350" y="115" width="60" height="20"/>
                                                                    <rect x="255.001" y="165" width="180" height="20"/>
                                                                    <rect x="255.001" y="215" width="75" height="20"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    </a>
                                                    <a href="#" class="js-report" data-toggle="modal"
                                                       data-target="#reportModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                                fill="#9F9F9F"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="append-textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-comment-detail js-parent">
                                <div class="d-flex flex-wrap">
                                    <div class="icon-detail">
                                        <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                            title="Avatar của Nguyễn Phú Trường" alt="">
                                    </div>
                                    <div class="info-detail d-flex flex-column">
                                        <h5>
                                            <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                            <span>
                                                Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                                nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                                ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                            </span>
                                        </h5>
                                        <div class="js-container-action">
                                            <div class="mb-2 d-flex justify-content-between">
                                                <div class="d-flex item-footer">
                                                    <a href="#" class="js-reply-comment" data-src=""
                                                       style="margin-right: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            fill="#000000" version="1.1" id="Layer_1"
                                                            viewBox="0 0 490.001 490.001"
                                                            xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                                    <path
                                                                        d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                                    <rect x="255.001" y="115" width="80" height="20"/>
                                                                    <rect x="350" y="115" width="60" height="20"/>
                                                                    <rect x="255.001" y="165" width="180" height="20"/>
                                                                    <rect x="255.001" y="215" width="75" height="20"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    </a>
                                                    <a href="#" class="js-report" data-toggle="modal"
                                                       data-target="#reportModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                                fill="#9F9F9F"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="append-textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-comment-detail js-parent">
                                <div class="d-flex flex-wrap">
                                    <div class="icon-detail">
                                        <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                             title="Avatar của Nguyễn Phú Trường" alt="">
                                    </div>
                                    <div class="info-detail d-flex flex-column">
                                        <h5>
                                            <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                            <span>
                                                Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                                nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                                ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                            </span>
                                        </h5>
                                        <div class="js-container-action">
                                            <div class="mb-2 d-flex justify-content-between">
                                                <div class="d-flex item-footer">
                                                    <a href="#" class="js-reply-comment" data-src=""
                                                       style="margin-right: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             fill="#000000" version="1.1" id="Layer_1"
                                                             viewBox="0 0 490.001 490.001"
                                                             xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                                    <path
                                                                        d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                                    <rect x="255.001" y="115" width="80" height="20"/>
                                                                    <rect x="350" y="115" width="60" height="20"/>
                                                                    <rect x="255.001" y="165" width="180" height="20"/>
                                                                    <rect x="255.001" y="215" width="75" height="20"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    </a>
                                                    <a href="#" class="js-report" data-toggle="modal"
                                                       data-target="#reportModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                                fill="#9F9F9F"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="append-textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-comment-detail js-parent">
                    <div class="d-flex flex-wrap">
                        <div class="icon-detail">
                            <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                title="Avatar của Nguyễn Phú Trường" alt="">
                        </div>
                        <div class="info-detail d-flex flex-column">
                            <h5>
                                <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                <span class="js-title-report">
                                    Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                    nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                    ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                </span>
                            </h5>
                            <div class="js-container-action">
                                <div class="mb-2 d-flex justify-content-between">
                                    <div class="d-flex item-footer">
                                        <a href="#" class="js-reply-comment" data-src="" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                fill="#000000" version="1.1" id="Layer_1" viewBox="0 0 490.001 490.001"
                                                xml:space="preserve">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                        <path
                                                            d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                        <rect x="255.001" y="115" width="80" height="20"/>
                                                        <rect x="350" y="115" width="60" height="20"/>
                                                        <rect x="255.001" y="165" width="180" height="20"/>
                                                        <rect x="255.001" y="215" width="75" height="20"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        </a>
                                        <a href="#" class="js-report" data-toggle="modal" data-target="#reportModal">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                    fill="#9F9F9F"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="append-textarea"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-comment-detail js-parent">
                    <div class="d-flex flex-wrap">
                        <div class="icon-detail">
                            <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                title="Avatar của Nguyễn Phú Trường" alt="">
                        </div>
                        <div class="info-detail d-flex flex-column">
                            <h5>
                                <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                <span class="js-title-report">
                                    Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                    nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                    ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                </span>
                            </h5>
                            <div class="js-container-action">
                                <div class="mb-2 d-flex justify-content-between">
                                    <div class="d-flex item-footer">
                                        <a href="#" class="js-reply-comment" data-src="" style="margin-right: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                fill="#000000" version="1.1" id="Layer_1" viewBox="0 0 490.001 490.001"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                            <path
                                                                d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                            <rect x="255.001" y="115" width="80" height="20"/>
                                                            <rect x="350" y="115" width="60" height="20"/>
                                                            <rect x="255.001" y="165" width="180" height="20"/>
                                                            <rect x="255.001" y="215" width="75" height="20"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="#" class="js-report" data-toggle="modal" data-target="#reportModal">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                    fill="#9F9F9F"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="append-textarea"></div>
                            </div>
                            <div class="item-comment-detail js-parent">
                                <div class="d-flex flex-wrap">
                                    <div class="icon-detail">
                                        <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                            title="Avatar của Nguyễn Phú Trường" alt="">
                                    </div>
                                    <div class="info-detail d-flex flex-column">
                                        <h5>
                                            <a href="http://127.0.0.1:8000/info">Nguyễn Phú Trường</a>
                                            <span>
                                                Thanh khoản đã ít nay tự doanh ít tiền, tiền gửi trong tk chứng khoán ko phát sinh lãi
                                                nđt chưa có ý định mua sẽ rút ra tiết kiệm, khi muốn mua cp lại phải thao tác rút tiền
                                                ngân hàng, hoặc có thể rút tiền trước hạn ko có lãi, gây bất tiện.
                                            </span>
                                        </h5>
                                        <div class="js-container-action">
                                            <div class="mb-2 d-flex justify-content-between">
                                                <div class="d-flex item-footer">
                                                    <a href="#" class="js-reply-comment" data-src=""
                                                       style="margin-right: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            fill="#000000" version="1.1" id="Layer_1"
                                                            viewBox="0 0 490.001 490.001"
                                                            xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M450,0h-410c-22.056,0-40,17.944-40,40v280c0,22.056,17.944,40,40,40h235v120c0,4.118,2.524,7.814,6.358,9.314     c1.184,0.463,2.417,0.687,3.639,0.687c2.738,0,5.42-1.126,7.35-3.218L409.38,360H450c22.056,0,40-17.944,40-40V40     C490,17.944,472.057,0,450,0z M470,320c0,11.028-8.972,20-20,20h-45c-2.791,0-5.455,1.167-7.348,3.217L295,454.423V350     c0-5.523-4.477-10-10-10h-245c-11.028,0-20-8.972-20-20V40c0-11.028,8.972-20,20-20h410c11.028,0,20,8.972,20,20V320z"/>
                                                                    <path
                                                                        d="M144.881,80.001c-3.957,0.047-7.513,2.423-9.072,6.06l-75,175l18.383,7.878L106.594,205h79.982l29.329,64.158     l18.189-8.315l-80-175C152.45,82.244,148.863,79.974,144.881,80.001z M115.167,185l30.129-70.302L177.433,185H115.167z"/>
                                                                    <rect x="255.001" y="115" width="80" height="20"/>
                                                                    <rect x="350" y="115" width="60" height="20"/>
                                                                    <rect x="255.001" y="165" width="180" height="20"/>
                                                                    <rect x="255.001" y="215" width="75" height="20"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    </a>
                                                    <a href="#" class="js-report" data-toggle="modal"
                                                       data-target="#reportModal">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                                fill="#9F9F9F"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="append-textarea"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="posts-category">
                <h6 class="mt-4 mb-4">
                    <span>
                        {{ __('Posts in the same Category') }}
                    </span>
                </h6>
                <div class="container-posts-category">
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="http://127.0.0.1:8000/detail" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img src="http://127.0.0.1:8000/images/avatar_default.png"
                                     title="Avatar của Nguyễn Phú Trường" alt="">
                                <h5>Nguyễn Phú Trường</h5>
                            </div>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only
                                five
                                centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including
                                versions of Lorem Ipsum.</h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer">8/12/2023</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        0
                                    </div>
                                    <div style="margin-left: 5px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('components.pages.main.modalReport')
@endsection
