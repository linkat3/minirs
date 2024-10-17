<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    use HasFactory;

    public function creator()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
   
    //protected $fillable = ['user_id', 'channel_id'];
    protected $fillable = ['title', 'link', 'channel_id'];

    public function channel()
{
    return $this->belongsTo(Channel::class);
}

}
