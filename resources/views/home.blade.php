@extends('layouts.app')
@section('title', 'Home Padhramni Expression of Interest')
@section('content')

        <!--Loading Area Start-->
        <div class="loading">
    		<div class="text-center middle">
    			<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    		</div>
    	</div>
        <!--Loading Area End-->
        <!--Main Wrapper Start-->
        <div class="as-mainwrapper">
            <!--Bg White Start-->
            <div class="bg-white">
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12" >
                            <img src="{{asset('assets/img/new_mataji_pic.jpg')}}" class="img-fluid" alt="IMG" height="400" width="1120" style="border-radius: 10px;">
                        </div>
                        <div class="col-md-12 mt-2">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-2 step_1">
                        <div class="col-md-12" style="background-color:white;border-top: 8px solid #a3945b; border-radius:10px">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h2>માતાજીની પધરામણી - Home Padhramni Expression of Interest</h2>
                                    <ul>
                                        <li>
                                            <b>Host Responsibilities:<br></b>
                                            <b>માતાજીની પધરામણી દરમ્યાન નીચેની મર્યાદા (ઓછામાં ઓછી) જાળવવી.</b><br>
                                            1) માતાજીની પધરામણી અને પ્રસંગ દરમ્યાન “જય ઉમિયા”, “જય માતાજી”, “જય અંબે”… બોલવાનો આગ્રહ રાખવો.<br>
                                            2) માતાજીને ઘરના અગ્રગણ ઘણીને માની સેવા કરવી. દરેક દેવ, દેવી કે ગુરુનુ સન્માન જાળવવું.<br>
                                            3) પધરામણી વખતે ઘર સ્વચ્છ રાખવું, સાત્વિક ભોજન આરોગવું. માંસ-મદિરા, ઈંડા, પાન મસાલા અને ગુટખા ખાવી નહીં.<br>
                                            4) પૂજા-પાઠ દરમ્યાન સનાતન ધર્મને શોભે એવા કપડાં પહેરવા. કોઈ શોર્ટ્સ પહેરવા &nbsp;નહીં.<br>
                                            5) માતાજીની આરતી, પ્રસાદ, સ્તુતિ અને શકય હોયતો ભજન કે માતાજીના જુદા-જુદા અવતાર અને ધામ વિષે વાત કરવી.<br>
                                            6) આરતી (જય આઘ્યાશક્તિ…) અને સ્તુતિ (વિશ્વંભરી…) ગાયીને કે વગાડીને કરવી. <br>
                                            7) બહેન-દીકરીઓએ સમય મર્યાદાનું ધ્યાન રાખવું.<br>
                                            8) ચૈત્ર અને આસો નવરાત્રિની ઉજવણી કરવી કે ઉજવણીમાં જોડાવવું.<br>
                                            9) પધરામણી સમયે શ્રધ્ધા-ભક્તિથી દાન, સેવા કે હાજરી આપવી.<br>
                                            10) શક્ય હોયતો પાડોશી કે મિત્રમંડળને માતાજીના દર્શન અને સેવાનો લાવો આપવો.<br>
                                            11) કૃપા કરીને સૂચનાઓનું પાલન કરવું.<br><br>
                                        </li>
                                        <li><span><b>Maintaining Protocols:</b></span><span>&nbsp;</span><span>The host is responsible for ensuring all required protocols for managing the Mataji Murti are followed throughout the registration period</span></li>
                                        <li><span><b>Registration:&nbsp;</b><span>A Payment of $501 is required for this registration.Once your booking is confirmed, you will be requested for submitting the payment.</span><br></span></li>
                                        <li><b>Financial Contribution : </b><span>Host can contribute as per his/her wish. All Financial Contributions received will be used for the Temple Sankalp .&nbsp;</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{route('storeBooking')}}" id="regForm" name="regForm">
                        @csrf
                        <div class="row mt-2 step_1">
                            <div class="col-md-12" style="background-color:white;border-top: 8px solid #a3945b; border-radius:10px">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group mt-3">
                                            <label for="name">Your full name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                            <span id="name_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="email">Email <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" required>
                                            <span id="email_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="mobile">Mobile No <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" id="mobile" name="mobile" required minlength="10" maxlength="10">
                                            <span id="mobile_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <button class="btn btn-primary next">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 step_2">
                            <div class="col-md-12" style="background-color:white;border-top: 8px solid #a3945b; border-radius:10px">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <h2>માતાજીની પધરામણી - Home Padhramni Expression of Interest</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 step_2">
                            <div class="col-md-12" style="background-color:white;border-top: 28px solid #a3945b; border-radius:10px;">
                                <div class="row">
                                    <div id="why">Padhramni Details </div>
                                    <div class="col-md-12 mt-3">
                                        <p><strong>Please note:</strong></p>
                                        <ul>
                                            <li>This is a tentative registration. Our admin team will confirm your booking if the requested dates are available.</li>
                                            <li>We reserve the right to modify registration <b>with prior notice </b>from Management.</li>
                                            <li>There is a minimum 7-day booking period at one place (without changing a location, even next door movement not permitted).<br></li>
                                            <li>Sunday to Saturday (Sunday Mataji will Visit next Padhramni)&nbsp;&nbsp;</li><li>Host must take a handover of Mataji assets and inform us of any missing items or damage.&nbsp;</li>
                                            <li>You authorise Umiya Parivar to display your address on social media for Mataji Darshan. if you do not wish your address to be displayed, please email us in writing.</li>
                                        </ul>
                                        <strong>To proceed with your booking:</strong>
                                        <ol>
                                            <li>Enter your desired month on the registration form.</li>
                                            <li>Upon submission, our admin team will confirm availability and finalize your registration.</li>
                                        </ol>
                                        <p><strong>Please note that your booking is not confirmed until you receive confirmation from our admin team.</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 step_2">
                            <div class="col-md-12" style="background-color:white;border-top: 8px solid #a3945b; border-radius:10px">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group mt-3">
                                            <label for="booking_dates">Estimated Month of Padhramni ( Not Guaranteed , Please choose the date from Sunday To Monday (one Week only))<span style="color:red;">*</span></label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{-- <input type="text" name="booking_dates" id="booking_dates" value="" class="form-control"/> --}}
                                                        {{-- <label for="booking_dates">Select Booking Date:</label> --}}
                                                        <select name="booking_dates" id="booking_dates" class="form-control">
                                                            <option value="">Select Booking</option>
                                                            <option value="August 2024">August 2024</option>
                                                            <option value="September 2024">September 2024</option>
                                                            <option value="October 2024">October 2024</option>
                                                            <option value="November 2024">November 2024</option>
                                                            <option value="December 2024">December 2024</option>
                                                        </select>
                                                        <span id="booking_dates_error" style="color:red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="street">Street Address <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="street" name="street" required>
                                            <span id="street_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="suburb">Suburb <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="suburb" name="suburb" required>
                                            <span id="suburb_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="postcode">Postcode <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="postcode" name="postcode" required>
                                            <span id="postcode_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <label for="comment">Any Special Comments </label>
                                            <input type="text" class="form-control" id="street" name="comment" required>
                                        </div>
                                        <div class="form-group mt-3 mb-3">
                                            <button class="btn btn-info previous">Back</button>
                                            <button class="btn btn-primary submit" type="submit" name="submit" >Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End of Bg White-->
        </div>
        <!--End of Main Wrapper Area-->
