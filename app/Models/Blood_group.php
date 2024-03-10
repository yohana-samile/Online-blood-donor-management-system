<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Blood_group extends Model {
        use HasFactory;
        protected $fillable = ['bloodGroup', 'bloodGroupInfo'];

        public function profile(){
            return $this->hasMany(Profile::class);
        }

        public function blood_request(){
            return $this->hasMany(Blood_request::class);
        }
    }
