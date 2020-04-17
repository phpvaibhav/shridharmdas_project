<?php $frontend_assets =  base_url().'frontend_assets/';?>
  <!-- Intro -->
  <section id="intro">
    <div class="overlay overlay-bg"></div>
    <div class="owl-carousel">
      <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/316.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
          <!--  <h1>Shinto Believes in Kami</h1> -->
          <h1></h1>
          <p></p>
          <br>
          <p></p>
          <!--    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here. </p> -->
          <!--   <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a> -->
          </div>
          <a href="<?= base_url(); ?>user-step-1" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div>
            <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/316.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
            <!--  <h1>Shinto Believes in Kami</h1> -->
            <h1></h1>
            <p></p>
            <br>
            <p></p>
         <!--    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here. </p> -->
          <!--   <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a> -->
          </div>
          <a href="<?= base_url(); ?>user-step-1" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div>
      
<!--       <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/img2.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
             <h1></h1>
              <p></p>

              <br>

              <p></p>
       
          </div>
          <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div> -->
<!--       <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/img3.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
             <h1></h1>
              <p></p>

              <br>

              <p></p>

          </div>
          <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div> -->
<!-- 
      <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/img4.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
             <h1></h1>
              <p></p>

              <br>

              <p></p>
       
          </div>
          <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div> -->

<!--       <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/img5.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
             <h1></h1>
              <p></p>

              <br>

              <p></p>
        
          </div>
          <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div>
 -->

     <!--  <div class="item section-padding" style="background-image:url(<?= $frontend_assets.'images/slider/img6.png'; ?>);width: 100%;background-size:100% 100%;background-repeat:no-repeat;">
        <div class="container">
          <div class="intro_text white_text">
             <h1></h1>
              <p></p>

              <br>

              <p></p>
       
          </div>
          <a href="<?= base_url(); ?>user-form" class="btn dark-btn tilak-top-btn">User Form</a>
        </div>
      </div>
 -->

    </div>
  </section>
  <!-- /Intro -->

  <!-- Next-Events-Sermons -->
<!--     <section class="latest_event_sermons home-sermon">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="box_wrap next_sermons">
              <p class="subtitle">Latest Sekkyos</p>
              <h4><a href="sermon-detail.html">Shinto — “the way of the kami”</a></h4>
              <ul class="sermons_meta">
                <li><i class="fa fa-user"></i> Message from <a href="our-teachers.html"> Mabuchi</a></li>
                <li><i class="far fa-calendar-alt"></i> sep 03, 2019</li>
              </ul>
              <div class="sermons_inside">
                <ul>
                  <li><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fab fa-youtube"></i></a></li>
                  <li><a href="#" data-toggle="modal" data-target="#pdfmodal"><i class="far fa-file-pdf"></i></a></li>
                  <li><a href="#" data-toggle="modal" data-target="#sharemodal"><i class="fa fa-share-alt"></i></a></li>
                </ul>
              </div>
              <div class="audio-player">
                <div id="play-btn">
                  <i class="fa fa-play"> </i>
                  <i class="fa fa-pause"></i>
                </div>
                <div class="audio-wrapper" id="player-container">
                  <audio id="player" ontimeupdate="initProgressBar()">
                  </audio>
                </div>
                <div class="player-controls scrubber">
                  <small class="end-time">5:44</small>
                  <span id="seekObjContainer"> <progress id="seekObj" value="0" max="1"></progress> </span>
                  <i class="fa fa-volume-up"></i>
                </div>
                <div class="next_prev">
                  <i class="fa fa-angle-left"></i>
                  <i class="fa fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box_wrap video-bg home-video">
              <div class="video-content">
                <div class="video_icon">
                  <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto">
                    <i class="fas fa-play"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- /Next-Events-Sermons -->

    <!-- About -->
<!--     <section class="about_intro section-padding position-relative">
      <div class="custom-img-left">
        <img src="assets/images/img-left.png" alt="img" class="img-fluid">
      </div>
      <div class="custom-img-right">
        <img src="assets/images/img-right.png" alt="img" class="img-fluid">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="about-us-content">
            <div class="section-header">
              <h2>some important life lessons from God <u class="text-custom-primary">Kami</u></h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
              book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum.</p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="feature-main-block">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="features_wrap custom-md-mb feature-bottom-space feature-h1 features-after-none">
                <div class="f-f-icon"><img src="https://via.placeholder.com/64x64" alt="img"></div>
                <h4 class="text-custom-secondary">Meditation</h4>
                <p class="mb-0">Uncover many web sites still in their infancy.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="features_wrap custom-md-mb feature-bottom-space feature-h1 features-after-none">
                <div class="f-f-icon"><img src="https://via.placeholder.com/64x64" alt="img"></div>
                <h4 class="text-custom-secondary">Community</h4>
                <p class="mb-0">Uncover many web sites still in their infancy.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="features_wrap custom-sm-mb feature-h1 features-after-none">
                <div class="f-f-icon"><img src="https://via.placeholder.com/64x64" alt="img"></div>
                <h4 class="text-custom-secondary">Philosophy</h4>
                <p class="mb-0">Uncover many web sites still in their infancy.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="features_wrap feature-h1 features-after-none">
                <div class="f-f-icon"><img src="https://via.placeholder.com/64x64" alt="img"></div>
                <h4 class="text-custom-secondary">Peace</h4>
                <p class="mb-0">Uncover many web sites still in their infancy.</p>
              </div>
            </div>
          </div>
           </div>
        </div>
        </div>
        
      </div>
    </section> -->
    <!-- /About -->

  <!-- Causes -->
