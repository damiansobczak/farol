<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condition;
use Illuminate\Support\Facades\Validator;

class ConditionController extends Controller
{
    /**
     * Request validation function
     */
    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:3000'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = Condition::latest()->get();
        return view('admin.pages.conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.conditions.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conditionValidated = $this->validator($request->all())->validate();
        $condition = Condition::create($conditionValidated);
        session()->flash('success', 'Dokument został pomyślnie utworzony!');

        return redirect(route('admin.conditions.edit', $condition->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condition = Condition::findOrFail($id);
        return view('admin.pages.conditions.form', compact('condition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $condition = Condition::findOrFail($id);
        $conditionValidated = $this->validator($request->all())->validate();
        $condition->update($conditionValidated);

        return back()->with('success', 'Dokument został pomyślnie zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condition = Condition::findOrFail($id);
        $condition->delete();

        return redirect(route('admin.conditions'))->with('success', 'Dokument został pomyślnie usunięty!');
    }
}
