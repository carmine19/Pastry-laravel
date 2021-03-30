<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pastry;
use App\Sweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SweetController extends Controller
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

        if ($pastry) {
            $sweets = Sweet::where('pastry_id', $pastry->id)->get();
            $data = [
                'sweets' => $sweets,
                'pastry' => $pastry
            ];

            return view('admin.sweets.index', $data);
        }else {
            return view('layouts.partials.sweet-error');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sweets = Sweet::all();
        $user_id = Auth::user()->id;
        $pastry = Pastry::where('user_id', $user_id)->first();

        $data = [
            'pastry' => $pastry,
            'sweets' => $sweets,
        ];
        return view('admin.sweets.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sweet $sweet)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'nullable',
            'price' => 'required|max:9',
            'pastry_id' => 'nullable|exists:pastries,id',
            'cover' => 'nullable|image|max:512'
        ]);

        $form_data = $request->all();
        $form_data['pastry_id'] = Auth::user()->pastries->id;
        $new_dish = new Sweet();

        if ($form_data['name'] != $sweet->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;
            $dish_presente = Sweet::where('slug', $slug)->first();
            $contatore = 1;

            while ($dish_presente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $dish_presente = Sweet::where('slug', $slug)->first();
            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };


        $new_dish->fill($form_data);
        $new_dish->save();

        return redirect()->route('admin.sweets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sweets = Sweet::where('slug', $slug)->first();
        $user_id = Auth::user()->id;
        $pastry = Pastry::where('user_id', $user_id)->first();

        if ($sweets) {
            $data = [
                'sweets' => $sweets,
                'pastry' => $pastry,
            ];
            return view('admin.sweets.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sweets = Sweet::where('slug', $slug)->first();;
        $user_id = Auth::user()->id;
        $pastry = Pastry::where('user_id', $user_id)->first();

        $data = [
            'pastry' => $pastry,
            'sweets' => $sweets,
        ];
        return view('admin.sweets.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sweet $sweet)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'nullable',
            'price' => 'required|max:9',
            'pastry_id' => 'nullable|exists:pastries,id',
            'cover' => 'nullable|image|max:512'
        ]);

        $form_data = $request->all();

        if ($form_data['name'] != $sweet->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;
            $dish_presente = Sweet::where('slug', $slug)->first();
            $contatore = 1;

            while ($dish_presente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $dish_presente = Sweet::where('slug', $slug)->first();
            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };
        $sweet->update($form_data);

        return redirect()->route('admin.sweets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sweet $sweet)
    {
        $sweet->delete();

        return redirect()->route('admin.sweets.index');
    }
}
