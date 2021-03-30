<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Pastry;
use App\Sweet;

class PastryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $pastry = Pastry::where('user_id', $user_id)->first();

        return view('admin.pastry.index', compact('pastry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = Auth::user()->id;
        $pastry = Pastry::all();

        return view('admin.pastry.create', compact('pastry', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pastry $pastry)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
            'phone' => 'required|max:20',
            'email' => 'required|max:50|unique:pastries,email',
            'address' => 'required',

        ]);

        $form_data = $request->all();
        $form_data['user_id'] = Auth::user()->id;
        $pastry = new Pastry();

        $slug = Str::slug($form_data['name']);

        if ($pastry->slug != $slug) {
            $slug_base = $slug;
            $slug_check = Pastry::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_check) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $slug_check = Pastry::where('slug', $slug)->first();
            }

            $pastry->slug = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $pastry->fill($form_data);

        $pastry->save();

        return redirect()->route('admin.pastry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pastry = Pastry::where('slug', $slug)->first();
        return view('admin.pastry.show', compact('pastry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pastry = Pastry::where('slug', $slug)->first();

        $data = [
            'pastry' => $pastry,
        ];

        return view('admin.pastry.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pastry $pastry)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|max:512',
            'phone' => 'required|max:20',
            'email' => 'required|max:50|unique:pastries,email,'.$pastry->id,
            'address' => 'required',
        ]);

        $form_data = $request->all();

        $slug = Str::slug($form_data['name']);
        if ($pastry->slug != $slug) {
            $slug_base = $slug;
            $slug_check = Pastry::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_check) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $slug_check = Pastry::where('slug', $slug)->first();
            }

            $pastry->slug = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $pastry->fill($form_data);

        $pastry->update();

        return redirect()->route('admin.pastry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pastry $pastry)
    {
        $pastry->delete();

        return redirect()->route('admin.pastry.index');
    }
}
