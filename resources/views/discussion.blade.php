@extends("layouts.app")
@section("title", $post->title)
@section("content")
    <!-- Page Breadcumb -->
    <section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
        <div class="pageBreadcumbTopDown">
        </div>
        <div class="sectionShape sectionShape--top">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="{{ $post->title }}">
        </div>
        <div class="sectionShape sectionShape--bottom">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="{{ $post->title }}">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="pageTitle text-center">
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">{{ $post->title }}</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Discussion</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
<!-- stories Details -->
<section class="stories pt-130 pb-100">
    <div class="container">
        <div class="row">
        <div class="col-lg-8 mb-30">
            <div class="innerWrapper">
            <div class="donationDetails storiesDetails">
                <div class="donationDetails__header mb-45">
                <figure class="thumb mb-45">
                    <img src="{{ asset($post->featureimage) }}" style="width:850px;height:430px;object-fit:cover;" alt="{{ $post->title }}" class="image-saturation">
                </figure>
                </div>
                <p class="donationDetails__text storiesDetails__text mb-30">
                    @php echo $post->content @endphp
                </p>


                <div class="blogDetails-socialTags mb-35">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                    <div class="blogDetails-tags">
                        <div class="blogDetails-title">
                        <h3 class="blogDetails-title__heading text-uppercase">Tag</h3>
                        </div>
                        <ul>
                            @for($x=0; $x < count($posttags); $x++)
                                @php
                                    if($posttags[$x] == "" || $posttags[$x] == "null" || $posttags[$x] == null){
                                        continue;
                                    }
                                    $posttag = \App\Models\Tag::findOrFail($posttags[$x]);
                                @endphp
                                <li>
                                    <a href="#">{{ optional($posttag)->name }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        @include("components.discussion.share")
                    </div>
                </div>
                </div>

                <div class="comments mb-70 pt-45">
                <div class="blogDetails-title mb-35">
                    <h3 class="blogDetails-title__heading text-uppercase">({{ count($comments) }}) Comment</h3>
                </div>
                <ul>
                    @foreach ($comments as $row)
                    @php
                        if($row->type == "twitter"){
                            $author_name = $row->name;
                            $author_image = $row->picture;
                        }else{
                            if($row->author){
                                $user = \App\Models\User::find($row->author);
                                $author_name = $user->firstname . ' ' . $user->lastname;
                                $author_image = asset($user->photo);
                            }else{
                                $author_name = $row->name;
                                $author_image = asset("image/default.png");
                            }

                        }

                    @endphp
                        <li>
                            <div class="commentsBlock">
                                <figure class="commentsBlock__person">
                                <a href="">
                                    <img style="width:70px;height:70px;object-fit:cover;border-radius:100%;" src="{{ $author_image }}" alt="User" class="commentsBlock__person__picture">
                                </a>
                                </figure>
                                <div class="commentsBlock__content">
                                <div class="commentsBlock__header">
                                    <div class="commentsBlock__personalInfo">
                                        <div style="display: flex">
                                            <a class="commentsBlock__name" href="">{{ $author_name }} </a>
                                            @if($row->type == "twitter")
                                                <img src="{{ asset("assets/icons/twitter.png") }}" alt="" style="width:15px;height:15px;margin-left:5px;">
                                            @endif
                                        </div>
                                    <span class="commentsBlock__date">{{ \Carbon\Carbon::parse($row->created_at)->format("Y/m/d") }}</span>
                                    </div>
                                </div>
                                <p class="commentsBlock__text">
                                    {{ $row->message }}
                                </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                </div>
                <hr class="ourHr m-0">
                <form action="{{ route("post.comment") }}" method="POST" class=" pt-45 pb-25">
                    @csrf
                <div class="blogDetails-title mb-35">
                    <h3 class="blogDetails-title__heading text-uppercase">Write your comment</h3>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                    <div class="commentsPost__input">
                        <input name="name" type="text"  value="@auth {{ auth()->user()->firstname .' '. auth()->user()->lastname }}@endauth" placeholder="Enter your name*" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="commentsPost__input">
                        <input name="email" type="text" value="@auth {{ auth()->user()->email }}@endauth" placeholder="Enter your email*" required>
                    </div>
                    </div>

                    <div class="col-12">
                    <div class="commentsPost__input">
                        <textarea name="message" placeholder="Enter your Massage*" required></textarea>
                    </div>
                    </div>

                    <div class="col-12">
                    <div class="commentsPost__button text-center">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn--styleOne btn--primary it-btn">
                            <span class="btn__text">Post Comment</span>
                            <i class="fa-solid fa-heart btn__icon"></i>
                            <span class="it-btn__inner">
                                <span class="it-btn__blobs">
                                    <span class="it-btn__blob"></span>
                                    <span class="it-btn__blob"></span>
                                    <span class="it-btn__blob"></span>
                                    <span class="it-btn__blob"></span>
                                </span>
                            </span>
                        </button>
                    </div>
                    </div>
                </div>
                <div class="form-response"></div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-lg-4 mb-30">
            <div class="sidebarLayout">
            <div class="innerWrapperSidebar mb-30">
                <div class="sidebarWidget">
                <div class="sidebarTitle">
                    <h5 class="sidebarTitle__heading text-uppercase mb-30">categories</h5>
                </div>
                <div class="sidebarCategories">
                    <ul>
                        @foreach ($categories as $row)
                        @php
                            $countposts = \App\Models\Post::where('categoryid', $row->id)->count();
                        @endphp
                        <li>
                            <a href="#">
                                <span>{{ $row->name }}</span>
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
                    <h5 class="sidebarTitle__heading text-uppercase mb-30">Recent POst</h5>
                </div>
                <div class="sidebarBlogs">
                    <ul>
                        @foreach ($posts as $row)
                        <li>
                            <div class="blogBlockSmall">
                            <figure class="blogBlockSmall__thumb">
                                <a class="blogBlockSmall__thumb__link" href="/discussion/{{ $row->id }}/{{ $row->slug }}">
                                <img src="{{ asset($row->featureimage) }}" alt="{{ $row->title }}" style="width: 141px;height:78px; object-fit:contain;">
                                </a>
                            </figure>
                            <figure class="blogBlockSmall__content">
                                <span class="blogBlockSmall__meta">{{ \Carbon\Carbon::parse($row->created_at)->format("D m, Y") }}</span>
                                <h3 class="blogBlockSmall__heading"><a href="/discussion/{{ $row->id }}/{{ $row->slug }}">{{ $row->title }}</a>
                                </h3>
                            </figure>
                            </div>
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
