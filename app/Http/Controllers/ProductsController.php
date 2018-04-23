<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{

    public function smartphones($slug) {

    	$phone = DB::table('smartphones')->select()->where('slug', $slug)->first();

    	if($phone == null) {
    		// throw 404 error
    	}

    	else {

        $product = DB::table('all_products')->select()->where('type', 1)->where('type_id', $phone->id)->first();

    		if (Auth::check()) {
    		    $user = Auth::user();
    		    $id = Auth::id();



            //logic to check if user has viewed the item or not
    		    $check = DB::table('browsing_hist')->select()->where('user_id', $id)->where('p_id', $product->id)->first();

    		    if($check == null) {

    		    	DB::table('browsing_hist')->insert(
    		        	[
    		        		'user_id' => $id,
    		        		'p_id' => $product->id
    		        	]
    		    );
            //logic ends




    			}
    		}


        //logic of chaos

        $pbyp = DB::table('prod_by_prod')->select()->where('id_main', $product->id)->first();

        $p1ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_1)->first();
        $p2ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_2)->first();
        $p3ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_3)->first();
        $p4ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_4)->first();


        if($p1ofpbyp->type == 1) {
            $pro1 = DB::table('smartphones')->select()->where('id', $p1ofpbyp->type_id)->first();
        }
        if($p1ofpbyp->type == 2) {
            $pro1 = DB::table('laptops')->select()->where('id', $p1ofpbyp->type_id)->first();
        }
        if($p1ofpbyp->type == 4) {
            $pro1 = DB::table('earphones')->select()->where('id', $p1ofpbyp->type_id)->first();
        }


        if($p2ofpbyp->type == 1) {
            $pro2 = DB::table('smartphones')->select()->where('id', $p2ofpbyp->type_id)->first();
        }
        if($p2ofpbyp->type == 2) {
            $pro2 = DB::table('laptops')->select()->where('id', $p2ofpbyp->type_id)->first();
        }
        if($p2ofpbyp->type == 4) {
            $pro2 = DB::table('earphones')->select()->where('id', $p2ofpbyp->type_id)->first();
        }


        if($p3ofpbyp->type == 1) {
            $pro3 = DB::table('smartphones')->select()->where('id', $p3ofpbyp->type_id)->first();
        }
        if($p3ofpbyp->type == 2) {
            $pro3 = DB::table('laptops')->select()->where('id', $p3ofpbyp->type_id)->first();
        }
        if($p3ofpbyp->type == 4) {
            $pro3 = DB::table('earphones')->select()->where('id', $p3ofpbyp->type_id)->first();
        }


        if($p4ofpbyp->type == 1) {
            $pro4 = DB::table('smartphones')->select()->where('id', $p4ofpbyp->type_id)->first();
        }
        if($p4ofpbyp->type == 2) {
            $pro4 = DB::table('laptops')->select()->where('id', $p4ofpbyp->type_id)->first();
        }
        if($p4ofpbyp->type == 4) {
            $pro4 = DB::table('earphones')->select()->where('id', $p4ofpbyp->type_id)->first();
        }

        //logic of chaos ends


    		$phone_images = DB::table('s_more_images')->select('path')->where('smartphone_id', $phone->id)->get();

        $phone_brand = DB::table('brands')->select('name')->where('id', $phone->brand)->first();

    		return view('pages.smartphone', [
    			'phone' => $phone,
    			'phone_images' => $phone_images,
    			'all_products_id' => $product->id,
          'brand' => $phone_brand,
          'pro1' => $pro1,
          'pro2' => $pro2,
          'pro3' => $pro3,
          'pro4' => $pro4,
    		]);



    	}
    }


    //laptops

    public function laptops($slug) {

    	$laps = DB::table('laptops')->select()->where('slug', $slug)->first();

    	if($laps == null) {
    		// throw 404 error
    	}

    	else {

        $product = DB::table('all_products')
                  ->select()
                  ->where('type', 2)
                  ->where('type_id', $laps->id)
                  ->first();

    		if (Auth::check()) {
    		    $user = Auth::user();
    		    $id = Auth::id();

    		    $check = DB::table('browsing_hist')
    		    			->select()
    		    			->where('user_id', $id)
    		    			->where('p_id', $product->id)
    		    			->first();

    		    if($check == null) {

    		    	DB::table('browsing_hist')->insert(
    		        	[
    		        		'user_id' => $id,
    		        		'p_id' => $product->id
    		        	]
    		    );

    			}
    		}

        //logic of chaos

        $pbyp = DB::table('prod_by_prod')->select()->where('id_main', $product->id)->first();

        $p1ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_1)->first();
        $p2ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_2)->first();
        $p3ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_3)->first();
        $p4ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_4)->first();


        if($p1ofpbyp->type == 1) {
            $pro1 = DB::table('smartphones')->select()->where('id', $p1ofpbyp->type_id)->first();
        }
        if($p1ofpbyp->type == 2) {
            $pro1 = DB::table('laptops')->select()->where('id', $p1ofpbyp->type_id)->first();
        }
        if($p1ofpbyp->type == 4) {
            $pro1 = DB::table('earphones')->select()->where('id', $p1ofpbyp->type_id)->first();
        }


        if($p2ofpbyp->type == 1) {
            $pro2 = DB::table('smartphones')->select()->where('id', $p2ofpbyp->type_id)->first();
        }
        if($p2ofpbyp->type == 2) {
            $pro2 = DB::table('laptops')->select()->where('id', $p2ofpbyp->type_id)->first();
        }
        if($p2ofpbyp->type == 4) {
            $pro2 = DB::table('earphones')->select()->where('id', $p2ofpbyp->type_id)->first();
        }


        if($p3ofpbyp->type == 1) {
            $pro3 = DB::table('smartphones')->select()->where('id', $p3ofpbyp->type_id)->first();
        }
        if($p3ofpbyp->type == 2) {
            $pro3 = DB::table('laptops')->select()->where('id', $p3ofpbyp->type_id)->first();
        }
        if($p3ofpbyp->type == 4) {
            $pro3 = DB::table('earphones')->select()->where('id', $p3ofpbyp->type_id)->first();
        }


        if($p4ofpbyp->type == 1) {
            $pro4 = DB::table('smartphones')->select()->where('id', $p4ofpbyp->type_id)->first();
        }
        if($p4ofpbyp->type == 2) {
            $pro4 = DB::table('laptops')->select()->where('id', $p4ofpbyp->type_id)->first();
        }
        if($p4ofpbyp->type == 4) {
            $pro4 = DB::table('earphones')->select()->where('id', $p4ofpbyp->type_id)->first();
        }

        //logic of chaos ends

    		$laps_images = DB::table('l_more_images')->select('path')->where('laptop_id', $laps->id)->get();

        $laps_brand = DB::table('brands')->select('name')->where('id', $laps->brand)->first();

    		return view('pages.laptop', [
    			'laps' => $laps,
    			'laps_images' => $laps_images,
    			'all_products_id' => $product->id,
          'brand' => $laps_brand,
          'pro1' => $pro1,
          'pro2' => $pro2,
          'pro3' => $pro3,
          'pro4' => $pro4,
    		]);

    	}
    }

