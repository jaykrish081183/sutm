<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ContactUs;
use App\Models\Course;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request){
        /* echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        exit(); */
        $validator = validator($request->all(), [
            "name"    => "required",
            "email"  => "required",
            "mobile"  => "required",
            "booking_dates"  => "required",
            "street"  => "required",
            "suburb"  => "required",
            "postcode"  => "required",
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
        }

        try {
            $booking_data = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'booking_dates' => $request->booking_dates,
                'street' => $request->street,
                'status' => 1,
                'suburb' => $request->suburb,
                'postcode' => $request->postcode,
                'comment' => $request->comment,
            ];
            Booking::create($booking_data);
            return redirect()->back()->with('success', 'Booking created successfully!');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }
    }

    public function getBookingDates(Request $request){
        $post = $request->all();
        if (isset($_POST['selectedMonth']) && $_POST['selectedMonth']=='YES') {
            $data = array();
            $result = Booking::all();
            $dates_arr = $exploded_dates = $mergedArray = [];

            foreach ($result as $key => $value) {
                if(isset($value['booking_dates'])){
                    $exploded_dates[] = explode('-', $value['booking_dates']);
                }
            }


            $mergedArray = call_user_func_array('array_merge', $exploded_dates);

            if(count($mergedArray)>0){
                $dates_data = [];
                for($i=0;$i<count($mergedArray);$i++){
                    $startDate = str_replace(' ', '', $mergedArray[$i]);
                    $endDate = str_replace(' ', '', $mergedArray[++$i]);
                    $dates[] = $this->getDatesBetween($startDate, $endDate);
                }
            }
            $dates_array = call_user_func_array('array_merge', $dates);
            return json_encode(array('response' => $dates_array));
        }
    }

    public function getDatesBetween($startDate, $endDate) {
        $dates = [];

        // Convert start date and end date to DateTime objects
        $startDateObj = DateTime::createFromFormat('d/m/Y', $startDate);
        $endDateObj = DateTime::createFromFormat('d/m/Y', $endDate);

        if (!$startDateObj || !$endDateObj) {
            // Handle parsing errors if necessary
            return $dates; // Return empty array or handle the error
        }

        // Clone the start date to avoid modifying the original object
        $currentDate = clone $startDateObj;

        // Iterate through dates and add to array
        while ($currentDate <= $endDateObj) {
            $dates[] = $currentDate->format('d/m/Y');
            $currentDate->modify('+1 day');
        }

        return $dates;
    }

}
