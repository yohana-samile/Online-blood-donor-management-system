<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class New_and_update extends Model {
        use HasFactory;
        protected $fillable = [
            'new_title', 'new_postacl_card', 'user_id'
        ];

        public function User (){
            $this->belongTo(User::class);
        }
    }
