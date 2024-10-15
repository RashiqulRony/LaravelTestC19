<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VaccinationReminder;
use App\Mail\VaccineReminder;
use App\Models\Notification;
use App\Models\User;
use App\Models\VaccineCenter;
use App\Models\VaccineSchedule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $vaccineCenters = VaccineCenter::all();
        return view('auth.register', compact('vaccineCenters'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'center' => ['required', 'exists:vaccine_centers,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nid' => ['required', 'string', 'min:10', 'max:17', 'unique:users'],
            'phone_number' => ['required', 'string', 'min:11', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nid' => $data['nid'],
            'phone_number' => $data['phone_number'],
            'registered_at' => now(),
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
        ]);

        # Schedule vaccination for user (First come, first serve)..
        $this->scheduleVaccination($user, $data['center']);
        session()->flash('success', 'Register successfully! Check your status.');
        return $user;
    }

    private function scheduleVaccination($user, $centerId)
    {
        $center = VaccineCenter::find($centerId);
        $date = Carbon::today();
        while (true) {
            $scheduledCount = VaccineSchedule::where('vaccine_center_id', $centerId)->where('vaccination_date', $date->format('Y-m-d'))->count();
            if ($scheduledCount < $center->daily_limit) {
                VaccineSchedule::create([
                    'user_id' => $user->id,
                    'vaccine_center_id' => $center->id,
                    'vaccination_date' => $date->format('Y-m-d'),
                ]);
                $this->scheduleNotification($user, $date);
                break;
            }
            $date->addDay();
        }
    }

    // Schedule notification email
    private function scheduleNotification($user, $date)
    {
        $emailDate = $date->subDay()->setTime(21, 0); // 9 PM the night before
        $user->update([
            'scheduled_date' => $emailDate,
            'status' => 'Scheduled',
        ]);

        Notification::create([
            'user_id' => $user->id,
            'scheduled_for' => $emailDate,
            'sent_status' => true,
        ]);

        $mailData = [
            'user_name' => $user->name,
            'scheduled_date' => $emailDate,
            'center_name' => $user->schedule->vaccineCenter->name .' - '.$user->schedule->vaccineCenter->location,
        ];

        Mail::to($user->email)->queue(new VaccinationReminder($mailData));

    }

}
