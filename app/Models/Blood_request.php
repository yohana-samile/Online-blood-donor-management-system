<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Blood_request extends Model {
        use HasFactory;
        protected $fillable = ['blood_group_id', 'date_requested', 'user_id', 'amountInLtr'];

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function blood_group(){
            return $this->belongsTo(Blood_group::class);
        }
    }
