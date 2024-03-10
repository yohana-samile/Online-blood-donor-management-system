<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Hospital extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'region', 'district', 'ward', 'phone_number', 'address'
        ];

        public function user (){
            return $this->belongsTo(User::class, 'user_id');
        }
    }

