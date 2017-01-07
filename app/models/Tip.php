<?php
	class Tip extends Eloquent 
	{
    
    protected $table = 'tips';

    protected $guarded = array('id', '_token');  // Important
    
    protected $fillable = array('tipSymbol', 'tipCurrentPrice', 'tipBuyPrice', 'tipSellPrice', 'tipExpert');
    
    public static $rules = array(
      'tipSymbol'=>'required|alpha|between:1,5',
      'tipCurrentPrice'=>'required|alpha_num|min:2',
      'tipBuyPrice'=>'required|alpha_num',
      'tipSellPrice'=>'required|alpha_num',
      'tipExpert'=>'required|alpha'
    );
    
     public static $updaterules = array(
       'tipSymbol'=>'required|alpha|between:1,5',
       'tipCurrentPrice'=>'required|alpha_num|min:2',
       'tipBuyPrice'=>'required|alpha_num',
       'tipSellPrice'=>'required|alpha_num',
   
    );
    
    public function reviews()
    {
      return $this->hasMany('Review');
    }
    
    public function recalculateRating()
    {
      $reviews = $this->reviews()->notSpam()->approved();
      $avgRating = $reviews->avg('rating');
      $this->rating_cache = round($avgRating,1);
      $this->rating_count = $reviews->count();
      $this->save();
    }

	}