<!--   <section id="causes" class="section-padding gray_bg">
    <div class="container">
      <div class="owl-carousel">
        <div class="item">
          <div class="causes_info">
            <p class="subtitle text-white">Shintois'm Preaching</p>
            <h3 class="white_text">The Mind is everything</h3>
            <p class="white_text mb-0">A Karma-yogi performs action by body, mind, intellect, and senses, without attachment (or ego), only for self-purification."</p>
          </div>
        </div>
        <div class="item">
          <div class="causes_info">
            <p class="subtitle text-white">Shintois'm Preaching</p>
            <h3 class="white_text">Shinto-The Symbol Of peace</h3>
            <p class="white_text mb-0">Meet this transient world with neither grasping nor fear,trust the unfolding of life,and you will attain true serenity.</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- /Causes -->

  <!-- Latest-Events-Sermons -->
<!--   <section class="section-padding latest_event_sermons m-0">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-5">
          <div class="heading">
            <h3>Latest Ibentos</h3>
            <div class="tl-slider-arrow float-right">
              <div class="tl-left-arrow slick-arrow mr-2" style="">
                <span><i class="fa fa-chevron-up"></i></span>
              </div>
              <div class="tl-right-arrow slick-arrow" style="">
                <span><i class="fa fa-chevron-down"></i></span>
              </div>
            </div>
          </div>
          <div class="event_list event-slider slick-vertical">
            <div class="event-slider-item pb-4">
              <div class="row">
                <div class="col-12">
                  <div class="event-list">
                    <ul>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>02</span> sep'20
                          </div>
                          <h6><a href="event-detail.html">Oshogatsu(New Year)</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> Sunday (8:00 am -9:00 am)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>17</span> Feb'20
                          </div>
                          <h6><a href="event-detail.html"> Toshigoi(Rice Harvest)</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> tuesday (9:00 am -8:00 pm)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>15</span> jan'20
                          </div>
                          <h6><a href="event-detail.html"> Dōsojin(Shrine decorations)</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> Sunday (8:00 pm -9:00 pm)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>

                </div>
              </div>

            </div>

            <div class="event-slider-item pb-4">
              <div class="row">
                <div class="col-12">
                  <div class="event-list">
                    <ul>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>08</span> Apr'20
                          </div>
                          <h6><a href="event-detail.html">Hana Matsuri(Flower Festival)</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> Sunday (8:00 am -9:00 am)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>22</span> Dec'20
                          </div>
                          <h6><a href="event-detail.html">Tohji-Taisai</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> tuesday (9:00 am -8:00 pm)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <div class="event_info">
                          <div class="event_date">
                            <span>15</span> jan'20
                          </div>
                          <h6><a href="event-detail.html"> Dōsojin(Shrine decorations)</a></h6>
                          <ul>
                            <li><i class="far fa-clock"></i> Sunday (8:00 pm -9:00 pm)</li>
                            <li><i class="fas fa-map-marker-alt"></i>4873 Pretty View Lane Tokyo</li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-5 offset-lg-2">
          <div class="heading">
            <h3>Latest Sekkyos</h3>
            <a href="sermon.html" class="btn btn-sm btn-outline float-right">See All</a>
          </div>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h6 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    To be fully alive is to have an aesthetic </a>
                </h6>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="sermons_meta">
                    <li><i class="fa fa-user"></i> Message from <a href="our-teachers.html">Mabuchi</a></li>
                    <li><i class="far fa-calendar-alt"></i> sep 03, 2019</li>
                  </ul>
                  <div class="sermons_inside">
                    <ul>
                      <li><a href="#" data-toggle="modal" data-target="#audiomodal"><i class="fa fa-music"></i></a></li>

                      <li><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fab fa-youtube"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#pdfmodal"><i class="far fa-file-pdf"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#sharemodal"><i class="fa fa-share-alt"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h6 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Purification in Shinto lifts the burden</a>
                </h6>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <ul class="sermons_meta">
                    <li><i class="fa fa-user"></i> Message from <a href="our-teachers.html">Mabuchi</a></li>
                    <li><i class="far fa-calendar-alt"></i> Aug 30, 2019</li>
                  </ul>
                  <div class="sermons_inside">
                    <ul>
                      <li><a href="#" data-toggle="modal" data-target="#audiomodal"><i class="fa fa-music"></i></a></li>

                      <li><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fab fa-youtube"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#pdfmodal"><i class="far fa-file-pdf"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#sharemodal"><i class="fa fa-share-alt"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h6 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shinto is essentially a religion of gratitude.</a>
                </h6>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <ul class="sermons_meta">
                    <li><i class="fa fa-user"></i> Message from <a href="our-teachers.html">Mabuchi</a></li>
                    <li><i class="far fa-calendar-alt"></i> sep 02, 2019</li>
                  </ul>
                  <div class="sermons_inside">
                    <ul>
                      <li><a href="#" data-toggle="modal" data-target="#audiomodal"><i class="fa fa-music"></i></a></li>

                      <li><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fab fa-youtube"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#pdfmodal"><i class="far fa-file-pdf"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#sharemodal"><i class="fa fa-share-alt"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingfour">
                <h6 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Japanese mind is synonymous with Shinto mind.</a>
                </h6>
              </div>
              <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                <div class="panel-body">
                  <ul class="sermons_meta">
                    <li><i class="fa fa-user"></i> Message from <a href="our-teachers.html">Mabuchi</a></li>
                    <li><i class="far fa-calendar-alt"></i> sep 03, 2019</li>
                  </ul>
                  <div class="sermons_inside">
                    <ul>
                      <li><a href="#" data-toggle="modal" data-target="#audiomodal"><i class="fa fa-music"></i></a></li>

                      <li><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fab fa-youtube"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#pdfmodal"><i class="far fa-file-pdf"></i></a></li>

                  <li><a href="#" data-toggle="modal" data-target="#sharemodal"><i class="fa fa-share-alt"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- /Latest-Events-Sermons -->

  <!-- Donation-img section -->
 <!--  <section class="section-padding secondary-bg donation-img-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="section-header">
            <h3>What we Belive in</h3>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
          </div>
          <h4>About Shinto God</h4>
          <p>Aliquam nec sem vulputate, sagittis felis id, semper nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
            veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
          <p>We provide Buddhism and meditation resources. We try to make our classes relaxed, informal and interactive,
            and relevant to ordinary people leading ordinary lives. You do not have to be a Buddhist or become a Buddhist or anything else in order to attend our classes.</p>
            <a href="#" class="btn-link tk-btn-link"><u>Read More <i class="fa fa-angle-right"></i></u></a>
        </div>

        <div class="col-md-6 align-self-center img-width-100">
          <img src="https://via.placeholder.com/540x600" alt="img" class="img-fluid">
        </div>
      </div>
    </div>

  </section> -->
  <!-- /Donation-img section -->

  <!-- Call to Action -->
