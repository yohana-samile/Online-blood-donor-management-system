<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Request extends Model
    {
        use HasFactory;
        protected $fillable = ['blood_group_id', 'user_id'];

        public function User(){
            $this->belongsTo(User::class);
        }
        public function Blood_group(){
            $this->belongsTo(Blood_group::class);
        }
    }
