<?php
namespace App\Traits;
trait trans{
    public function getTransNameAttribute()
    {
        // dump($this->name);
        if($this->name){
            return json_decode($this->name ,true)[app()->currentLocale()];
        }
   return $this->name;
    //    // return json_decode($this->name ,true)[app()->currentLocale()];
     }
    // protected function name():Attribute
    // {
    //     return Attribute::make(
    //         get:fn() => json_decode($this->name ,true)[app()->currentLocale()]
    //     );

    // }
     public function getTransNameEnAttribute()
    {
        // dump($this->name);
        if($this->name){
            return json_decode($this->name ,true)['en'];
        }
      return $this->name;
    }
     public function getTransNameArAttribute()
    {
        // dump($this->name);
        if($this->name){
            return json_decode($this->name ,true)['ar'];
        }
      return $this->name;
    }
    //  public function getTransNameFrAttribute()
    // {
    //     // dump($this->name);
    //     if($this->name){
    //         return json_decode($this->name ,true)['fr'];
    //     }
    //   return $this->name;
    // }

    // protected function nameEn():Attribute
    // {
    //     return Attribute::make(
    //         get:fn() => json_decode($this->name ,true)['en']
    //     );

    // }
    // protected function nameAr():Attribute
    // {
    //     return Attribute::make(
    //         get:fn() => json_decode($this->name ,true)['ar']
    //     );

    // }

    public function getTransContentAttribute()
    {

        if($this->content){
            return json_decode($this->content ,true)[app()->currentLocale()];
        }
      return $this->content;
    }
     public function getTransContentEnAttribute()
    {
        // dump($this->name);
        if($this->content){
            return json_decode($this->content ,true)['en'];
        }
      return $this->content;
    }
     public function getTransContentArAttribute()
    {
        // dump($this->name);
        if($this->content){
            return json_decode($this->content ,true)['ar'];
        }
      return $this->content;
    }
    //  public function getTransContentFrAttribute()
    // {
    //     // dump($this->name);
    //     if($this->name){
    //         return json_decode($this->name ,true)['fr'];
    //     }
    //   return $this->name;
    // }

    // protected function ContentEn():Attribute
    // {
    //     return Attribute::make(
    //         get:fn() => json_decode($this->content ,true)['en']
    //     );

    // }
    // protected function ContentAr():Attribute
    // {
    //     return Attribute::make(
    //         get:fn() => json_decode($this->content ,true)['ar']
    //     );

    // }
}
