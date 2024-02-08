<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Donar extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'blood_group_id', 'place_of_residence', 'phone_number', 'gender'
        ];

        public function User (){
            return $this->belongsTo(User::class);
        }
    }
