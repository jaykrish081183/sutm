<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function index(){
        return view('admin.course.index');
    }

    public function getCourses(){
        $course_data = Course::all()->toArray();
        return DataTables::of($course_data)->addIndexColumn()
            ->addColumn('name', function ($row) {
                return isset($row['name'])?$row['name']:'';
            })
            ->addColumn('code', function ($row) {
                return isset($row['code'])?$row['code']:'';
            })
            ->addColumn('image', function ($row) {
                return isset($row['image'])?'<img src="'.asset($row['image']).'" width="100px" height="100px">':'';
            })
            ->addColumn('duration', function ($row) {
                return isset($row['duration'])?$row['duration']:'';
            })
            ->addColumn('mode_of_delivery', function ($row) {
                return isset($row['mode_of_delivery'])?$row['mode_of_delivery']:'';
            })
            ->addColumn('fees', function ($row) {
                return isset($row['fees'])?$row['fees']:'';
            })
            ->addColumn('career_outcomes', function ($row) {
                return isset($row['career_outcomes'])?$row['career_outcomes']:'';
            })
            ->addColumn('created_at', function ($row) {
                return isset($row['created_at'])?date('m-d-Y',strtotime($row['created_at'])):'';
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="'.route('course.edit',['id'=>base64_encode($row['id'])]).'" class="me-2" >Edit</a>';
                // $edit = '<button  class="btn btn-info me-2" onclick="editCourse(this)" data-id="'.base64_encode($row['id']).'">Edit</button>';
                return $edit;
            })
            ->rawColumns(['name','code', 'image', 'duration', 'mode_of_delivery', 'fees', 'career_outcomes', 'created_at','action'])
            ->make(true);
    }

    public function create(){
        return view('admin.course.create');
    }

    public function store(Request $request){
        $validator = validator($request->all(), [
            "name"    => "required",
            "code"  => "required",
            "duration"  => "required",
            "mode_of_delivery"  => "required",
            "fees"  => "required",
            "career_outcomes"  => "required",
            "description"  => "required",
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
                    ->withErrors($validator)
                    ->withInput();
        }

        try {
            $path = 'storage/course/';
            if (isset($request->image)) {
                $type = $request->image->getClientOriginalExtension();
                $image = 'course_' . time() . "." . $type;
                Storage::disk('public')->put("course/" . $image, File::get($request->file('image')));
                $name = $path.$image;
            }
            $course_data = [
                'name' => $request->name,
                'code' => $request->code,
                'duration' => $request->duration,
                'mode_of_delivery' => $request->mode_of_delivery,
                'fees' => $request->fees,
                'image' => $image,
                'career_outcomes' => $request->career_outcomes,
                'description' => $request->description,
            ];
            Course::create($course_data);
            session()->flash('message', "Course created successfully.");
            return redirect()->back();
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

    public function edit(Request $request, $id){
        $course_data = Course::where('id',base64_decode($id))->first()->toArray();
        return view('admin.course.edit',compact('course_data'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            "name"    => "required",
            "code"  => "required",
            "duration"  => "required",
            "mode_of_delivery"  => "required",
            "fees"  => "required",
            "career_outcomes"  => "required",
            "description"  => "required",
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        try {
            $path = 'storage/course/';
            if (isset($request->image)) {
                $type = $request->image->getClientOriginalExtension();
                $image = 'course_' . time() . "." . $type;
                Storage::disk('public')->put("course/" . $image, File::get($request->file('image')));
                $image_name = $path.$image;
            }else{
                $image_name = isset($request->old_image)?$request->old_image:'';
            }
            $id = isset($request->id)?$request->id:'';
            $course_data = [
                'name' => $request->name,
                'code' => $request->code,
                'duration' => $request->duration,
                'mode_of_delivery' => $request->mode_of_delivery,
                'fees' => $request->fees,
                'image' => $image_name,
                'career_outcomes' => $request->career_outcomes,
                'description' => $request->description,
            ];
            Course::find($id)->update($course_data);
            $response['status'] = 200;
            $response['success'] = "Course Updated successfully.";
            $response['redirect_url'] = route('course.index');
            return response()->json($response);

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }
}
