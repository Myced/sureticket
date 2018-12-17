<footer class="ct-u-backgroundMotive ct-u-colorWhite">
  <div class="ct-prefooter">
    <div class="container">
      <div class="ct-prefooter-inner  ct-u-relative ct-u-paddingTop80 ct-u-paddingBottom50">
          <a href="#home" class="btn-toTop ct-js-btnScroll"><i class="fa fa-angle-up ct-js-btnScroll"></i></a>
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="widget widget-contact">
              <div class="widget-inner">
                  <h4 class="text-uppercase">Contact Us</h4>
                  <div class="ct-divider--doubleBorder ct-u-marginBoth20"></div>
                <ul class="list-inline list-unstyled">
                  <li>
                      <a href="https://www.google.pl/maps/place/Con+Brio+Blvd,+Upper+Coomera+QLD+4209,+Australia/@-27.875425,153.2992508,17z/data=!3m1!4b1!4m2!3m1!1s0x6b91115395fd91fb:0x90a661613552390e">
                          <i class="fa fa-map-marker"></i>
                          Con Brio Boulevard, Upper Coomera QLD 4209, Australia
                      </a>
                  </li>
                  <li><i class="fa fa-phone"></i>Phone:<a href="tel:(012)345-6789"> (012) 345-6789</a></li>
                  <li><i class="fa fa-envelope"></i>Mail:<a href="mailto:ticketstours@info.com"> tickets&amp;tours@info.com</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="widget widget-recentPosts">
              <div class="widget-inner">

                  <h4 class="">Quick Links</h4>
                  <div class="ct-divider--doubleBorder ct-u-marginBoth20"></div>

                <ul class="list-unstyled text-capitalize">
                  <li><a href="#">About Us</a></li>
                  <li><a href="{{ route('book') }}">Book</a></li>
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">Agencies</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="widget widget-tags">
              <div class="widget-inner">
                  <h4 class="">Subscribe</h4>
                  <div class="ct-divider--doubleBorder ct-u-marginBoth20"></div>

                <ul class="list-inline list-unstyled text-capitalize">
                    <li>
                        <form action="{{ route('email.subscribe') }}" method="POST" class="ct-u-marginBottom30">
                            @csrf
                          <div class="input-group input--withIcon">
                              <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                <input type="email" required="" name="email" class="form-control input-lg"
                                placeholder="Enter Email Address">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-transparent text-uppercase"
                                        type="submit">
                                        Subscribe
                                    </button>
                                </span>
                          </div>
                        </form>
                    </li>

                    <li>
                        <a href="#">Privacy Policy</a>

                        |

                        <a href="#">Terms of Service</a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="ct-postfooter text-center"><span>&#169; Copyright 2018 - {{ date('Y') }}. All Rights Reserved</span></div>
  </div>
</footer>
