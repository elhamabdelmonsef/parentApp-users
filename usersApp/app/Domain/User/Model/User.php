<?php

namespace App\Domain\User\Model;

use App\Domain\CallLog\Model\CallLogEntry;
use App\Domain\Chat\Model\Message;
use App\Domain\Chat\Model\RoomUser;
use App\Domain\Contact\Model\Contact;
use App\Domain\District\Model\District;
use App\Domain\Lookup\Model\Timezone;
use App\Domain\Schedule\Model\StaffSchedule;
use App\Domain\Status\Model\Status;
use App\Domain\Tenancy\Model\Tenant;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Model
{
    protected $guarded = [];
}