@endsection

<script>
    var route_get_booking_dates = "{{route('getBookingDates')}}";
</script>
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>

<script>
    $(document).ready(function(){
        setTimeout(function() { $("div.alert").hide(); }, 3000);
        $('.step_1').show();
        $('.step_2').hide();

        setTimeout(() => {
            $("div.loading").css('display','none');
        }, 1000);

        $('.next').on('click',function(){
            var name = $('#name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var error = 0;
            if(name==''){
                $('#name_error').html('Please enter full name');
                error = 1;
            }else{
                $('#name_error').html('');
                error = 0;
            }
            if(email==''){
                $('#email_error').html('Please enter email.');
                error = 1;
            }else{
                $('#email_error').html('');
                error = 0;
            }
            if(mobile==''){
                $('#mobile_error').html('Please enter mobile number');
                error = 1;
            }else{
                var mobilePattern = /^\d{10}$/; // Pattern for 10 digit mobile number

                if(mobilePattern.test(mobile)){
                    $('#mobile_error').html('');
                    error = 0;
                } else {
                    $('#mobile_error').html('Invalid mobile number. Please enter a 10 digit number.');
                    error = 1;
                }
            }

            if(error==0){
                $('.step_1').hide();
                $('.step_2').show();
                $('.loading').hide();
                return true;
            }else{
                return false;
            }

        });
        $('.previous').on('click',function(){
            $('.step_1').show();
            $('.step_2').hide();
        });
        $('.submit').on('click',function(){
            var booking_year = $('#booking_year').val();
            var booking_month = $('#booking_month').val();
            var booking_week = $('#booking_week').val();
            var booking_dates = $('#booking_dates').val();
            var street = $('#street').val();
            var suburb = $('#suburb').val();
            var postcode = $('#postcode').val();

            var error = 0;

            if(booking_dates==''){
                $('#booking_dates_error').html('Please select booking.');
                error = 1;
            }else{
                $('#booking_dates_error').html('');
                error = 0;
            }

            if(street==''){
                $('#street_error').html('Please enter street');
                error = 1;
            }else{
                $('#street_error').html('');
                error = 0;
            }

            if(suburb==''){
                $('#suburb_error').html('Please enter suburb');
                error = 1;
            }else{
                $('#suburb_error').html('');
                error = 0;
            }

            if(postcode==''){
                $('#postcode_error').html('Please enter postcode');
                error = 1;
            }else{
                $('#postcode_error').html('');
                error = 0;
            }

        });

        /* $.ajax({
            url:route_get_booking_dates,
            method:'post',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {'selectedMonth': 'YES'},
            dataType:"JSON",
            success:function(response){
                var disabledDates = response.response;
                // Initialize Date Range Picker with disabled dates
                $('#booking_dates').daterangepicker({
                    autoUpdateInput: true,
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'DD/MM/YYYY'
                    },
                    // isInvalidDate: function(date) {
                    //     // Convert date to YYYY-MM-DD format
                    //     var formattedDate = date.format('DD/MM/YYYY');

                    //     // Check if the date is in the disabledDates array
                    //     return disabledDates.includes(formattedDate);
                    // }
                });

                // Clear date range picker input when Clear button is clicked
                $('#booking_dates').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
            },
            error: function(error) {
                console.error('Error fetching dates data:', error);
            }
        }); */

    });
</script>
