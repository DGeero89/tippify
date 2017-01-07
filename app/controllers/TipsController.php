<?php

class TipsController extends BaseController {
  
    public function index()
    {
      $tips = DB::table('tips')->paginate(20);
      return View::make('tips.index', compact('tips'));
    }
  
    
  public function update($id)
  {
    $input = Input::all();
    $validation = Validator::make($input, Tip::$updaterules);
    
    if ($validation->passes())
    {  
      $tip = Tip::find($id);
      $tip->update($input);
      return Redirect::route('tips.index', $id);
    }
    
    return Redirect::route('tips.edit', $id)
    ->withInput()
    ->withErrors($validation)
    ->with('message', 'There were validation errors.');
  }
  
  public function create() {
    return View::make('tips.create', compact('tips'));
  }
  
  public function store()
	{
		
		$validator = Validator::make(Input::all(), Tip::$rules);
 
    if ($validator->passes()) {
        $tip = new Tip;
        $tip->tipSymbol = Input::get('tipSymbol');
        $tip->tipCurrentPrice = Input::get('tipCurrentPrice');
        $tip->tipBuyPrice = Input::get('tipBuyPrice');
        $tip->tipSellPrice = Input::get('tipSellPrice');
        $tip->tipExpert = Input::get('tipExpert');
        $tip->save();
      return Redirect::to('users/dashboard');
		}
		
		return Redirect::route('tips.create')
		->withInput()
		->withErrors($validator)
		->with('message', 'There were validation errors.');
	}
  
  public function destroy($id)
	{
		Tip::find($id)->delete();
    return Redirect::to('users/dashboard');
	}

  public function edit($id)
  {
    $tip = Tip::find($id);
    if (is_null($tip))
    {
      return Redirect::to('users/dashboard');
    }
      return View::make('tips.edit', compact('tip'));
  }
  
}

