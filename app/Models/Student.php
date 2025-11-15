<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Student extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'students';

    public const DISCOUNT_TYPE_SELECT = [
        '%'     => 'Precentage',
        'value' => 'Value',
    ];

    public const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $dates = [
        'dob',
        'date_of_joing',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'select_user_id',
        'refered_by_id',
        'name',
        'phone_number',
        'father_name',
        'mother_name',
        'dob',
        'gender',
        'qualification',
        'parmanet_address',
        'present_address',
        'date_of_joing',
        'course_fee',
        'discount_type',
        'discount',
        'due_amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function studentStudentPayrolls()
    {
        return $this->hasMany(StudentPayroll::class, 'student_id', 'id');
    }

    public function select_user()
    {
        return $this->belongsTo(User::class, 'select_user_id');
    }

    public function refered_by()
    {
        return $this->belongsTo(User::class, 'refered_by_id');
    }

    public function select_courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfJoingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfJoingAttribute($value)
    {
        $this->attributes['date_of_joing'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
