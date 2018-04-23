<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

// use \Input as Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function homepage() {


      if (Auth::check()) {
          $user = Auth::user();
          $id = Auth::id();


          $recom_top = "Products you may like";



          //logic of chaos

          $currUser = DB::table('prod_by_user')->select()->where('u_id', $id)->first();

          $p1ofcurrUser = DB::table('all_products')->select()->where('id', $currUser->id_1)->first();
          $p2ofcurrUser = DB::table('all_products')->select()->where('id', $currUser->id_2)->first();
          $p3ofcurrUser = DB::table('all_products')->select()->where('id', $currUser->id_3)->first();
          $p4ofcurrUser = DB::table('all_products')->select()->where('id', $currUser->id_4)->first();


          if($p1ofcurrUser->type == 1) {
              $pro1 = DB::table('smartphones')->select()->where('id', $p1ofcurrUser->type_id)->first();
          }
          if($p1ofcurrUser->type == 2) {
              $pro1 = DB::table('laptops')->select()->where('id', $p1ofcurrUser->type_id)->first();
          }
          if($p1ofcurrUser->type == 4) {
              $pro1 = DB::table('earphones')->select()->where('id', $p1ofcurrUser->type_id)->first();
          }


          if($p2ofcurrUser->type == 1) {
              $pro2 = DB::table('smartphones')->select()->where('id', $p2ofcurrUser->type_id)->first();
          }
          if($p2ofcurrUser->type == 2) {
              $pro2 = DB::table('laptops')->select()->where('id', $p2ofcurrUser->type_id)->first();
          }
          if($p2ofcurrUser->type == 4) {
              $pro2 = DB::table('earphones')->select()->where('id', $p2ofcurrUser->type_id)->first();
          }


          if($p3ofcurrUser->type == 1) {
              $pro3 = DB::table('smartphones')->select()->where('id', $p3ofcurrUser->type_id)->first();
          }
          if($p3ofcurrUser->type == 2) {
              $pro3 = DB::table('laptops')->select()->where('id', $p3ofcurrUser->type_id)->first();
          }
          if($p3ofcurrUser->type == 4) {
              $pro3 = DB::table('earphones')->select()->where('id', $p3ofcurrUser->type_id)->first();
          }


          if($p4ofcurrUser->type == 1) {
              $pro4 = DB::table('smartphones')->select()->where('id', $p4ofcurrUser->type_id)->first();
          }
          if($p4ofcurrUser->type == 2) {
              $pro4 = DB::table('laptops')->select()->where('id', $p4ofcurrUser->type_id)->first();
          }
          if($p4ofcurrUser->type == 4) {
              $pro4 = DB::table('earphones')->select()->where('id', $p4ofcurrUser->type_id)->first();
          }

          //logic of chaos ends

        }



        else {
          $recom_top = "Our top picks";

          $pro1 = DB::table('smartphones')->select()->where('id',17)->first();
          $pro2 = DB::table('earphones')->select()->where('id',14)->first();
          $pro3 = DB::table('laptops')->select()->where('id',32)->first();
          $pro4 = DB::table('earphones')->select()->where('id',1)->first();
        }





































      //-------phones-------//
      $phone1 = DB::table('smartphones')->select()->where('slug', 'apple-iphone-x-64-gb')->first();
      $phone2 = DB::table('smartphones')->select()->where('slug', 'oneplus-5t-128-gb')->first();
      //=======phones======//

      //-------Laptops-------//
      $laps1 = DB::table('laptops')->select()->where('slug', 'dell-inspiron-7570')->first();
      $laps2 = DB::table('laptops')->select()->where('slug', 'hp-15')->first();
      //=======Laptops======//

      //-------Earphones-------//
      $ephone1 = DB::table('earphones')->select()->where('slug', 'mdr-xb55-extrabass')->first();
      $ephone2 = DB::table('earphones')->select()->where('slug', 'cx-180-street-2')->first();
      //=======Earphones======//

      return view('pages.homepage', [
        'phone1' => $phone1,
        'phone2' => $phone2,
        'laps1' => $laps1,
        'laps2' => $laps2,
        'ephone1' => $ephone1,
        'ephone2' => $ephone2,
        'recom_top' => $recom_top,
        'pro1' => $pro1,
        'pro2' => $pro2,
        'pro3' => $pro3,
        'pro4' => $pro4,
      ]);


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

}
