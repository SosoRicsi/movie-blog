<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mails\StoreMailUserRequest;
use App\Http\Requests\Mails\UpdateMailUserRequest;
use App\Mail\MailUserUpdateNotification;
use App\Models\MailDomain;
use App\Models\MailUser;
use App\Models\User;
use Inertia\Inertia;

class MailUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('dashboard/mails/IndexUsers', [
            'mail_users' => MailUser::with('domain:id,name')->select(['local_part', 'domain_id', 'id'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('dashboard/mails/CreateUser', [
            'domains' => MailDomain::select(['id', 'name'])->get(),
            'users' => User::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailUserRequest $request)
    {
        $data = $request->validated();

        $domain = MailDomain::find($data['domain_id']);

        if ($data['user_id'] != null) {
            $user = User::find($data['user_id']);
        }

        $mail_user = MailUser::query()->create([
            'local_part' => $data['local_part'],
            'domain_id' => $data['domain_id'],
            'password' => $data['same_as_users'] ? $user->password : $data['password'],
            'email' => $data['local_part'].'@'.$domain->name,
            'user_id' => $data['user_id'] ? $user->id : null,
            'sync_with_user_password' => (bool)$data->same_as_users
        ]);

        $request->session()->flash('success', 'mails.created_successfully');

        return Inertia::location(route('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailUser $user)
    {
        return Inertia::render('dashboard/mails/EditUser', [
            'mail_user' => MailUser::with(['domain:id,name', 'user:id,name'])
                ->select(['local_part', 'domain_id', 'id', 'user_id', 'sync_with_user_password'])
                ->find($user->id),
            'users' => User::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailUserRequest $request, MailUser $user)
    {
        $data = $request->validated();
        $web_user = User::findOrFail($data['user_id']);
        $user->loadMissing('domain');

        if ($data['same_as_users']) {
            $user['password'] = $web_user->password;
        } else {
            $user['password'] = $data['password'];
            $user->sync_with_user_password = false; //default true
        }

        if ($user->local_part != $data['local_part']) {
            $user->local_part = $data['local_part'];
            $user->email = $data['local_part'] . "@" . $user->domain->name;
        }

        if ($user->user_id != $web_user->id) {
            $user->user_id = $web_user->id;
        }

        $user->save();
        $web_user->notify(new MailUserUpdateNotification($user->updated_at));

        $request->session()->flash('success', 'mails.updated_successfully');
        return Inertia::location(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailUser $user)
    {
        //
    }
}
