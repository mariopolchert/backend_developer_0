<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormatRequest;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formats = Format::paginate(20);

        return view('admin.formats.index', compact('formats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormatRequest $request)
    {
        // $data = $request->validate([
        //     'type' => ['required', 'string', 'unique:formats'],
        //     'coefficient' => ['required', 'numeric', 'gt:0'],
        // ]);

        $format = Format::create([
            'type' => $request->type,
            'coefficient' => $request->coefficient,
        ]);

        return redirect()->route('formats.index')->with('success', 'Uspješno spremljen medij ' . $format->type);
    }

    /**
     * Display the specified resource.
     */
    public function show(Format $format)
    {
        $format = Format::where('id', $format->id)->with(['copies.movie.genre', 'copies.movie.price'])->first();

        return view('admin.formats.show', compact('format'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Format $format)
    {
        return view('admin.formats.edit', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Format $format)
    {
        $data = $request->validate([
            'type' => ['required', 'string', Rule::unique('formats')->ignore($format)],
            'coefficient' => ['required', 'numeric', 'gt:0'],
        ]);
       
        $format->update($data);

        return redirect()->route('formats.index')->with('success', 'Uspješno izmijenjen medij ' . $data['type']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Format $format)
    {
        $type = $format->type;
        $format->delete();

        return redirect()->back()->with('success', 'Uspješno obrisan medij ' . $type);
    }
}