<!--   <section class="section-padding call-action-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="call-content mx-auto text-center event-content">
            <p class="subtitle text-white">Upcoming Ibentos</p>
            <h3 class="text-white fs-36">Festival Of Flowers Hana Matsuri 2020</h3>
            <p class="text-white">Meet this transient world with neither grasping nor fear,trust the unfolding of life,and you will attain true serenity.</p>
          </div>
          <div class="timer event-timer">
            <div id="countdown"></div>
            <a href="#" class="btn dark-btn margin-top-30">Register Now</a>
          </div>
        </div>

      </div>
    </div>

  </section> -->
  <!-- /Call to Action -->

  <!-- Testimonials -->
<!--   <section class="our_testimonials section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <img src="https://via.placeholder.com/540x600" alt="" class="img-fluid Mb_20">
        </div>
        <div class="col-md-6 align-self-center">
          <div class="about_company">
            <div class="section-header">
              <h3>Our History</h3>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
            </div>
            <ul class="nav nav-tabs testi-nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">1980</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">1990</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">2000</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu3">2010</a>
              </li>
            </ul>

          
            <div class="tab-content">
              <div id="home" class="container tab-pane active pl-0 pr-0"><br>
                <h4>1980</h4>
                <p>Aliquam nec sem vulputate, sagittis felis id, semper nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                  veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                <a href="#" class="btn-link tk-btn-link"><u>Learn More <i class="fa fa-angle-right"></i></u></a>
              </div>
              <div id="menu1" class="container tab-pane fade pl-0 pr-0"><br>
                <h4>1990</h4>
                <p>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                  Phasellus viverra nulla ut metus varius laoreet. Nam ornare pellentesque tortor.</p>
                <a href="#" class="btn-link tk-btn-link"><u>Learn More <i class="fa fa-angle-right"></i></u></a>
              </div>
              <div id="menu2" class="container tab-pane fade pl-0 pr-0"><br>
                <h4>2000</h4>
                <p>Aliquam nec sem vulputate, sagittis felis id, semper nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                  veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                <a href="#" class="btn-link tk-btn-link"><u>Learn More <i class="fa fa-angle-right"></i></u></a>
              </div>
              <div id="menu3" class="container tab-pane fade pl-0 pr-0"><br>
                <h4>2010</h4>
                <p>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                  Phasellus viverra nulla ut metus varius laoreet. Nam ornare pellentesque tortor.</p>
                <a href="#" class="btn-link tk-btn-link"><u>Learn More <i class="fa fa-angle-right"></i></u></a>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section> -->
  <!-- /Testimonials -->

  <!-- Donation form -->
