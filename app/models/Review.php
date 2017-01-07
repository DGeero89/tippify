<?php
 
class Review extends Eloquent
{
 
  public function user()
  {
    return $this->belongsTo('User');
  }
 
  public function tip()
  {
    return $this->belongsTo('Tip');
  }
 
  public function scopeApproved($query)
  {
    return $query->where('approved', true);
  }
 
  public function scopeSpam($query)
  {
    return $query->where('spam', true);
  }
 
  public function scopeNotSpam($query)
  {
    return $query->where('spam', false);
  }
  
  public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );
    }
  
  public function getTimeagoAttribute()
  {
    $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    return $date;
  }
  
  public function storeReviewForTip($tipID, $comment, $rating)
  {
    $tip = Tip::find($tipID);
 
    
    $this->user_id = Auth::user()->id;
 
    $this->comment = $comment;
    $this->rating = $rating;
    $tip->reviews()->save($this);
 
    // recalculate ratings for the specified product
    $tip->recalculateRating();
  }
  
}