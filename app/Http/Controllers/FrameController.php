<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frame;
use App\Models\Brand;
use Carbon\Carbon;

use App\Http\Services\NotificationService;

class FrameController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $frames = Frame::with('brand')->get();
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.frames.index', compact('frames', 'notifications', 'notifications_notread'));
    }

    public function create()
    {
        $brands = Brand::all();
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.frames.create', compact('brands', 'notifications', 'notifications_notread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Frame::create($request->all());
        return redirect()->route('frames.index')->with('success', 'Frame created successfully.');
    }



    public function show(Frame $frame)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.frames.show', compact('frame', 'notifications', 'notifications_notread'));
    }

    public function edit(Frame $frame)
    {
        $brands = Brand::all();
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.frames.edit', compact('frame', 'brands', 'notifications', 'notifications_notread'));
    }

    public function update(Request $request, Frame $frame)
    {
        $request->validate([
            'code' => 'required|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $frame->update($request->all());
        return redirect()->route('frames.index')->with('success', 'Frame updated successfully.');
    }



    public function destroy(Frame $frame)
    {
        $frame->delete();
        return redirect()->route('frames.index')
            ->with('success', 'Brand deleted successfully.')
            ->with('notifications', $this->notificationService->notification_template()[0])
            ->with('notifications_notread', $this->notificationService->notification_template()[1]);
    }

    // public function toggleStatus(Frame $frame)
    // {
    //     $frame->status = !$frame->status;
    //     $frame->save();

    //     return redirect()->route('frames.index')->with('success', 'Le statut de la monture a été mis à jour.');
    // }
    public function toggleStatus(Frame $frame)
    {
        $frame->status = !$frame->status;
        $frame->save();

        return response()->json([
            'success' => true,
            'newStatus' => $frame->status
        ]);
    }


    public function stats()
    {

        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        $totalFrames = Frame::count();
        $activeFrames = Frame::where('status', true)->count();
        $inactiveFrames = Frame::where('status', false)->count();
        $inactiveFramesToday = Frame::where('status', false)
            ->whereDate('updated_at', Carbon::today())
            ->count();

        return view('caisse.frames.stats', compact('totalFrames', 'activeFrames', 'inactiveFrames', 'inactiveFramesToday', 'notifications', 'notifications_notread'));
    }

}