<!--   <section class="section-padding pb-0 donation-form-section secondary-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="donate-us">
            <div class="section-header mx-auto text-center">
              <h3>Support Our Mission</h3>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
            </div>

            <div class="donation_form">
              <form>
                <div class="form-group mb-0">
                  <div class="row">
                    <div class="col-md-12 col-lg-12">
                      <div class="input-group mx-auto">

                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="text" class="form-control w-auto mb-0" value="$100">

                      </div>
                      <ul class="select_amount">
                        <li class="mb-0">$10.00</li>
                        <li class="mb-0">$25.00</li>
                        <li class="mb-0">$50.00</li>
                        <li class="mb-0 active">$100.00</li>
                        <li class="mb-0">$500.00</li>
                      </ul>
                      <input type="submit" class="btn btn-outline" value="Donate Now">
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section> -->
  <!-- /Donation form -->

  <!-- Latest-Blog -->
<!--   <section class="latest_blog secondary-bg section-padding" id="blog">
    <div class="container">
      <div class="blog">
        <div class="section-header-center text-center">
          <h3>Latest News</h3>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="owl-carousel blog-slider">
              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>03</strong>Dec
                    </div>
                    <div class="blog_img ">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Meditation</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Shinto festival carries old tradition across city</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>13</strong>Jan
                    </div>
                    <div class="blog_img">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Yoga</a></span>
                        <span><a href="#">Books</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Spectacular Pictures From 2019 Shinto Festival</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>31</strong>Dec
                    </div>
                    <div class="blog_img">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Meditation</a></span>
                        <span><a href="#">Peace</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Emperor performs ritual to report abdication</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>04</strong>Nov
                    </div>
                    <div class="blog_img">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Enlightment</a></span>
                        <span><a href="#">Peace</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Shinto festival carries old tradition across city</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>13</strong>Nov
                    </div>
                    <div class="blog_img">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Meditation</a></span>
                        <span><a href="#">Books</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Spectacular Pictures From 2019 Shinto Festival</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="item">
                <article class="blog-section">
                  <div class="blog_wrap position-relative">
                    <div class="blog-post-date">
                      <strong>20</strong>Dec
                    </div>
                    <div class="blog_img">
                      <a href="blog-detail.html"><img src="https://via.placeholder.com/570x300" alt="image"></a>
                    </div>
                    <div class="blog_info">
                      <div class="post_meta">
                        <span><a href="#">Buddha</a></span>
                        <span><a href="#">Enlightment</a></span>
                      </div>
                      <h5><a href="blog-detail.html">Emperor performs ritual to report abdication</a></h5>
                      <p>You need to be sure there isn't anything embarrassing hidden in the middle of text.
                        All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                      <a href="blog-detail.html" class="btn btn-outline">Read More <i class="fa fa-caret-right"></i> </a>
                    </div>
                  </div>
                </article>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section> -->
  <!-- Latest-Blog -->
<!-- 
  <section class="section-padding pb-0">
    <div class="container">
      <div class="section-header-center text-center">
        <h3>Instagram</h3>
        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
      </div>
    </div>
    <ul class="hm-list hm-instagram">
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
      <li>
        <a href="#"><img src="https://via.placeholder.com/222x222" alt="instagram"></a>
      </li>
    </ul>
  </section> -->

  <!-- Contact-Us -->
  <!-- <section class="section-padding">
    <div class="container">
       <div class="section-header-center text-center">
          <h3>Contact us</h3>
      
        </div>
      <div class="contact_wrap">
        <div class="row">

          <div class="col-md-12">
            <div class="form_wrap">
              <form>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Your Full Name</label>
                          <input type="text" class="form-control" name="Name" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Your Email</label>
                          <input type="email" class="form-control" name="email" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Your Subject</label>
                          <input type="text" class="form-control" name="subject" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Your Message</label>
                        <textarea name="message" cols="45" rows="3" class="form-control" required=""></textarea>
                        </div>
                    </div>
                 </div>
                <div class="form-group">
                  <input class="btn btn-outline" value="Submit" type="submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- /Contact-Us -->