@extends('layouts.admin_app')
@section('title', 'Admin Bookings')
@section('content')
<link rel="stylesheet" href="{{asset('admin/css/export_search/buttons.dataTables.min.css')}}">
<div class="loader"></div>
<div class="wrapper">
    @php
        $booking_type = collect(request()->segments())->last();
    @endphp
    @include('includes.admin_header')
    @include('includes.admin_sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ucfirst($booking_type)}} Bookings</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Bookings</li>
            </ol>
        </section>
        <section class="content">
            {{-- <div class="row">
                <div class="col-12">
                    <div class=" me-3 my-3 pull-right">
                        <a class="btn btn-primary bg-gradient-dark mb-0" href="{{route('course.create')}}"> Add New Booking</a>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-area table-responsive" style="margin:20px;">
                                <table class="table table-striped" id="booking-data-table">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">ACTION</th>
                                            <th style="width:10%">ID</th>
                                            <th style="width:10%">NAME</th>
                                            <th style="width:10%">EMAIL</th>
                                            <th style="width:10%">MOBILE</th>
                                            <th style="width:10%">BOOKING<BR>DATES</th>
                                            <th style="width:10%">STREET</th>
                                            <th style="width:10%">SUBURB</th>
                                            <th style="width:10%">POSTCODE</th>
                                            <th style="width:10%">PAYMENT<BR>METHOD</th>
                                            <th style="width:10%">PAYMENT<BR>DATE</th>
                                            <th style="width:10%">PAYMENT<BR>AMOUNT</th>
                                            <th style="width:10%">PAYMENT<BR>COMMENT</th>
                                            <th style="width:10%">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('includes.admin_footer')
</div>

<div class="modal" id="paymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Payment</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="paymentForm" method="post" action="{{route('booking.update')}}">
                    <input type="hidden" name="booking_id" id="booking_id" value="">
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="">Select Method</option>
                            <option value="Cash">Cash</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                        <span id="payment_method_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount:</label>
                        <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
                        <span id="payment_amount_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="payment_date">Payment Date:</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                        <span id="payment_date_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="payment_comment">Payment Comment:</label>
                        <textarea class="form-control" id="payment_comment" name="payment_comment"></textarea>
                        <span id="payment_comment_error" style="color:red;"></span>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitButton" id="submitButton" onclick="submitPayment()">
                    <span class="submit-button-text">Submit</span>
                    <span class="spinner"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="bookingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Booking Dates</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="bookingForm" method="post" action="{{route('booking.dates.update')}}">
                    <input type="hidden" name="booking_id" id="booking_date_id" value="">
                    <div class="form-group">
                        <label for="booking_dates">Booking Dates:</label>
                        <input type="text" class="form-control" id="booking_dates" name="booking_dates" required>
                        <span id="booking_dates_error" style="color:red;"></span>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitButton" id="submitButton" onclick="changeBookingDates()">
                    <span class="submit-button-text">Submit</span>
                    <span class="spinner"></span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    var route_get_booking_data = "{{route('admin.getBookings',['name'=>$booking_type])}}";
    var route_update_booking_data = "{{route('booking.update')}}";
    var route_delete_booking_data = "{{route('booking.delete')}}";
    var route_update_booking_dates = "{{route('booking.dates.update')}}";
</script>
<script src="{{asset('admin/js/export_search/jquery-3.3.1.js')}}"></script>
<script src="{{asset('admin/js/export_search/jquery-ui.js')}}"></script>
<script src="{{asset('admin/js/export_search/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/export_search/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/js/export_search/buttons.html5.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.loader').hide();
    $('#booking-data-table').DataTable({
        'processing': true,
        'serverSide': true,
        "lengthMenu": [
            [10, 25, 50, 100, 500, 1000],
            [10, 25, 50, 100, 500, 1000]
        ],
        'dom': 'Bfrtipl',
        'buttons': [{
            "extend": 'csv',
            "text": 'Export To CSV',
            "className": 'btn btn-primary'
        }],
        ajax: {
            'url': route_get_booking_data,
            'type': 'post',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
        'columns': [
            { data: 'action', name: 'action'},
            { data: 'id', name: 'id'},
            { data: 'name', name: 'name'},
            { data: 'email', name: 'email'},
            { data: 'mobile', name: 'mobile'},
            { data: 'booking_dates', name: 'booking_dates'},
            { data: 'street', name: 'street'},
            { data: 'suburb', name: 'suburb'},
            { data: 'postcode', name: 'postcode'},
            { data: 'payment_method', name: 'payment_method'},
            { data: 'payment_date', name: 'payment_date'},
            { data: 'payment_amount', name: 'payment_amount'},
            { data: 'payment_comment', name: 'payment_comment'},
            { data: 'status', name: 'status'},
        ],
        order: [1, 'desc']
    });
    $('#booking-data-table').on('click', '.payment-btn', function() {
        var id = $(this).data('id');
        $('#booking_id').val(id);
    });
    $('#booking-data-table').on('click', '.edit-booking', function() {
        var id = $(this).data('id');
        var booking_date = $(this).data('booking_dates');
        $('#booking_date_id').val(id);
        $('#booking_dates').val(booking_date);
    });
    $('#booking_dates').daterangepicker({
        // autoUpdateInput: true,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD/MM/YYYY'
        },
    });
});
function submitPayment() {
    $('.submitButton').addClass('loading');
    // Get form data
    var payment_method = $('#payment_method').val();
    var payment_amount = $('#payment_amount').val();
    var payment_date = $('#payment_date').val();
    var booking_id = $('#booking_id').val();
    var error = 0;
    if(payment_method==''){
        $('#payment_method_error').html('Please select payment method.');
        error = 1;
    }else{
        $('#payment_method_error').html('');
        error = 0;
    }
    if(payment_amount==''){
        $('#payment_amount_error').html('Please enter payment amount.');
        error = 1;
    }else{
        $('#payment_amount_error').html('');
        error = 0;
    }
    if(payment_date==''){
        $('#payment_date_error').html('Please select payment date.');
        error = 1;
    }else{
        $('#payment_date_error').html('');
        error = 0;
    }
    if(payment_comment==''){
        $('#payment_comment_error').html('Please enter payment comment.');
        error = 1;
    }else{
        $('#payment_comment_error').html('');
        error = 0;
    }

    if(error==1){
        $('.submitButton').removeClass('loading');
        return false;

    }else{
        $('.loader').show();
        var formData = {
            payment_method: document.getElementById('payment_method').value,
            payment_amount: document.getElementById('payment_amount').value,
            payment_date: document.getElementById('payment_date').value,
            payment_comment: document.getElementById('payment_comment').value,
            booking_id: document.getElementById('booking_id').value
        };

        $.ajax({
            url: route_update_booking_data,
            type: 'POST',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            dataType:'JSON',
            success: function(response) {
                if(response.status==200){
                    alert(response.message);
                    location.reload();
                }else{
                    $('#submitButton').removeClass('loading');
                }
            },
            error: function(error) {
                console.log('Error submitting payment:', error);
            }
        });
    }
}
function changeBookingDates(obj){
    $('.submitButton').addClass('loading');
    // Get form data
    var booking_dates = $('#booking_dates').val();
    var booking_id = $('#booking_date_id').val();
    var error = 0;
    if(booking_dates==''){
        $('#booking_dates_error').html('Please select booking dates.');
        error = 1;
    }else{
        $('#booking_dates_error').html('');
        error = 0;
    }

    if(error==1){
        $('.submitButton').removeClass('loading');
        return false;

    }else{
        $('.loader').show();
        var formData = {
            booking_dates: booking_dates,
            booking_id: booking_id
        };

        $.ajax({
            url: route_update_booking_dates,
            type: 'POST',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            dataType:'JSON',
            success: function(response) {
                if(response.status==200){
                    alert(response.message);
                    location.reload();
                }else{
                    $('.submitButton').removeClass('loading');
                }
            },
            error: function(error) {
                console.log('Error submitting payment:', error);
            }
        });
    }
}
function deleteBooking(obj){
    if (confirm('Are you sure to delete this booking?')) {
        var id = obj.getAttribute('data-id');
        var data = {'id': id};
        $.ajax({
            url:route_delete_booking_data,
            method:'post',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType:"JSON",
            success:function(response){
                if(response.status==200){
                    alert(response.message)
                    location.reload();
                }else{
                    alert(response.message)
                }
            },
            error: function(error) {
                console.error('Error fetching dates data:', error);
            }
        });
    }

}
</script>
@endsection
