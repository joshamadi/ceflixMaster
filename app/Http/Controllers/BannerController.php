<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeSliderResource;
use App\Http\Resources\PeoplesChoiceResource;
use App\Http\Resources\SideBannerResource;
use App\Model\HomeSlider;
use App\Model\PeoplesChoice;
use App\Model\SideBanner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Webpatser\Uuid\Uuid;

class BannerController extends Controller
{

    //    ***********   home slider logic starts here            ************    //


    public function home_sliders(HomeSlider $homeSlider){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  HomeSliderResource::collection($homeSlider->latest()->take($num)->get());

        }else{
            $resource =  HomeSliderResource::collection($homeSlider->latest()->get());
        }

        if($resource->count() > 0)
            return response()->json([
                'status'=> true,
                'message'=>'data returned',
                'data'=> $resource
            ]);
        else
            return response()->json([
                'status'=> false,
                'message'=>'No data returned',
            ]);
    }

    public function store_home_slider(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $bannerName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

        Image::make($request->image)->save(public_path('images/banners/').$bannerName)->resize(870, 355);

        return HomeSlider::create([
            'unique_id' => Uuid::generate()->string,
            'image' => $bannerName,
            'link' => $request->link,
        ], Response::HTTP_CREATED);
    }

    public function delete_home_slider(HomeSlider $homeSlider){
        $homeSlider->delete();
        return response('Home slider deleted', Response::HTTP_OK);
    }






    //    ***********   side banner logic starts here            ************    //




    public function side_banners(SideBanner $sideBanner){
        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  SideBannerResource::collection($sideBanner->latest()->take($num)->get());

        }else{
            $resource =  SideBannerResource::collection($sideBanner->latest()->get());
        }

        if($resource->count() > 0)
            return response()->json([
                'status'=> true,
                'message'=>'data returned',
                'data'=> $resource
            ]);
        else
            return response()->json([
                'status'=> false,
                'message'=>'No data returned',
            ]);
    }

    public function store_side_banner(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $bannerName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

        Image::make($request->image)->save(public_path('images/banners/').$bannerName)->resize(270, 420);

        return SideBanner::create([
            'unique_id' => Uuid::generate()->string,
            'image' => $bannerName,
            'link' => $request->link
        ], Response::HTTP_CREATED);

    }


    public function show_side_banner(SideBanner $sideBanner){

        if (empty($sideBanner))
            return response('Side banner not found', Response::HTTP_NOT_FOUND);
        else

        return new SideBannerResource($sideBanner);
    }

    public function delete_banner(SideBanner $sideBanner){
        $sideBanner->delete();
        return response('Side Banner deleted', Response::HTTP_OK);
    }




//    ***********   Peoples choice banner logic starts here            ************    //





    public function people_choice(PeoplesChoice $peoplesChoice){

        if(isset($_GET['num'])){
            $num = $_GET['num'];

            $resource =  PeoplesChoiceResource::collection($peoplesChoice->latest()->take($num)->get());

        }else{
            $resource =  PeoplesChoiceResource::collection($peoplesChoice->latest()->get());
        }

        if($resource->count() > 0)
            return response()->json([
                'status'=> true,
                'message'=>'data returned',
                'data'=> $resource
            ]);
        else
            return response()->json([
                'status'=> false,
                'message'=>'No data returned',
            ]);
    }

    public function store_PeoplesChoice(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $bannerName = time(). '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

        Image::make($request->image)->save(public_path('images/banners/').$bannerName)->resize(870, 355);

        return PeoplesChoice::create([
            'unique_id' => Uuid::generate()->string,
            'image' => $bannerName,
            'link' => $request->link,
        ], Response::HTTP_CREATED);
    }

    public function delete_peoples_choice(PeoplesChoice $peoplesChoice){
        $peoplesChoice->delete();
        return response('PeoplesChoice Product deleted', Response::HTTP_OK);
    }







}
