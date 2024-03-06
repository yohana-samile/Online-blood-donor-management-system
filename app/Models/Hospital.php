<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Hospital extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'place_located', 'phone_number'
        ];

        public function User (){
            return $this->belongsTo(User::class);
        }
    }

