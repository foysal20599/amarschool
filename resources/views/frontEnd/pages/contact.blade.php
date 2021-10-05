@extends('frontEnd.layouts.master')
@push('style')
<style>
   header {
    background: black;
}
</style>
    
@endpush

@section('content')

 @include('frontEnd.include.header')
 <div class="inner-banner slider-item">
    <section class="ssitl-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> Contact</li>
            </ul>
        </div>
    </section>
</div>
    <!-- contact1 -->
    <section class="ssitl-contact-1 py-5" id="contact">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="d-grid contact-view mb-5 pb-lg-5">
                    <div class="cont-details">
                        <div class="contactct-fm-text text-left mb-md-5 mb-4">
                            <div class="header-title mb-md-5 mt-4">
                                <span class="sub-title">Find Us</span>
                                <h3 class="hny-title text-left">Additional information </h3>
                            </div>
                            <p class="mb-sm-5 mb-4">Start working with Us that can provide everything you need to
                                generate awareness,
                                drive traffic,
                                connect. <br> We guarantee that you’ll be able to have any issue resolved within 24
                                hours.</p>

                        </div>
                      
                        <div class="cont-top">
                            <div class="cont-left text-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Phone number</h6>
                                <p><a href="tel:01772328165">01772328165</a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Send Email</h6>
                                <p><a href="mailto:aoschoolbd@gmail.com" class="mail">aoschoolbd@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Office Address</h6>
                                <p class="pr-lg-5">Kazi Villa( Hatir Bagan Math).Shibchar City corporation, Shibchar, Madaripur</p>
                            </div>
                        </div>
                    </div>
                    <div class="map-content-9">
                        <div class="contactct-fm map-content-9 pl-lg-4">
                            <div class="contactct-fm-text text-left">
                                <div class="header-title mb-md-5 mt-4">
                                    <span class="sub-title">Contact Us</span>
                                    <h3 class="hny-title text-left">Fill out the form.</h3>
                                </div>
                                <p class="mb-sm-5 mb-4">Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
                                    consectetur adipisicing.</p>
                            </div>
                            <form action="https://sendmail.ssitlayouts.com/submitForm" method="post">
                                <div class="twice-two">
                                    <input type="text" class="form-control" name="ssitlName" id="ssitlName"
                                        placeholder="Name" required="">
                                    <input type="email" class="form-control" name="ssitlSender" id="ssitlSender"
                                        placeholder="Email" required="">
                                </div>
                                <div class="twice">
                                    <input type="text" class="form-control" name="ssitlSubject" id="ssitlSubject"
                                        placeholder="Subject" required="">
                                </div>
                                <textarea name="ssitlMessage" class="form-control" id="ssitlMessage" placeholder="Message"
                                    required=""></textarea>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-style mt-4">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="map-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58688.78477268357!2d90.15822801938081!3d23.168409889437363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37556e3e0d617765%3A0x8525b3c7d5c6f10e!2sMadaripur!5e0!3m2!1sen!2sbd!4v1631787288796!5m2!1sen!2sbd"width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
                   
                </div>

            </div>
    </section>
    <!-- /contact1 -->


   @include('frontEnd.include.footer')
   @endsection