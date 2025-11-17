<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mails\StoreMailUserRequest;
use App\Http\Requests\Mails\UpdateMailUserRequest;
use App\Models\MailDomain;
use App\Models\MailUser;
use App\Mail\MailUserUpdateNotification;
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailUserRequest $request)
    {
        $data = $request->validated();

        $domain = MailDomain::find($data['domain_id']);

        $mail_user = MailUser::query()->create([
            'local_part' => $data['local_part'],
            'domain_id' => $data['domain_id'],
            'password' => $data['password'],
            'email' => $data['local_part'].'@'.$domain->name,
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
            'mail_user' => MailUser::with('domain')->select(['local_part', 'domain_id', 'id'])->find($user)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailUserRequest $request, MailUser $user)
    {
        $data = $request->validated();

        $user->loadMissing('domain');

        if (! empty($data['password'])) {
            $user['password'] = $data['password'];
        }

        $user->local_part = $data['local_part'];
        $user->email = $data['local_part'] . "@" . $user['domain']['name'];
        $user->save();

        $user->notify(new MailUserUpdateNotification($user->updated_at));

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
