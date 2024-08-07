<?php

    namespace App\Models;
    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name', 'email', 'password', 'role_id'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

        public function Role(){
            $this->belongsTo(Role::class);
        }

        public function New_and_update(){
            $this->hasMany(New_and_update::class);
        }

        public function Request(){
            $this->hasMany(Request::class);
        }

        public function Donar (){
            return $this->hasOne(Donar::class);
        }
        public function hospital (){
            return $this->hasOne(Hospital::class);
        }

        public function profile(){
            return $this->hasOne(Profile::class);
        }

        public function blood_donation_record(){
            return $this->hasMany(Blood_donation_record::class);
        }

        public function blood_request(){
            return $this->hasMany(Blood_request::class);
        }
    }
