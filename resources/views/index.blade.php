@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="main-content__box">
                <h4>{{ __('New Posts') }}</h4>
                <div class="main-content__list-item">
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}" alt="">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="main-content__box">
                <h4>{{ __('Authenticated Posts') }}</h4>
                <div class="main-content__list-item">
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="main-content__box">
                <h4>{{ __('High Interactions Posts') }}</h4>
                <div class="main-content__list-item">
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('detail') }}" class="main-content__item">
                        <div class="w-100 h-100 main-container__item">
                            <div class="info-post-item d-flex">
                                <img
                                    src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{Auth::user()->name ?? 'Nguyễn Phú Trường'}}">
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
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
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
@endsection
