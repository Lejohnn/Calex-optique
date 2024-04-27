<?php
namespace App\Http\Controllers;
use App\Http\Services\NotificationService;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $notificationService;


    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function index()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $users = User::all();
        return view('users.index', compact('users','notifications','notifications_notread'));
    }

    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $roles = Role::all();
        return view('users.create', compact('roles', 'notifications','notifications_notread'));
    }

    public function store(Request $request)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.create')->with('success', 'Compte créé avec succès!')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }

    public function show(User $user)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return view('users.show', compact('user', 'notifications','notifications_notread'));
    }


    public function edit(User $user)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles', 'notifications','notifications_notread'));
    }

    public function update(Request $request, User $user)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role_id' => 'sometimes|exists:roles,id',
        ]);

        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->role_id = $request->input('role_id', $user->role_id);
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mis à jour avec succès.')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }

    public function destroy(User $user)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur supprimé avec succès.')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }


}
