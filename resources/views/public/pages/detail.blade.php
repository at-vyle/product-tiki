@extends('public.layout.master')
@section('title', __('user/master.title.detail'))
@section('css')
  <link href="/css/public/custom.css" rel="stylesheet">
@endsection
@section('content')
<!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li><a href="{{ route('user.home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>@lang('user/layout.home')</a></li>
        <li class="active">@lang('user/product.single_page')</li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
  <div class="products">
    <div class="container">
      <div class="agileinfo_single">
        <div class="col-md-4 ">
          <div class="agileinfo_single_left">

          </div>
          <div class="sub-images">
            <ul class="sub-images-list">

            </ul>
          </div>
        </div>
        <div class="col-md-8 agileinfo_single_right">
        <h2></h2>
          <div class="rating1">
            <span class="starRating">

            </span>
            <!-- ID  XRATING -->
          </div>
          <div class="w3agile_description">
            <h4>@lang('user/product.show.description') :</h4>
            <p></p>
          </div>
          <div class="snipcart-item block">
            <div class="snipcart-thumb agileinfo_single_right_snipcart">
              <h4 class="m-sing"></h4>
            </div>
            <div class="snipcart-details agileinfo_single_right_details">
              <form action="#" method="post">
                <fieldset>
                  <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="add" value="1">
                  <input type="hidden" name="business" value="">
                  <input type="hidden" name="item_name" value="">
                  <input type="hidden" name="amount" value="">
                  <input type="hidden" name="discount_amount" value="">
                  <input type="hidden" name="currency_code" value="USD">
                  <input type="hidden" name="return" value="">
                  <input type="hidden" name="cancel_return" value="">
                  <input type="submit" name="submit" value="Add to cart" class="button">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <div class="review">
    <div class="container review-background">
      <h3 class="js-customer-h3" style="display: block;font-size: 30px;text-align:  center;">Gửi nhận xét của bạn</h3>
      <div class="product-customer-col-4 js-customer-col-4" style="display: block;">
        <form action="" method="post" id="addReviewFrm" novalidate="novalidate" class="bv-form"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
          <input type="hidden" name="entity_pk_value" value="917986" id="entity_pk_value">
          <input type="hidden" name="productset_id" value="58" id="productset_id">
          <div class="rate form-group has-feedback" id="rating_wrapper">
            <label>1. Đánh giá của bạn về sản phẩm này:</label>
            <div class="rating1">
              <span class="starRating">
                <input id="rating5" type="radio" name="rating" value="5">
                <label for="rating5">5</label>
                <input id="rating4" type="radio" name="rating" value="4">
                <label for="rating4">4</label>
                <input id="rating3" type="radio" name="rating" value="3" checked="checked">
                <label for="rating3">3</label>
                <input id="rating2" type="radio" name="rating" value="2">
                <label for="rating2">2</label>
                <input id="rating1" type="radio" name="rating" value="1">
                <label for="rating1">1</label>
              </span>
            </div>
            <small class="help-block" data-bv-validator="callback" data-bv-for="rating_star" data-bv-result="NOT_VALIDATED" style="display: none;">Vui lòng chọn đánh giá của bạn về sản phẩm này.</small><small class="help-block" data-bv-validator="integer" data-bv-for="rating_star" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid number</small></div>
            <div class="review-content form-group has-feedback has-error">
              <label for="review_detail">2. Viết nhận xét của bạn vào bên dưới:</label>
              <textarea placeholder="Nhận xét của bạn về sản phẩm này" class="form-control" name="detail" id="review_detail" cols="30" rows="10" data-bv-field="detail"></textarea><i class="form-control-feedback fa fa-close" data-bv-icon-for="detail" style="display: block;"></i>
              <small class="help-block" data-bv-validator="callback" data-bv-for="detail" data-bv-result="INVALID" style="display: block;">Nội dung chứa ít nhất 50 ký tự</small>
            </div>
            <div class="action">
              <div class="word-counter"></div>
              <button onclick="review(event);" class="btn btn-default btn-add-review ">Gửi nhận xét</button>
            </div>
            <script>
              function review(e) {
                e.preventDefault();
                str = '';
                str += (document.getElementById('review_detail').value);
                for (let i = 1; i<=5;i++) {
                  if(document.getElementById('rating'+i).checked) {
                    str += '\n'+ (document.getElementById('rating'+i).value);
                    break;
                  }
                }
                alert(str);
              }
            </script>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="product-review-box">
    <div class="container review-background">
      <div class="product-review-content">
        <div id="product-review-box">
      <div data-reactroot="">
      <div class="review-filter">
        <span>Chọn xem nhận xét</span>
        <div class="btn-group dropdown">
          <button class="btn btn-default btn-sm dropdown-toggle font-14" type="button" data-toggle="dropdown" aria-expanded="false"><span class="title">Hữu ích</span><span class="caret"></span></button>
          <ul class="sort-list dropdown-menu" role="menu">
            <li class="selected" data-parent-index="0" data-index="0"><a href="javascript:void(0);">Hữu ích</a></li>
            <li class="" data-parent-index="0" data-index="1"><a href="javascript:void(0);">Mới nhất</a></li>
          </ul>
        </div>
        <div class="btn-group dropdown">
          <button class="btn btn-default btn-sm dropdown-toggle font-14" type="button" data-toggle="dropdown" aria-expanded="false"><span class="title">Tất cả sao</span><span class="caret"></span></button>
          <ul class="sort-list dropdown-menu" role="menu">
            <li class="selected" data-parent-index="2" data-index="0"><a href="javascript:void(0);">Tất cả sao</a></li>
            <li class="" data-parent-index="2" data-index="1"><a href="javascript:void(0);">5 sao</a></li>
            <li class="" data-parent-index="2" data-index="2"><a href="javascript:void(0);">4 sao</a></li>
            <li class="" data-parent-index="2" data-index="3"><a href="javascript:void(0);">3 sao</a></li>
            <li class="" data-parent-index="2" data-index="4"><a href="javascript:void(0);">2 sao</a></li>
            <li class="" data-parent-index="2" data-index="5"><a href="javascript:void(0);">1 sao</a></li>
            <li class="" data-parent-index="2" data-index="6"><a href="javascript:void(0);">Hài lòng</a></li>
            <li class="" data-parent-index="2" data-index="7"><a href="javascript:void(0);">Chưa hài lòng</a></li>
          </ul>
        </div>
      </div>
      <div class="review-list" id="posts-list">

      </div>
    </div>
  </div>
</div>
</div>
<!-- new -->
  <div class="newproducts-w3agile">
    <div class="container">
      <h3>{{ __('user/index.title-new-offers') }}</h3>
        <div class="agile_top_brands_grids">
          <div id="top4"></div>
        <div class="clearfix"> </div>
    </div>
  </div>
<!-- //new -->
@endsection
@section('js')
<script src="/js/public/details.js"></script>
<script src="/js/public/posts.js"></script>
@endsection
