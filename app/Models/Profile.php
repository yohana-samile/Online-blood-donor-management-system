<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Profile extends Model {
        use HasFactory;
        protected $fillable = ['blood_group_id', 'region', 'district', 'ward', 'street', 'places', 'gender', 'phone_number'];

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function blood_group(){
            return $this->belongsTo(Blood_group::class);
        }
    }

