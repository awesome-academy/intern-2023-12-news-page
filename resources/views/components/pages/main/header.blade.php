<div class="container-fluid bg-main nav nav-custom">
    <div class="container">
        <header class="main-navbar d-flex align-items-center">
            <div class="d-flex main-navbar__left align-items-center">
                <a href="{{ route('landingPage') }}" class="main-navbar__logo d-block mr-lg-5">
                    <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z"/>
                    </svg>
                </a>
                <a href="{{route('locale', ['lang' => 'en'])}}"
                   class="text-dark link-underline-light hidden-mb">{{ __('English') }}</a>
                <span class="hidden-mb" style="margin-left: 5px;margin-right: 5px">/</span>
                <a href="{{route('locale', ['lang' => 'vi'])}}"
                   class="text-dark link-underline-light hidden-mb">{{ __('Vietnamese') }}</a>
            </div>
            <div class="d-flex main-navbar__right align-items-center">
                <div class="main-nav__group position-relative flex-fill mr-1">
                    <label>
                        <input value="" id = "searchMain" placeholder="{{ __('Search for posts/user/hashtag') }}">
                    </label>
                    <button class="btn btn-dark position-absolute right-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             style="width: 15px;height: 15px;"
                             fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1"
                             viewBox="0 0 488.4 488.4" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6    s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2    S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7    S381.9,104.65,381.9,203.25z"/>
                                </g>
                            </g>
                        </svg>
                    </button>
                    <div class="result-search-box">
                        <div class="h-100" style="padding: 15px;overflow-y: scroll;overflow-x: hidden;">
                            <div class="content-result post-result">
                                <h6>{{ __('Posts') }}</h6>
                                <a href="" class="main-content__item">
                                    <div class="w-100 h-100 main-container__item">
                                        <div class="info-post-item d-flex">
                                            <img
                                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                                            <h5>
                                                Nguyễn Phú Trường
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <span class="item-footer">8/12/2023</span>
                                                    <div class="d-flex item-footer">
                                                        <div style="margin-right: 5px">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="800px" height="800px"
                                                                 viewBox="0 0 24 24" version="1.1">
                                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                <title>ic_fluent_comment_24_regular</title>
                                                                <desc>Created with Sketch.</desc>
                                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1"
                                                                   fill="none"
                                                                   fill-rule="evenodd">
                                                                    <g id="ic_fluent_comment_24_regular" fill="#212121"
                                                                       fill-rule="nonzero">
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
                                                            <svg fill="#000000" height="800px" width="800px"
                                                                 version="1.1" id="Layer_1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 viewBox="0 0 42 42" enable-background="new 0 0 42 42"
                                                                 xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has
                                            been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book. It has
                                            survived not only
                                            five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially
                                            unchanged.
                                            It was popularised in the 1960s with the release of Letraset sheets
                                            containing Lorem
                                            Ipsum
                                            passages, and more recently with desktop publishing software like Aldus
                                            PageMaker
                                            including
                                            versions of Lorem Ipsum.</h5>
                                    </div>
                                </a>
                                <a href="" class="main-content__item">
                                    <div class="w-100 h-100 main-container__item">
                                        <div class="info-post-item d-flex">
                                            <img
                                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                                            <h5>
                                                Nguyễn Phú Trường
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <span class="item-footer">8/12/2023</span>
                                                    <div class="d-flex item-footer">
                                                        <div style="margin-right: 5px">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="800px" height="800px"
                                                                 viewBox="0 0 24 24" version="1.1">
                                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                <title>ic_fluent_comment_24_regular</title>
                                                                <desc>Created with Sketch.</desc>
                                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1"
                                                                   fill="none"
                                                                   fill-rule="evenodd">
                                                                    <g id="ic_fluent_comment_24_regular" fill="#212121"
                                                                       fill-rule="nonzero">
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
                                                            <svg fill="#000000" height="800px" width="800px"
                                                                 version="1.1" id="Layer_1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 viewBox="0 0 42 42" enable-background="new 0 0 42 42"
                                                                 xml:space="preserve">
                                                                <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                                    C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                                    C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                                            </svg>
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has
                                            been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book. It has
                                            survived not only
                                            five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially
                                            unchanged.
                                            It was popularised in the 1960s with the release of Letraset sheets
                                            containing Lorem
                                            Ipsum
                                            passages, and more recently with desktop publishing software like Aldus
                                            PageMaker
                                            including
                                            versions of Lorem Ipsum.</h5>
                                    </div>
                                </a>
                                <a href="" class="main-content__item">
                                    <div class="w-100 h-100 main-container__item">
                                        <div class="info-post-item d-flex">
                                            <img
                                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                                            <h5>
                                                Nguyễn Phú Trường
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <span class="item-footer">8/12/2023</span>
                                                    <div class="d-flex item-footer">
                                                        <div style="margin-right: 5px">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="800px" height="800px"
                                                                 viewBox="0 0 24 24" version="1.1">
                                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                <title>ic_fluent_comment_24_regular</title>
                                                                <desc>Created with Sketch.</desc>
                                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1"
                                                                   fill="none"
                                                                   fill-rule="evenodd">
                                                                    <g id="ic_fluent_comment_24_regular" fill="#212121"
                                                                       fill-rule="nonzero">
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
                                                            <svg fill="#000000" height="800px" width="800px"
                                                                 version="1.1" id="Layer_1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 viewBox="0 0 42 42" enable-background="new 0 0 42 42"
                                                                 xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has
                                            been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book. It has
                                            survived not only
                                            five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially
                                            unchanged.
                                            It was popularised in the 1960s with the release of Letraset sheets
                                            containing Lorem
                                            Ipsum
                                            passages, and more recently with desktop publishing software like Aldus
                                            PageMaker
                                            including
                                            versions of Lorem Ipsum.</h5>
                                    </div>
                                </a>
                                <a href="" class="main-content__item">
                                    <div class="w-100 h-100 main-container__item">
                                        <div class="info-post-item d-flex">
                                            <img
                                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                                            <h5>
                                                Nguyễn Phú Trường
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <span class="item-footer">8/12/2023</span>
                                                    <div class="d-flex item-footer">
                                                        <div style="margin-right: 5px">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="800px" height="800px"
                                                                 viewBox="0 0 24 24" version="1.1">
                                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                <title>ic_fluent_comment_24_regular</title>
                                                                <desc>Created with Sketch.</desc>
                                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1"
                                                                   fill="none"
                                                                   fill-rule="evenodd">
                                                                    <g id="ic_fluent_comment_24_regular" fill="#212121"
                                                                       fill-rule="nonzero">
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
                                                            <svg fill="#000000" height="800px" width="800px"
                                                                 version="1.1" id="Layer_1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 viewBox="0 0 42 42" enable-background="new 0 0 42 42"
                                                                 xml:space="preserve">
                                                                <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                                    C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                                    C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                                            </svg>
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has
                                            been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book. It has
                                            survived not only
                                            five
                                            centuries, but also the leap into electronic typesetting, remaining
                                            essentially
                                            unchanged.
                                            It was popularised in the 1960s with the release of Letraset sheets
                                            containing Lorem
                                            Ipsum
                                            passages, and more recently with desktop publishing software like Aldus
                                            PageMaker
                                            including
                                            versions of Lorem Ipsum.</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="content-result post-result">
                                <h6>{{ __('Users') }}</h6>
                                <a href="" class="main-content__item">
                                    <div class="w-100 h-100 main-container__item">
                                        <div class="info-post-item d-flex">
                                            <img
                                                src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                                title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
                                            <h5>
                                                Nguyễn Phú Trường
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div class="d-flex item-footer">
                                                        <div style="margin-right: 5px">
                                                            <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="0" fill="none" width="24" height="24"/>
                                                                <g>
                                                                    <path
                                                                        d="M23 16v2h-3v3h-2v-3h-3v-2h3v-3h2v3h3zM20 2v9h-4v3h-3v4H4c-1.1 0-2-.9-2-2V2h18zM8 13v-1H4v1h4zm3-3H4v1h7v-1zm0-2H4v1h7V8zm7-4H4v2h14V4z"/>
                                                                </g>
                                                            </svg>
                                                            0
                                                        </div>
                                                        <div style="margin-left: 5px">
                                                            <svg class="svg-icon"
                                                                 style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                                                 viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M862.3616 605.44c-44.1344 0.4608-74.752 21.7088-94.2592 45.7216-19.1488-24.32-49.8176-45.7216-95.0784-45.7216-29.9008 0-54.7328 9.6768-73.7792 28.8256-34.8672 35.0208-35.584 87.7568-35.2256 89.3952-0.8704 5.3248-18.8928 131.9936 192.768 237.4656 3.584 1.792 7.5264 2.7136 11.4176 2.7136 4.1472 0 8.2432-1.024 11.9808-3.0208 128-67.9424 194.56-150.2208 192.512-239.8208C972.7488 674.56 943.7184 605.44 862.3616 605.44zM767.8464 909.312c-162.816-85.4528-153.7024-174.08-152.9344-181.6064-0.0512-9.4208 3.6352-40.192 20.6848-57.2928 9.216-9.2672 21.4528-13.7728 37.4784-13.7728 54.2208 0 68.1472 49.5104 69.4784 54.9888 2.6624 11.3664 12.6976 19.4048 24.3712 19.6608 11.2128-1.2288 22.0672-7.4752 25.2416-18.688 0.6656-2.2528 16.3328-55.3984 71.6288-55.9616 57.1392 0 57.7536 61.7472 57.8048 67.3792C923.0336 787.7632 868.5568 853.248 767.8464 909.312zM768.0512 321.4848c0-155.2384-126.3104-281.6-281.6-281.6s-281.6 126.3104-281.6 281.6c0 109.6192 63.0784 204.5952 154.7264 251.0848-168.8576 54.1184-308.3264 207.4624-308.3264 363.3152 0 14.1312 11.4688 25.6 25.6 25.6s25.6-11.4688 25.6-25.6c0-164.864 193.792-332.8 384-332.8C641.6896 603.0848 768.0512 476.7744 768.0512 321.4848zM486.4512 551.8848c-127.0272 0-230.4-103.3728-230.4-230.4 0-127.0272 103.3728-230.4 230.4-230.4s230.4 103.3728 230.4 230.4C716.8512 448.512 613.4784 551.8848 486.4512 551.8848z"></path>
                                                            </svg>
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="content-result post-result">
                                <h6>{{ __('Hashtag') }}</h6>
                                <a href="" class="text-dark link-underline-light">Khoa học và Công nghệ</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="text-dark link-underline-light hidden-mb">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="text-dark link-underline-light hidden-mb">{{ __('Log in') }}</a>

                            @if (Route::has('register'))
                                <span class="hidden-mb" style="margin-left: 5px;margin-right: 5px">/</span>
                                <a href="{{ route('register') }}"
                                   class="text-dark link-underline-light hidden-mb">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </header>
    </div>
</div>
