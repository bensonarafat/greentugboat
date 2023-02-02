@extends("layouts.app")
@section("title", "Contact")
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
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">Contact us</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
      <!-- Contact -->
      <div class="contact contact--layout1">
        <div class="container">
          <div class="row">
            @php
                $data = pagesContent("contact", "contact", "contact", false);
            @endphp
            @if($data)
            <div class="col-lg-12 col-md-12 mb-40">
              <div class="contactBlock text-center">

                <div class="contactBlock__content">
                  <h2 class="contactBlock__heading text-uppercase pt-10">{{ $data->title }}</h2>
                  <p class="contactBlock__text">{{ $data->address }}</p>
                  <a class="contactBlock__email connect" href="#">{{ $data->email }}</a>
                  <a class="contactBlock__phone connect" href="#">{{ $data->phone }}</a>
                </div>
              </div>
            </div>
            @endif
          </div>
          <form id="contact-form" action="#" class="it-contact-form commentsPost commentsPost--style2 pt-45 pb-25">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="commentsPost__input">
                  <input name="name" type="text" placeholder="Enter your name*">
                </div>
              </div>
              <div class="col-md-6">
                <div class="commentsPost__input">
                  <input name="email" type="text" placeholder="Enter your email*">
                </div>
              </div>
              <div class="col-md-6">
                <div class="commentsPost__input">
                  <input name="phone" type="text" placeholder="Enter your  number*">
                </div>
              </div>
              <div class="col-md-6">
                <div class="commentsPost__input">
                  <input name="subject" type="text" placeholder="Subject*">
                </div>
              </div>
              <div class="col-12">
                <div class="commentsPost__input">
                  <textarea name="message" placeholder="Enter your Massage*"></textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="commentsPost__check">
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Save my name, email, and website in this
                      browser for the next time I comment.</label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="commentsPost__button text-center">
                  <button type="submit" class="btn btn--styleOne btn--primary it-btn">
                    <span class="btn__text">Send massage</span>
                    <i class="fa-solid fa-heart btn__icon"></i>
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
                  </button>
                </div>
              </div>
            </div>
            <div class="form-response"></div>
          </form>
        </div>
      </div>
      <!-- Contact End -->
      <div id="myMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.594381298903!2d90.42194549999999!3d23.822204699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1644251033908!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
@endsection
