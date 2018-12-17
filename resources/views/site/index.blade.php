@extends('site.layout')

@section('title')
{{ __('Home') }}
@endsection

@section('content')
<header id="home" class="ct-u-colorWhite text-left">
      <div data-adaptiveHeight="true" data-animations="true" data-autoplay="true" data-infinite="true" data-autoplaySpeed="6000" data-draggable="true" data-touchMove="false" data-arrows="true" data-items="1" class="ct-slick ct-js-slick">

            <div data-bg="/site/assets/images/home/bus2.jpg" class="item">
                  <div class="ct-slick-inner">
                        <div class="ct-slick-content">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-7">
                                              <h1 class="ct-textDecoration--underline ct-u-marginBottom60 ct-fw-300">
                                                  <span class="ct-u-text-big text-uppercase">
                                                      Sureticket
                                                  </span>
                                                  Your one stop for tickets
                                              </h1>
                                              <p class="ct-u-marginBottom50">
                                                  No need to hassle. Just book your tickets with us to your favourite
                                                   destinations: Douala, Youande, Buea, Bamenda, etc.
                                              </p>

                                              <a href="basic-package-single.html"
                                                  class="btn btn-lg btn-primary text-uppercase">
                                                  book now
                                              </a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>

            <!-- NEXT SLIDEER -->
            <div data-bg="/site/assets/images/home/bus_main.png" class="item">
                  <div class="ct-slick-inner">
                        <div class="ct-slick-content">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-7">
                                              <h1 class="ct-textDecoration--underline ct-u-marginBottom60 ct-fw-300">
                                                  <span class="ct-u-text-big text-uppercase">
                                                      Sureticket
                                                  </span>
                                                  Fast And Secure
                                              </h1>
                                              <p class="ct-u-marginBottom50">
                                                  Use our service to book your seats in a fast and secure way.
                                                  Pay online and relief yourself from stress
                                              </p>

                                              <a href="{{ route('book') }}"
                                                  class="btn btn-lg btn-default btn-transparent text-uppercase ct-js-btnScroll">
                                                  Try It
                                              </a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>

      </div>
</header>
<br>

