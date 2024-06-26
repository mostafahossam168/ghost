<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(30);
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|string|max:255|unique:services,name",
            'duration' => "required|integer",
            'price' => "required|numeric",
            'description' => "required|string",
        ]);
        Service::create($validator->validated());
        return redirect()->back()->with('success', 'تم انشاء الباقة  بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => "required|string|max:255|unique:services,name," . $service->id,
            'duration' => "required|integer",
            'price' => "required|numeric",
            'description' => "required|string",
            'status' => "required|boolean",
        ]);
        $service->update($validator->validated());
        return redirect()->back()->with('success', 'تم تعديل الباقة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success', 'تم حذف الباقة بنجاح');
    }
}