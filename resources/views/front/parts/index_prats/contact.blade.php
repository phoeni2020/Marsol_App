<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{__('trans.contact')}}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        @if(session()->has('done'))
            <h4 class="text-center text-uppercase text-secondary mb-0">{{session()->get('done')}}</h4>
        @endif

        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form id="contactForm" action="{{route('front.contactus')}}" method="post" name="sentMessage" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Name</label>
                            <input class="form-control" value="{{old('name')}}" name="name" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                            @error('name')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Email Address</label>
                            <input class="form-control" name="mail" value="{{old('mail')}}" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                            @error('mail')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Phone Number</label>
                            <input class="form-control" name="phone" value="{{old('phone')}}" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number." />
                            @error('phone')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Message</label>
                            <textarea class="form-control" name="massage" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message.">{{old('massage')}}</textarea>
                            @error('massage')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Send</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
