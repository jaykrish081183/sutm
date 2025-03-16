<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    /**
     * Admin Booking Page
     *
     * @param    void
     * @return  layout
     */
    public function index(){
        return view('admin.booking.index');
    }
    /**
     * Admin Booking Data
     *
     * @param       string      $bookings
     * @return      datatable
     */
    public function getBookings($bookings){
        if($bookings=='all'){
            $booking_data = Booking::orderBy('id', 'desc')->get()->toArray();
        }else if($bookings=='confirmed'){
            $booking_data = Booking::WHERE('status',2)->orderBy('id', 'desc')->get()->toArray();
        }else if($bookings=='pending'){
            $booking_data = Booking::WHERE('status',1)->orderBy('id', 'desc')->get()->toArray();
        }else{
            $booking_data = Booking::orderBy('id', 'desc')->get()->toArray();
        }

        return DataTables::of($booking_data)->addIndexColumn()
        ->addColumn('action', function ($row) {
            $payment = '';
            if($row['status']==1){
                $payment = '<a href="javascript:void(0)" class="btn btn-primary payment-btn" data-toggle="modal" data-id="' . $row['id'] . '" data-target="#paymentModal"><span class="fa fa-plus"></span></a>';
            }
            $edit = '<a href="javascript:void(0)" class="btn btn-info me-2 edit-booking" data-toggle="modal" data-booking_dates="'.$row['booking_dates'].'" data-id="'.$row['id'].'" data-target="#bookingModal"><span class="fa fa-pencil"></span></a>';
            $delete = '<a href="javascript:void(0)" class="me-2 btn btn-danger" onclick="deleteBooking(this)" data-id="'.$row['id'].'"><span class="fa fa-trash"></span></a>';
            return $payment." ".$edit." ".$delete;
        })
        ->addColumn('id', function ($row) {
            return isset($row['id'])?$row['id']:'';
        })
        ->addColumn('email', function ($row) {
            return isset($row['email'])?$row['email']:'';
        })
        ->addColumn('samaj_group', function ($row) {
            return isset($row['samaj_group'])?$row['samaj_group']:'';
        })
        ->addColumn('mobile', function ($row) {
            return isset($row['mobile'])?$row['mobile']:'';
        })
        ->addColumn('booking_dates', function ($row) {
            return isset($row['booking_dates'])?$row['booking_dates']:'';
        })
        ->addColumn('street', function ($row) {
            return isset($row['street'])?$row['street']:'';
        })
        ->addColumn('suburb', function ($row) {
            return isset($row['suburb'])?$row['suburb']:'';
        })
        ->addColumn('postcode', function ($row) {
            return isset($row['postcode'])?$row['postcode']:'';
        })
        ->addColumn('payment_method', function ($row) {
            return isset($row['payment_method'])?$row['payment_method']:'';
        })
        ->addColumn('payment_date', function ($row) {
            return isset($row['payment_date'])?date('d-m-Y',strtotime($row['payment_date'])):'';
        })
        ->addColumn('payment_amount', function ($row) {
            return isset($row['payment_amount'])?$row['payment_amount']:'';
        })
        ->addColumn('payment_comment', function ($row) {
            return isset($row['payment_comment'])?$row['payment_comment']:'';
        })
        ->addColumn('status', function ($row) {
            return (isset($row['status']) && $row['status']==1)?'Pending':'Confirmed';
        })
        ->addColumn('created_at', function ($row) {
            return (isset($row['created_at']))?date('d-m-Y',strtotime($row['created_at'])):'';
        })
        ->rawColumns(['action','id','name','email', 'mobile','samaj_group', 'booking_dates', 'street', 'suburb', 'postcode', 'payment_method', 'payment_date', 'payment_amount', 'payment_comment', 'status','created_at'])
        ->make(true);
    }
    /**
     * Admin Update Booking Data
     *
     * @param       object      $request
     * @return      json        $response
     */
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            "payment_amount"    => "required",
            "payment_date"  => "required",
            "payment_comment"  => "required",
            "payment_method"  => "required",
        ]);
        if ($validator->fails())
        {
            return response()->json(['status'=>400,'message'=>$validator->errors()->all()]);
        }

        try {
            $post = $request->all();
            $id = isset($post['booking_id'])?$request['booking_id']:'';
            $booking_data = [
                "payment_method"  => $post['payment_method'],
                "payment_amount"    => $post['payment_amount'],
                "payment_date"  => $post['payment_date'],
                "payment_comment"  => $post['payment_comment'],
                "status"  => "2",
            ];
            Booking::find($id)->update($booking_data);
            // Mail::send('client.send_email.service_inquiry_email', ['data' => $request,'company_data'=>$company_data,'user_data'=>$user_data], function($message) use ($request){
            $booking_user_data = Booking::select('*')->where('id',$id)->first()->toArray();

            Mail::send('admin.booking.send_email',['booking_data' => $booking_user_data], function($message) use ($booking_user_data){
                // $message->to($booking_user_data['email']);
                $message->to("kyfuwada@clip.lat");
                $message->subject('Registration Confirmed!');
            });

            $response['status'] = 200;
            $response['message'] = "Booking payment done successfully.";
            return response()->json($response);

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }
    /**
     * Admin Update Booking Date
     *
     * @param       object      $request
     * @return      json        $response
     */
    public function bookingDatesUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            "booking_dates"  => "required",
        ]);
        if ($validator->fails())
        {
            return response()->json(['status'=>400,'message'=>$validator->errors()->all()]);
        }

        try {
            $post = $request->all();
            $id = isset($post['booking_id'])?$request['booking_id']:'';
            $booking_data = [
                "booking_dates"  => $post['booking_dates'],
            ];
            Booking::find($id)->update($booking_data);

            $response['status'] = 200;
            $response['message'] = "Booking dates updated successfully.";
            return response()->json($response);

        } catch (Exception $e) {
            $message = $e->getMessage();
            $response['status'] = 400;
            $response['message'] = "Something went wrong.";
            return response()->json($response);
        }
    }
    /**
     * Admin Delete Booking Data
     *
     * @param       object      $request
     * @return      json        $response
     */
    public function delete(Request $request){
        $id = $request->id;
        if(isset($id)){
            Booking::find($id)->delete();
            $response['status'] = 200;
            $response['message'] = "Booking deleted successfully.";
        }else{
            $response['status'] = 400;
            $response['message'] = "Something went wrong.";
        }

        return response()->json($response);

    }
}
