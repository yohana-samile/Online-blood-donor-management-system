<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Blood_donation_record extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'date_donate'
        ];
        public function user(){
            return $this->belongsTo(user::class);
        }
    }
