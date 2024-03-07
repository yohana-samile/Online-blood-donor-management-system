<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    class Donor_notification extends Model {
        protected $fillable = ['region_to_be_conducted', 'district_to_be_conducted', 'ward_to_be_conducted', 'street_to_be_conducted', 'time_to_be_conducted', 'sms_notification'];
        use HasFactory;
    }
