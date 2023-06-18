<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

/**
 * Class ExperienciaController
 * @package App\Http\Controllers
 */
class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiencias = Experiencia::paginate();

        return view('experiencia.index', compact('experiencias'))
            ->with('i', (request()->input('page', 1) - 1) * $experiencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experiencia = new Experiencia();
        return view('experiencia.create', compact('experiencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Experiencia::$rules);

        $experiencia = Experiencia::create($request->all());

        return redirect()->route('experiencias.index')
            ->with('success', 'Experiencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia = Experiencia::find($id);

        return view('experiencia.show', compact('experiencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiencia = Experiencia::find($id);

        return view('experiencia.edit', compact('experiencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Experiencia $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experiencia $experiencia)
    {
        request()->validate(Experiencia::$rules);

        $experiencia->update($request->all());

        return redirect()->route('experiencias.index')
            ->with('success', 'Experiencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $experiencia = Experiencia::find($id)->delete();

        return redirect()->route('experiencias.index')
            ->with('success', 'Experiencia deleted successfully');
    }
}
