@extends("layouts.app")
@section("title", "Discussions")
@section("content")

    <!-- Page Breadcumb -->
    <section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">

        <div class="sectionShape sectionShape--top">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Gainioz">
        </div>
        <div class="sectionShape sectionShape--bottom">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="Gainioz">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="pageTitle text-center">
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">Recent Blog</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
      <!-- Donation Details -->
      <section class="donation pt-130 pb-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-30">
              <div class="innerWrapper">
                <div class="row">

                    @if($pinned)
                    @php
                        $user = \App\Models\User::find($pinned->author);
                        $comments = \App\Models\Comment::where(["postid"  => $pinned->id, "status" => "approve"])->count();
                    @endphp
                    @php
                    $categoriesx = json_decode($pinned->categoryid);
                    $stack = [];
                        for ($i=0; $i < count($categoriesx); $i++) {
                            if($categoriesx[$i] == null || $categoriesx[$i] == ""){
                                continue;
                            }
                            $stack[] = \App\Models\Category::find($categoriesx[$i])->name;
                        }
                    @endphp
                    <div style="background:#eb9309;border-radius:5px 5px 0px 0px; ">
                        <span style="color:white;font-weight:800">Pinned</span>
                    </div>
                    <div class="col-lg-12 mb-55" style="border:4px solid #eb9309; border-radius:0px 0px 5px 5px;">
                        <div class="blogBlock blogBlock--style4 hoverStyle">
                          <figure class="blogBlock__figure overflow-hidden">
                            <a href="/discussion/{{ $pinned->id }}/{{ $pinned->slug }}" class="blogBlock__figure__link">
                              <img src="{{ asset($pinned->featureimage) }}" alt="{{ $pinned->title }}" style="width:850px;height:430px;object-fit:contain;" class="blogBlock__figure__image image-saturation">
                            </a>
                          </figure>
                          <div class="blogBlock__content">

                            <div class="blogBlock__header">
                                @for($x = 0; $x < count($stack); $x++)
                                <span class="blogBlock__tag tag mb-20"> {{ $stack[$x] }} </span>
                                @endfor
                              <h2 class="blogBlock__heading heading text-uppercase mb-15">
                                <a class="blogBlock__heading__link" href="/discussion/{{ $pinned->id }}/{{ $pinned->slug }}">
                                    {{ $pinned->title }}
                                </a>
                              </h2>
                            </div>
                            <div class="blogBlock__body mb-25">
                              <p class="blogBlock__text text">
                                {!! $pinned->content_filtered !!} ... <a href="/discussion/{{ $pinned->id }}/{{ $pinned->slug }}" style="color: #eb9309"> <i> read more</i></a>
                              </p>
                            </div>
                            <div class="blogBlock__meta blogBlock__meta--style2">
                              <ul>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.5 2H11V0.375C11 0.1875 10.8125 0 10.625 0H10.375C10.1562 0 10 0.1875 10 0.375V2H4V0.375C4 0.1875 3.8125 0 3.625 0H3.375C3.15625 0 3 0.1875 3 0.375V2H1.5C0.65625 2 0 2.6875 0 3.5V14.5C0 15.3438 0.65625 16 1.5 16H12.5C13.3125 16 14 15.3438 14 14.5V3.5C14 2.6875 13.3125 2 12.5 2ZM1.5 3H12.5C12.75 3 13 3.25 13 3.5V5H1V3.5C1 3.25 1.21875 3 1.5 3ZM12.5 15H1.5C1.21875 15 1 14.7812 1 14.5V6H13V14.5C13 14.7812 12.75 15 12.5 15ZM4.625 10C4.8125 10 5 9.84375 5 9.625V8.375C5 8.1875 4.8125 8 4.625 8H3.375C3.15625 8 3 8.1875 3 8.375V9.625C3 9.84375 3.15625 10 3.375 10H4.625ZM7.625 10C7.8125 10 8 9.84375 8 9.625V8.375C8 8.1875 7.8125 8 7.625 8H6.375C6.15625 8 6 8.1875 6 8.375V9.625C6 9.84375 6.15625 10 6.375 10H7.625ZM10.625 10C10.8125 10 11 9.84375 11 9.625V8.375C11 8.1875 10.8125 8 10.625 8H9.375C9.15625 8 9 8.1875 9 8.375V9.625C9 9.84375 9.15625 10 9.375 10H10.625ZM7.625 13C7.8125 13 8 12.8438 8 12.625V11.375C8 11.1875 7.8125 11 7.625 11H6.375C6.15625 11 6 11.1875 6 11.375V12.625C6 12.8438 6.15625 13 6.375 13H7.625ZM4.625 13C4.8125 13 5 12.8438 5 12.625V11.375C5 11.1875 4.8125 11 4.625 11H3.375C3.15625 11 3 11.1875 3 11.375V12.625C3 12.8438 3.15625 13 3.375 13H4.625ZM10.625 13C10.8125 13 11 12.8438 11 12.625V11.375C11 11.1875 10.8125 11 10.625 11H9.375C9.15625 11 9 11.1875 9 11.375V12.625C9 12.8438 9.15625 13 9.375 13H10.625Z" fill="#666666" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($pinned->created_at)->format("D m, Y") }}</span>
                                  </a>
                                </li>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M16 5H13V2C13 0.90625 12.0938 0 11 0H2C0.875 0 0 0.90625 0 2V7C0 8.125 0.875 9 2 9H3V10.625C3 10.875 3.15625 11 3.375 11C3.4375 11 3.5 11 3.59375 10.9375L6 9.59375V12C6 13.125 6.875 14 8 14H11L14.375 15.9375C14.4688 16 14.5312 16 14.625 16C14.8125 16 15 15.875 15 15.625V14H16C17.0938 14 18 13.125 18 12V7C18 5.90625 17.0938 5 16 5ZM2 8C1.4375 8 1 7.5625 1 7V2C1 1.46875 1.4375 1 2 1H11C11.5312 1 12 1.46875 12 2V7C12 7.5625 11.5312 8 11 8H6.71875L6.5 8.15625L4 9.5625V8H2ZM17 12C17 12.5625 16.5312 13 16 13H14V14.5625L11.4688 13.1562L11.25 13H8C7.4375 13 7 12.5625 7 12V9H11C12.0938 9 13 8.125 13 7V6H16C16.5312 6 17 6.46875 17 7V12Z" fill="#666666" />
                                    </svg>
                                    <span>Comment ({{ $comments }})</span>
                                  </a>
                                </li>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M14.6875 5.31246L9.6875 0.312461C9.0625 -0.312539 8 0.124961 8 1.03121V3.28121C4.375 3.40621 0 4.15621 0 8.93746C0 10.9687 1.03125 12.6562 2.65625 13.8125C3.40625 14.375 4.46875 13.6562 4.1875 12.75C3.34375 9.68746 4.1875 8.93746 8 8.78121V11C8 11.9062 9.0625 12.3437 9.6875 11.7187L14.6875 6.71871C15.0938 6.34371 15.0938 5.68746 14.6875 5.31246ZM9 11.0312V7.78121C4.4375 7.81246 1.96875 8.46871 3.25 13.0312C2.25 12.2812 1 10.9687 1 8.93746C1 4.84371 4.90625 4.31246 9 4.28121V1.03121L14 6.03121L9 11.0312ZM17.6875 6.71871C18.0938 6.34371 18.0938 5.68746 17.6875 5.31246L12.6875 0.312461C12.2812 -0.125039 11.6562 -0.0625389 11.2812 0.312461L17 6.03121L11.2812 11.7187C11.6562 12.0937 12.2812 12.1562 12.6875 11.7187L17.6875 6.71871Z" fill="#666666" />
                                    </svg>
                                    <span>00</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif


                    @foreach ($posts as $row)

                    @php
                        $user = \App\Models\User::find($row->author);
                        $comments = \App\Models\Comment::where(["postid"  => $row->id, "status" => "approve"])->count();
                    @endphp
                    @php
                    $categoriesx = json_decode($row->categoryid);
                    $stack = [];
                        for ($i=0; $i < count($categoriesx); $i++) {
                            if($categoriesx[$i] == null || $categoriesx[$i] == ""){
                                continue;
                            }
                            $stack[] = \App\Models\Category::find($categoriesx[$i])->name;
                        }
                    @endphp

                    <div class="col-lg-12 mb-55">
                        <div class="blogBlock blogBlock--style4 hoverStyle">
                          <figure class="blogBlock__figure overflow-hidden">
                            <a href="/discussion/{{ $row->id }}/{{ $row->slug }}" class="blogBlock__figure__link">
                              <img src="{{ asset($row->featureimage) }}" alt="{{ $row->title }}" style="width:850px;height:430px;object-fit:contain;" class="blogBlock__figure__image image-saturation">
                            </a>
                          </figure>
                          <div class="blogBlock__content">

                            <div class="blogBlock__header">
                                @for($x = 0; $x < count($stack); $x++)
                                <span class="blogBlock__tag tag mb-20"> {{ $stack[$x] }} </span>
                                @endfor
                              <div class="blogBlock__meta mb-15 mt-15">
                                <ul class="blogBlock__meta__list">
                                  {{-- <li> --}}
                                    {{-- <a class="blogBlock__metaUser" href="#"> --}}
                                      {{-- <img class="blogBlock__metaUser__thumb" src="{{ asset($user->photo) }}" alt="{{ $user->firstname . ' ' . $user->lastname }}" style="width: 36px !important; height:36px !important;object-fit:cover;"> --}}
                                      {{-- <span class="blogBlock__metaUser__name">{{ $user->firstname . ' '. $user->lastname }}</span> --}}
                                    {{-- </a> --}}
                                  {{-- </li> --}}
                                </ul>
                              </div>
                              <h2 class="blogBlock__heading heading text-uppercase mb-15">
                                <a class="blogBlock__heading__link" href="/discussion/{{ $row->id }}/{{ $row->slug }}">
                                    {{ $row->title }}
                                </a>
                              </h2>
                            </div>
                            <div class="blogBlock__body mb-25">
                              <p class="blogBlock__text text">
                                {!! $row->content_filtered !!} ... <a href="/discussion/{{ $row->id }}/{{ $row->slug }}" style="color: #eb9309"> <i> read more</i></a>
                              </p>
                            </div>
                            <div class="blogBlock__meta blogBlock__meta--style2">
                              <ul>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.5 2H11V0.375C11 0.1875 10.8125 0 10.625 0H10.375C10.1562 0 10 0.1875 10 0.375V2H4V0.375C4 0.1875 3.8125 0 3.625 0H3.375C3.15625 0 3 0.1875 3 0.375V2H1.5C0.65625 2 0 2.6875 0 3.5V14.5C0 15.3438 0.65625 16 1.5 16H12.5C13.3125 16 14 15.3438 14 14.5V3.5C14 2.6875 13.3125 2 12.5 2ZM1.5 3H12.5C12.75 3 13 3.25 13 3.5V5H1V3.5C1 3.25 1.21875 3 1.5 3ZM12.5 15H1.5C1.21875 15 1 14.7812 1 14.5V6H13V14.5C13 14.7812 12.75 15 12.5 15ZM4.625 10C4.8125 10 5 9.84375 5 9.625V8.375C5 8.1875 4.8125 8 4.625 8H3.375C3.15625 8 3 8.1875 3 8.375V9.625C3 9.84375 3.15625 10 3.375 10H4.625ZM7.625 10C7.8125 10 8 9.84375 8 9.625V8.375C8 8.1875 7.8125 8 7.625 8H6.375C6.15625 8 6 8.1875 6 8.375V9.625C6 9.84375 6.15625 10 6.375 10H7.625ZM10.625 10C10.8125 10 11 9.84375 11 9.625V8.375C11 8.1875 10.8125 8 10.625 8H9.375C9.15625 8 9 8.1875 9 8.375V9.625C9 9.84375 9.15625 10 9.375 10H10.625ZM7.625 13C7.8125 13 8 12.8438 8 12.625V11.375C8 11.1875 7.8125 11 7.625 11H6.375C6.15625 11 6 11.1875 6 11.375V12.625C6 12.8438 6.15625 13 6.375 13H7.625ZM4.625 13C4.8125 13 5 12.8438 5 12.625V11.375C5 11.1875 4.8125 11 4.625 11H3.375C3.15625 11 3 11.1875 3 11.375V12.625C3 12.8438 3.15625 13 3.375 13H4.625ZM10.625 13C10.8125 13 11 12.8438 11 12.625V11.375C11 11.1875 10.8125 11 10.625 11H9.375C9.15625 11 9 11.1875 9 11.375V12.625C9 12.8438 9.15625 13 9.375 13H10.625Z" fill="#666666" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($row->created_at)->format("D m, Y") }}</span>
                                  </a>
                                </li>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M16 5H13V2C13 0.90625 12.0938 0 11 0H2C0.875 0 0 0.90625 0 2V7C0 8.125 0.875 9 2 9H3V10.625C3 10.875 3.15625 11 3.375 11C3.4375 11 3.5 11 3.59375 10.9375L6 9.59375V12C6 13.125 6.875 14 8 14H11L14.375 15.9375C14.4688 16 14.5312 16 14.625 16C14.8125 16 15 15.875 15 15.625V14H16C17.0938 14 18 13.125 18 12V7C18 5.90625 17.0938 5 16 5ZM2 8C1.4375 8 1 7.5625 1 7V2C1 1.46875 1.4375 1 2 1H11C11.5312 1 12 1.46875 12 2V7C12 7.5625 11.5312 8 11 8H6.71875L6.5 8.15625L4 9.5625V8H2ZM17 12C17 12.5625 16.5312 13 16 13H14V14.5625L11.4688 13.1562L11.25 13H8C7.4375 13 7 12.5625 7 12V9H11C12.0938 9 13 8.125 13 7V6H16C16.5312 6 17 6.46875 17 7V12Z" fill="#666666" />
                                    </svg>
                                    <span>Comment ({{ $comments }})</span>
                                  </a>
                                </li>
                                <li>
                                  <a class="blogBlock__meta__text" href="#">
                                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M14.6875 5.31246L9.6875 0.312461C9.0625 -0.312539 8 0.124961 8 1.03121V3.28121C4.375 3.40621 0 4.15621 0 8.93746C0 10.9687 1.03125 12.6562 2.65625 13.8125C3.40625 14.375 4.46875 13.6562 4.1875 12.75C3.34375 9.68746 4.1875 8.93746 8 8.78121V11C8 11.9062 9.0625 12.3437 9.6875 11.7187L14.6875 6.71871C15.0938 6.34371 15.0938 5.68746 14.6875 5.31246ZM9 11.0312V7.78121C4.4375 7.81246 1.96875 8.46871 3.25 13.0312C2.25 12.2812 1 10.9687 1 8.93746C1 4.84371 4.90625 4.31246 9 4.28121V1.03121L14 6.03121L9 11.0312ZM17.6875 6.71871C18.0938 6.34371 18.0938 5.68746 17.6875 5.31246L12.6875 0.312461C12.2812 -0.125039 11.6562 -0.0625389 11.2812 0.312461L17 6.03121L11.2812 11.7187C11.6562 12.0937 12.2812 12.1562 12.6875 11.7187L17.6875 6.71871Z" fill="#666666" />
                                    </svg>
                                    <span>00</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach


                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-30">
              <div class="sidebarLayout">
                <form class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">search here</h5>
                    </div>
                    <div class="searchInput">
                      <input class="searchInput__box" type="text" placeholder="Search product">
                      <button class="searchInput__button">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.8906 13.5742L10.582 10.2656C10.5 10.2109 10.418 10.1562 10.3359 10.1562H9.98047C10.8281 9.17188 11.375 7.85938 11.375 6.4375C11.375 3.32031 8.80469 0.75 5.6875 0.75C2.54297 0.75 0 3.32031 0 6.4375C0 9.58203 2.54297 12.125 5.6875 12.125C7.10938 12.125 8.39453 11.6055 9.40625 10.7578V11.1133C9.40625 11.1953 9.43359 11.2773 9.48828 11.3594L12.7969 14.668C12.9336 14.8047 13.1523 14.8047 13.2617 14.668L13.8906 14.0391C14.0273 13.9297 14.0273 13.7109 13.8906 13.5742ZM5.6875 10.8125C3.25391 10.8125 1.3125 8.87109 1.3125 6.4375C1.3125 4.03125 3.25391 2.0625 5.6875 2.0625C8.09375 2.0625 10.0625 4.03125 10.0625 6.4375C10.0625 8.87109 8.09375 10.8125 5.6875 10.8125Z" fill="#666666" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </form>
                <div class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">categories</h5>
                    </div>
                    <div class="sidebarCategories">
                      <ul>


                        @foreach ($categories as $category)
                        @php
                            $countposts = \App\Models\Post::where('categoryid', $category->id)->count();
                        @endphp
                            <li>
                            <a href="#">
                              <span>{{ $category->name }}</span>
                              <span>{{ $countposts }}</span>
                            </a>
                          </li>
                        @endforeach



                      </ul>
                    </div>
                  </div>
                </div>

                <div class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">Direct Contact us</h5>
                    </div>
                    <div class="sidebarContacts">
                      <input type="text" class="sidebarContacts__input" placeholder="Enter name*">
                      <input type="email" class="sidebarContacts__input" placeholder="Enter your mail*">
                      <textarea class="sidebarContacts__input textarea" name="message" id="message" placeholder="Massage*"></textarea>
                      <a class="btn btn--styleOne btn--primary it-btn" href="donation-listing.html">
                        <span class="btn__text">send massage</span>
                        <span class="it-btn__inner">
                        <span class="it-btn__blobs">
                          <span class="it-btn__blob"></span>
                        <span class="it-btn__blob"></span>
                        <span class="it-btn__blob"></span>
                        <span class="it-btn__blob"></span>
                        </span>
                        </span>
                        <svg class="it-btn__animation" xmlns="http://www.w3.org/2000/svg" version="1.1">
                          <defs>
                            <filter>
                              <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                              <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                              </feColorMatrix>
                              <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                            </filter>
                          </defs>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">Contact Info</h5>
                    </div>
                    <div class="sidebarContact">
                        @php
                            $data = pagesContent("contact", "contact", "contact", false);
                        @endphp
                        @if($data)
                      <ul>
                        <li>
                            <span>{{ $data->title }}</span>
                        </li>
                        <li>
                          <span>Adress :</span>
                          {{ $data->address }}
                        </li>
                        <li>
                          <span>Mail :</span>
                          {{ $data->email }}
                        </li>
                        <li>
                          <span>Phone :</span>
                          {{ $data->phone }}
                        </li>
                      </ul>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">Popular Tag</h5>
                    </div>
                    <div class="sidebarTags">
                      <ul>
                        @foreach ($tags as $tag)
                            <li>
                            <a href="#">{{ $tag->name }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Donation Details End -->
@endsection