<section id="packages" class=" ct-u-backgroundMotive">
  <div class="container">
    <div class="ct-heading--withBorder ct-u-marginBottom70">
      <h4 class="ct-u-colorWhite text-uppercase ct-u-marginBottom10">Slogan</h4>
      <p class="ct-u-colorBlueLight">
          Sure Ticket is here to fascilitate the booking of buses in Cameroon
          From one Division and/or Region and/or town to another.
          <br>
          Try it out.
      </p>
    </div>
    <div class="row">
      <div class="col-md-6">
              <div class="ct-productBox ct-u-marginBottom50">
                <div class="ct-productBox-image">
                  <div class="ct-productBox-imageContainer">
                      <a href="itinerary.html">
                          <img src="/site/assets/images/demo-content/guide-tour/product-image.jpg" alt="Product">
                      </a>
                  </div>
                </div>
                <div class="ct-productBox-Description">
                  <div class="ct-productBox-DescriptionInner">
                      <a href="itinerary.html">
                          <h5 class="text-uppercase ct-u-marginBottom20 ct-fw-700">
                              Pay Online
                          </h5>
                      </a>
                    <p>
                        Book your seat and pay online from your phone.
                        <br>
                        You can use MTN Mobile Money or Orange Money
                    </p>
                  </div>
                  <div class="ct-productBox-Meta">

                  </div>
                </div>
              </div>
      </div>
      <div class="col-md-6">
              <div class="ct-productBox ct-u-marginBottom50">
                <div class="ct-productBox-image">
                  <div class="ct-productBox-imageContainer">
                      <a href="itinerary.html">
                          <img src="/site/assets/images/demo-content/guide-tour/product-image2.jpg" alt="Product"></a>
                      </div>
                </div>
                <div class="ct-productBox-Description">
                  <div class="ct-productBox-DescriptionInner"><a href="itinerary.html">
                      <h5 class="text-uppercase ct-u-marginBottom20 ct-fw-700">Stress Free</h5></a>
                    <p>
                        Sit from your home and get your ticket
                    </p>
                  </div>
                  <div class="ct-productBox-Meta">
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
      </div>
      <div class="col-md-12">
        <div class="ct-latest-deals ct-u-marginBottom70">
          <div class="row">
            <div class="col-sm-3">
              <div class="text-uppercase ct-title">
                  <span class="pull-left ct-fw-700 ct-u-colorMotive">
                      Our Destinations
                  </span>

                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-sm-9">
              <div data-height="96" data-adaptiveHeight="false" data-animations="true" data-autoplay="true" data-infinite="true" data-autoplaySpeed="3000" data-draggable="true" data-touchMove="false" data-arrows="false" data-XSitems="2" data-SMitems="3" data-MDitems="4" data-LGitems="5" data-items="1" class="ct-slick ct-js-slick">
                @foreach(\App\Location::all() as $destination)
                <div class="item">
                  <div class="ct-slick-inner">
                    <div class="ct-slick-content">
                        <a href="#">
                            <span class="ct-deal-price"> {{ $destination->name }}</span>
                        </a>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="ct-u-paddingBoth80">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="col-sm-4">
                <div class="ct-iconBox ct-u-marginBottom20"><a href="rewards.html">
                    <div class="ct-iconBox-icon"><i class="fa fa-eye"></i>
                    </div>
                    <div class="ct-iconBox-description">
                      <h5 class="text-uppercase ct-fw-700 ct-u-colorMotive ct-u-marginBottom20">see &amp; do</h5>
                      <p>Explore the perfect combination of city buzz &amp; peaceful nature</p>
                    </div></a></div>
        </div>
        <div class="col-sm-4">
                <div class="ct-iconBox ct-u-marginBottom20"><a href="rewards.html">
                    <div class="ct-iconBox-icon"><i class="fa fa-cutlery"></i>
                    </div>
                    <div class="ct-iconBox-description">
                      <h5 class="text-uppercase ct-fw-700 ct-u-colorMotive ct-u-marginBottom20">eat &amp; drink</h5>
                      <p>Tasty sea food, modern and crispy  gastronomy &amp; lovely drinks</p>
                    </div></a></div>
        </div>
        <div class="col-sm-4">
                <div class="ct-iconBox ct-u-marginBottom20"><a href="rewards.html">
                    <div class="ct-iconBox-icon"><i class="fa fa-bed"></i>
                    </div>
                    <div class="ct-iconBox-description">
                      <h5 class="text-uppercase ct-fw-700 ct-u-colorMotive ct-u-marginBottom20">night stay</h5>
                      <p>Accommodation and deals for every occasion &amp; budget</p>
                    </div></a></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="ct-popularPages text-center">
            <h6 class="ct-popularPages-title text-uppercase ct-u-marginBottom20 ct-fw-700">popular pages</h6><a href="blog-single.html" class="ct-u-marginBottom20">Day Trips & Excurs, Private and Custom Tours & Much More</a><a href="blog.html" class="btn btn-primary btn-xs text-uppercase">See more</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="ct-popularPages text-center">
            <h6 class="ct-popularPages-title text-uppercase ct-u-marginBottom20 ct-fw-700">popular pages</h6><a href="blog-single.html" class="ct-u-marginBottom20">Multi-Day & Extended Tours, Cultural & Themed Tour</a><a href="blog.html" class="btn btn-primary btn-xs text-uppercase">See more</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="ct-popularPages text-center">
            <h6 class="ct-popularPages-title text-uppercase ct-u-marginBottom20 ct-fw-700">popular pages</h6><a href="blog-single.html" class="ct-u-marginBottom20">Walking & Biking Tours, Sightseeing & Trips Passes</a><a href="blog.html" class="btn btn-primary btn-xs text-uppercase">See more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class=" ct-u-backgroundMotive ct-u-colorWhite">
  <div data-adaptiveHeight="true" data-animations="true" data-autoplay="true" data-infinite="true" data-autoplaySpeed="6000" data-draggable="true" data-touchMove="false" data-arrows="true" data-items="1" class="ct-slick ct-js-slick">
    <div class="item">
      <div class="ct-slick-inner">
        <div class="ct-slick-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2 class="ct-u-marginBottom30">
                  Venice Photography Walking
                  Tour: A Day in the Life of
                  Pisa Tower
                </h2>
              </div>
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-7">
                    <p>Or fly non-stop from Rome by $515 USD</p>
                    <div class="ct-divider--doubleBorder ct-u-marginBoth20"></div>
                    <p class="ct-fw-300">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nunc lacinia vehicula odio vitae rhoncus. Integer
                      accumsan dapibus ornare. Sed maximus viverra ipsum,
                      quis facilisis est pretium ut.
                    </p>
                  </div>
                  <div class="col-md-5 ct-u-paddingBottom70">
                    <div class="ct-productPrice ct-productPrice--circle ct-u-colorMotive"><span>from</span><span class="ct-u-colorMotive ct-productPrice-price"><span class="ct-currency">$</span>589</span><span class="ct-u-marginBottom10">per person</span><a href="itinerary.html" class="btn btn-primary btn-xs text-uppercase">learn more</a></div><img src="/site/assets/images/demo-content/guide-tour/sliderImage2.png" alt="" data-bottom="-5" data-right="-300" class="ct-js-imageOffset">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ct-slick-inner">
        <div class="ct-slick-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2 class="ct-u-marginBottom30">
                  Venice Photography Walking
                  Tour: A Day in the Life of
                  Pisa Tower
                </h2>
              </div>
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-7">
                    <p>Or fly non-stop from Rome by $515 USD</p>
                    <div class="ct-divider--doubleBorder ct-u-marginBoth20"></div>
                    <p class="ct-fw-300">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nunc lacinia vehicula odio vitae rhoncus. Integer
                      accumsan dapibus ornare. Sed maximus viverra ipsum,
                      quis facilisis est pretium ut.
                    </p>
                  </div>
                  <div class="col-md-5 ct-u-paddingBottom70">
                    <div class="ct-productPrice ct-productPrice--circle ct-u-colorMotive"><span>from</span><span class="ct-u-colorMotive ct-productPrice-price"><span class="ct-currency">$</span>589</span><span class="ct-u-marginBottom10">per person</span><a href="#" class="btn btn-primary btn-xs text-uppercase">learn more</a></div><img src="/site/assets/images/demo-content/guide-tour/sliderImage2.png" alt="" data-bottom="-5" data-right="-300" class="ct-js-imageOffset">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section itemscope itemtype="http://schema.org/Blog" class="ct-u-paddingBoth80 ct-blog">
  <div class="container">
    <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
      <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">latest news</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed arcu ac ligula volutpat tincidunt vel ut mauris. Fusce nec ultrices leo.</p>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
              <article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="ct-article ct-fw-600 ct-article--grey"><a href="blog-single.html" itemprop="url"><img src="/site/assets/images/demo-content/guide-tour/blog-mini.jpg" alt="Blog Post" itemprop="image"></a>
                <div class="ct-article-body">
                  <div class="ct-article-title"><a href="blog-single.html" itemprop="url"><h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> Breakfast for two</h5></a></div>
                  <ul class="ct-article-meta list-unstyled list-inline">
                    <li itemprop="dateCreated" class="ct-article-date"><i class="fa fa-calendar"></i>31 March, 2015</li>
                    <li class="ct-article-category"><a href="#" itemprop="url"><i class="fa fa-folder"></i>Food</a></li>
                    <li class="ct-article-tags">
                      <ul class="list-unstyled list-inline text-uppercase">
                        <li><a href="#" itemprop="url">breakfast</a></li>
                        <li><a href="#" itemprop="url">juice</a></li>
                      </ul>
                    </li>
                  </ul>
                  <div itemprop="text" class="ct-article-description">
                    <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a href="blog-single.html" itemprop="url" class="btn-primary btn-xs btn text-uppercase">read article</a>
                  </div>
                </div>
              </article>
      </div>
      <div class="col-sm-6 col-md-3">
              <article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="ct-article ct-fw-600 ct-article--grey"><a href="blog-single.html" itemprop="url"><img src="/site/assets/images/demo-content/guide-tour/blog-mini2.jpg" alt="Blog Post" itemprop="image"></a>
                <div class="ct-article-body">
                  <div class="ct-article-title"><a href="blog-single.html" itemprop="url"><h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> awesome splash park</h5></a></div>
                  <ul class="ct-article-meta list-unstyled list-inline">
                    <li itemprop="dateCreated" class="ct-article-date"><i class="fa fa-calendar"></i>30 March, 2015</li>
                    <li class="ct-article-category"><a href="#" itemprop="url"><i class="fa fa-folder"></i>Fun</a></li>
                    <li class="ct-article-tags">
                      <ul class="list-unstyled list-inline text-uppercase">
                        <li><a href="#" itemprop="url">trampoline</a></li>
                        <li><a href="#" itemprop="url">park</a></li>
                      </ul>
                    </li>
                  </ul>
                  <div itemprop="text" class="ct-article-description">
                    <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a href="blog-single.html" itemprop="url" class="btn-primary btn-xs btn text-uppercase">read article</a>
                  </div>
                </div>
              </article>
      </div>
      <div class="clearfix visible-sm"></div>
      <div class="col-sm-6 col-md-3">
              <article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="ct-article ct-fw-600 ct-article--grey"><a href="blog-single.html" itemprop="url"><img src="/site/assets/images/demo-content/guide-tour/blog-mini3.jpg" alt="Blog Post" itemprop="image"></a>
                <div class="ct-article-body">
                  <div class="ct-article-title"><a href="blog-single.html" itemprop="url"><h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> traditional dance</h5></a></div>
                  <ul class="ct-article-meta list-unstyled list-inline">
                    <li itemprop="dateCreated" class="ct-article-date"><i class="fa fa-calendar"></i>29 March, 2015</li>
                    <li class="ct-article-category"><a href="#" itemprop="url"><i class="fa fa-folder"></i>Tradition</a></li>
                    <li class="ct-article-tags">
                      <ul class="list-unstyled list-inline text-uppercase">
                        <li><a href="#" itemprop="url">dance</a></li>
                        <li><a href="#" itemprop="url">fun</a></li>
                      </ul>
                    </li>
                  </ul>
                  <div itemprop="text" class="ct-article-description">
                    <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a href="blog-single.html" itemprop="url" class="btn-primary btn-xs btn text-uppercase">read article</a>
                  </div>
                </div>
              </article>
      </div>
      <div class="col-sm-6 col-md-3">
              <article itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="ct-article ct-fw-600 ct-article--grey"><a href="blog-single.html" itemprop="url"><img src="/site/assets/images/demo-content/guide-tour/blog-mini4.jpg" alt="Blog Post" itemprop="image"></a>
                <div class="ct-article-body">
                  <div class="ct-article-title"><a href="blog-single.html" itemprop="url"><h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> pisa tower day</h5></a></div>
                  <ul class="ct-article-meta list-unstyled list-inline">
                    <li itemprop="dateCreated" class="ct-article-date"><i class="fa fa-calendar"></i>28 March, 2015</li>
                    <li class="ct-article-category"><a href="#" itemprop="url"><i class="fa fa-folder"></i>Pisa</a></li>
                    <li class="ct-article-tags">
                      <ul class="list-unstyled list-inline text-uppercase">
                        <li><a href="#" itemprop="url">tower</a></li>
                        <li><a href="#" itemprop="url">sight</a></li>
                      </ul>
                    </li>
                  </ul>
                  <div itemprop="text" class="ct-article-description">
                    <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a href="blog-single.html" itemprop="url" class="btn-primary btn-xs btn text-uppercase">read article</a>
                  </div>
                </div>
              </article>
      </div>
      <div class="clearfix visible-sm"></div>
    </div>
  </div>
</section>
@endsection
