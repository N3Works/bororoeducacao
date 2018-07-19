@extends('layouts.app')

@push('styles')
<link href="{{ asset('theme/vendor/cubeportfolio/css/cubeportfolio.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!--========== PROMO BLOCK ==========-->
<section class="g-fullheight dzsparallaxer auto-init height-is-based-on-content use-loading" data-options="{direction: 'reverse'}">
  <div class="s-parallax__size g-bg-position--center divimage dzsparallaxer--target" data-src="../img/1920x1080/14.jpg">
  </div>
  <div class="g-container--sm g-z-index--1 g-text-center g-ver-center g-margin-t-40">
    <p class="text-uppercase g-font-size-12 g-font-weight--700 g-font-family--open-sans g-color--sepia g-letter-spacing--2 g-margin-b-20">A digital creative studio</p>
    <div class="g-margin-b-60">
      <h1 class="g-font-size-32 g-font-size-50--sm g-font-size-55--md g-font-size-60--lg g-font-weight--700 g-color--white">Recent work</h1>
    </div>
    <a href="hire.html" class="text-uppercase s-btn-v2 s-btn-v2--white-brd g-font-size-11 g-font-size-13--md g-font-weight--700 g-font-family--open-sans g-letter-spacing--3 g-padding-x-30 g-padding-x-40--md g-padding-y-15">Hire us</a>
  </div>
  <a href="#js__scroll-to-section" class="s-scroll-to-section-v1 icon-Down"></a>
</section>
<!--========== END PROMO BLOCK ==========-->

<!--========== PAGE CONTENT ==========-->
<!-- Parallax -->
<div class="g-bg-color--white  auto-init height-is-based-on-content">
  <!-- Work -->
  <div id="js__scroll-to-section" class="container g-padding-y-80 g-padding-y-100--sm">
    <!-- Work Filters -->
    <div id="js__filters-work" class="g-text-center g-margin-b-60">
      <div data-filter="*" class="s-link-v1 s-work-v2__filter-item g-radius--50 cbp-filter-item-active cbp-filter-item">All.</div>
      <div data-filter=".graphic" class="s-link-v1 s-work-v2__filter-item g-radius--50 cbp-filter-item">Graphic.</div>
      <div data-filter=".logos" class="s-link-v1 s-work-v2__filter-item g-radius--50 cbp-filter-item">Logo.</div>
      <div data-filter=".motion" class="s-link-v1 s-work-v2__filter-item g-radius--50 cbp-filter-item">Motion.</div>
    </div>
    <!-- End Work Filters -->

    <!-- Work Grid -->
    <div id="js__grid-work" class="g-margin-b-80 cbp">
      <!-- Item -->
      <div class="s-work-v2__item cbp-item motion graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h2 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h2>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h3 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h3>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos motion">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item motion graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos motion">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item motion graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos graphic">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- Item -->
      <div class="s-work-v2__item cbp-item logos motion">
        <div class="s-work-v2__img-effect">
          <img class="s-work-v2__img" src="images/600x650.jpg" alt="Work Image">
          <a href="work_inner.html" class="g-wrap-link"></a>
        </div>
        <div class="s-work-v2__caption-info">
          <h4 class="g-font-size-18 g-color--gold g-margin-b-5">Work Item</h4>
          <p class="g-color--white-opacity g-margin-b-0">by Prothemes Inc.</p>
        </div>
      </div>
      <!-- End Item -->
    </div>
    <!-- End Work Grid -->
  </div>
  <!-- End Work -->
</div>
<!-- End Parallax -->

<!-- Pagination v1 -->
<div class="container g-margin-b-80 g-margin-b-120--sm">
  <nav aria-label="Page navigation" class="g-text-right">
    <ul class="s-pagination-v1">
      <li class="s-pagination-v1__item">
        <a class="s-pagination-v1__link" href="#" aria-label="Previous">
        <span aria-hidden="true">Prev</span>
        </a>
      </li>
      <li class="s-pagination-v1__item"><a class="s-pagination-v1__link -is-active" href="#">1</a></li>
      <li class="s-pagination-v1__item"><a class="s-pagination-v1__link" href="#">2</a></li>
      <li class="s-pagination-v1__item"><a class="s-pagination-v1__link" href="#">3</a></li>
      <li class="s-pagination-v1__item">
        <a class="s-pagination-v1__link" href="#" aria-label="Next">
        <span aria-hidden="true">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
<!-- End Pagination v1 -->
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('theme/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/js/corporate/work-3-col.min.js') }}"></script>
<script>
    $(function () {
        
    });
</script>
@endpush