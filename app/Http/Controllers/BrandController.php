<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Services\NotificationService;

class BrandController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $brands = Brand::all();
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.brands.index', compact('brands', 'notifications', 'notifications_notread'));
    }

    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.brands.create', compact('notifications', 'notifications_notread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name|max:255',
        ]);

        Brand::create($request->all());
        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.')
            ->with('notifications', $this->notificationService->notification_template()[0])
            ->with('notifications_notread', $this->notificationService->notification_template()[1]);
    }

    public function show(Brand $brand)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.brands.show', compact('brand', 'notifications', 'notifications_notread'));
    }

    public function edit(Brand $brand)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('caisse.brands.edit', compact('brand', 'notifications', 'notifications_notread'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|max:255|unique:brands,name,' . $brand->id,
        ]);

        $brand->update($request->all());
        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully.')
            ->with('notifications', $this->notificationService->notification_template()[0])
            ->with('notifications_notread', $this->notificationService->notification_template()[1]);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.')
            ->with('notifications', $this->notificationService->notification_template()[0])
            ->with('notifications_notread', $this->notificationService->notification_template()[1]);
    }
}