//earphones

public function earphones($slug) {

  $ephone = DB::table('earphones')->select()->where('slug', $slug)->first();

  if($ephone == null) {
    // throw 404 error
  }

  else {

    $product = DB::table('all_products')
              ->select()
              ->where('type', 4)
              ->where('type_id', $ephone->id)
              ->first();

    if (Auth::check()) {
        $user = Auth::user();
        $id = Auth::id();


        $check = DB::table('browsing_hist')
              ->select()
              ->where('user_id', $id)
              ->where('p_id', $product->id)
              ->first();

        if($check == null) {

          DB::table('browsing_hist')->insert(
              [
                'user_id' => $id,
                'p_id' => $product->id
              ]
        );

      }
    }


    //logic of chaos

    $pbyp = DB::table('prod_by_prod')->select()->where('id_main', $product->id)->first();

    $p1ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_1)->first();
    $p2ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_2)->first();
    $p3ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_3)->first();
    $p4ofpbyp = DB::table('all_products')->select()->where('id', $pbyp->id_4)->first();


    if($p1ofpbyp->type == 1) {
        $pro1 = DB::table('smartphones')->select()->where('id', $p1ofpbyp->type_id)->first();
    }
    if($p1ofpbyp->type == 2) {
        $pro1 = DB::table('laptops')->select()->where('id', $p1ofpbyp->type_id)->first();
    }
    if($p1ofpbyp->type == 4) {
        $pro1 = DB::table('earphones')->select()->where('id', $p1ofpbyp->type_id)->first();
    }


    if($p2ofpbyp->type == 1) {
        $pro2 = DB::table('smartphones')->select()->where('id', $p2ofpbyp->type_id)->first();
    }
    if($p2ofpbyp->type == 2) {
        $pro2 = DB::table('laptops')->select()->where('id', $p2ofpbyp->type_id)->first();
    }
    if($p2ofpbyp->type == 4) {
        $pro2 = DB::table('earphones')->select()->where('id', $p2ofpbyp->type_id)->first();
    }


    if($p3ofpbyp->type == 1) {
        $pro3 = DB::table('smartphones')->select()->where('id', $p3ofpbyp->type_id)->first();
    }
    if($p3ofpbyp->type == 2) {
        $pro3 = DB::table('laptops')->select()->where('id', $p3ofpbyp->type_id)->first();
    }
    if($p3ofpbyp->type == 4) {
        $pro3 = DB::table('earphones')->select()->where('id', $p3ofpbyp->type_id)->first();
    }


    if($p4ofpbyp->type == 1) {
        $pro4 = DB::table('smartphones')->select()->where('id', $p4ofpbyp->type_id)->first();
    }
    if($p4ofpbyp->type == 2) {
        $pro4 = DB::table('laptops')->select()->where('id', $p4ofpbyp->type_id)->first();
    }
    if($p4ofpbyp->type == 4) {
        $pro4 = DB::table('earphones')->select()->where('id', $p4ofpbyp->type_id)->first();
    }

    //logic of chaos ends

    $ephone_images = DB::table('e_more_images')->select('path')->where('earphone_id', $ephone->id)->get();

    $ephone_brand = DB::table('brands')->select('name')->where('id', $ephone->brand)->first();


    return view('pages.earphone', [
      'ephone' => $ephone,
      'ephone_images' => $ephone_images,
      'all_products_id' => $product->id,
      'brand' => $ephone_brand,
      'pro1' => $pro1,
      'pro2' => $pro2,
      'pro3' => $pro3,
      'pro4' => $pro4,
    ]);

  }
}


}
