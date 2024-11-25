<?php

namespace App\Models;
//namespace Illuminate\Auth;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth;

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

    public function hasAlreadyBeenSubmitted()
    {
        $existing = static::where('link', $this->link)->first();
        if ($existing) {
            if (Auth::user()->isTrusted()) {
                $existing->touch();
                if ($existing->approved == 0)
                    $existing->approved = 1;
                $existing->save();
                session()->flash('success', 'The link already exists and its timestamp has been updated.');
                return true;
            } else {
                if ($existing->approved)
                    session()->flash('info', 'The link already exists and it is already approved but you are not a trusted user, so it will not be updated in the list.');
                else
                    session()->flash('info', 'The link already exists and it is pending for approval but you are not a trusted user, so it will not be updated in the list.');
            }
            return true;
        }
        return false;
    }
}
