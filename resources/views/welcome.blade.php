@extends('layouts.app')

@section('content')
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="https://media.istockphoto.com/photos/asian-chinese-female-doctor-working-on-medical-report-with-laptop-and-picture-id1309783183?b=1&k=20&m=1309783183&s=170667a&w=0&h=M9TeQBEjvv5b0E4SINbc5oFkTBYmi7-eo3RTTBDHjdk=" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left" style="color: white">
                            <h1>Expertise You Can Trust.</h1>
                            <p>Care Expert is a tailored product that provides the reassurance of an orchestrated multidisciplinary approach to health care. The health inspection is done at a set fee by the specialist and the clinic.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="https://media.istockphoto.com/photos/healthcare-workers-portrait-picture-id1284636209?b=1&k=20&m=1284636209&s=170667a&w=0&h=j_vm0DELoS5ZhzbqYAI60nHoO57jHlrGIyLgqBs6Wyg=" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Coronavirus Disease.</h1>
                            <h2>COVID-19</h2>
                            <p style="color:#0d08f6">To protect yourself against severe COVID-19 infection, we urge our community to vaccinate. Visit the portal for more information on COVID-19 vaccination or to book your appointment at a Kwano Health vaccination centre. This is Our best <b>Shot</b> at a healthy future..</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="https://mediclinic.scene7.com/is/image/mediclinic/COVID-19-portal?_ck=1635930185897&wid=768&hei=512&dpr=off" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h1>Coronavirus Disease.</h1>
                            <h2>COVID-19</h2>
                            <p>For more information and access to the COVID-19 online assessment for testing, click here.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="https://www.expatica.com/app/uploads/sites/12/2014/05/Dentist.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Specialized Dental Care</h2>
                    <p>Specialized dental care is related to intensive care for specific tooth and periodontal problems.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="https://health.farlobix.co.za/wp-content/uploads/2019/09/1-1.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Body Scan</h2>
                    <p>Wellness Assessment- Body Scan by our trustable Scanner- Energy Level Indicative Monitor –ELIM</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="https://mediclinic.scene7.com/is/image/mediclinic/MCSA-Baby-Awareness-Banner-Online-Courses2?_ck=1635930185897&wid=769&hei=512&dpr=off" alt="Generic placeholder image" width="140" height="140">
                    <h2>Parenthood Classes</h2>
                    <p>Parenting classes that cover from giving birth,postpartum health to help new parents feel a little more prepared.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>


        </div>
        <hr>

        <div class="col-12 container counter-section" style="background-color: red; height: 250px">
            <div class="row pt-5 text-center ">
                <div class="col-md-3 counter-box">
                    <div class="icon-box"><i class="fa fa-bed"></i></div>
                    <p class="counter">300</p>
                    <p>Beds</p>
                </div>

                <div class="col-md-3 counter-box">
                    <div class="icon-box"><i class="fa fa-building"></i></div>
                    <p class="counter">150</p>
                    <p>nurses</p>
                </div>

                <div class="col-md-3 counter-box">
                    <div class="icon-box"><i class="fa fa-book"></i></div>
                    <p class="counter">8</p>
                    <p>Physical Test Areas</p>
                </div>

                <div class="col-md-3 counter-box">
                    <div class="icon-box"><i class="fa fa-cutlery"></i></div>
                    <p class="counter">9</p>
                    <p>Medical wards</p>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

        });
    </script>
@endsection
