<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
	 * Robert Bagwell's contributions
	 *
	 *
	 */

Route::get('/', function()
{
  return View::make('index');
});

Route::controller('users', 'UsersController');

Route::resource('tips', 'TipsController', ['only'=> ['index','create','store', 'edit', 'update', 'destroy']]);

Route::get('/start', function()
{
    $admin = new Role();
    $admin->name = 'Admin';
    $admin->save();
 
    $user1 = User::find(1);
    
 
    $user1->attachRole($admin);

 
    return 'Woohoo!';
});

// Route that shows an individual Tip by its ID
Route::get('tips/{id}', function($id)
{
 $tip = Tip::find($id);
  // Get all reviews that are not spam for the product and paginate them
  $reviews = $tip->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);
 
  return View::make('tips.single', array('tip'=>$tip,'reviews'=>$reviews));
  

});

Route::post('tips/{id}', array('before'=>'csrf', function($id)
{
  $input = array(
  'comment' => Input::get('comment'),
  'rating'  => Input::get('rating')
  );
  // instantiate Rating model
  $review = new Review;
 
  // Validate that the user's input corresponds to the rules specified in the review model
  $validator = Validator::make( $input, $review->getCreateRules());
 
  // If input passes validation - store the review in DB, otherwise return to product page with error message 
  if ($validator->passes()) {
  $review->storeReviewForTip($id, $input['comment'], $input['rating']);
  return Redirect::to('tips/'.$id.'#reviews-anchor')->with('review_posted',true);
  }
 
  return Redirect::to('tips/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
}));

