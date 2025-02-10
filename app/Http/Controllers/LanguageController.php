<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lang = Language::orderBy('id', 'asc')->get();
        return view('language.index', compact('lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('language.add_language');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'code' => 'required|unique:languages',
                'status' => 'required',
            ],
            [
                'name.required' => trans('form.required',['attribute'=>trans('site.name')]),
                'code.required' =>
                trans('form.required', ['attribute' => trans('site.code')]),
                'status.required' =>
                trans('form.required', ['attribute' => trans('site.status')]),
                'code.unique' =>
                trans('form.unique', ['attribute' => trans('site.code')]),
            ],
        );

        try {
            Language::create($request->only('name', 'code', 'status'));
            return redirect()->route('languages.index')->withSuccess(trans('site.lang.add_success'));
        } catch (\Throwable $th) {
            // return back()->withError($th->getMessage())->withInput();
            return back()->withError(trans('site.lang.add_error'))->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Language::findOrFail($id);
        return view('language.add_language', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'code' => 'required|unique:languages,code,' . $id,
                'status' => 'required',
            ],
            [
                'name.required' => trans('form.required', ['attribute' => trans('site.name')]),
                'code.required' =>
                trans('form.required', ['attribute' => trans('site.code')]),
                'status.required' =>
                trans('form.required', ['attribute' => trans('site.status')]),
                'code.unique' =>
                trans('form.unique', ['attribute' => trans('site.code')]),
            ],
        );

        try {
            Language::where('id', $id)->update($request->only('name', 'code', 'status'));
            return redirect()->route('languages.index')->withSuccess(trans('site.lang.update_success'));
        } catch (\Throwable $th) {
            // return back()->withError($th->getMessage())->withInput();
            return back()->withError(trans('site.lang.update_error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
