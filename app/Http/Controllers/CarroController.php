<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

/**
 * Class CarroController
 * @package App\Http\Controllers
 */
class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::paginate();

        return view('carro.index', compact('carros'))
            ->with('i', (request()->input('page', 1) - 1) * $carros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carro = new Carro();
        return view('carro.create', compact('carro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carro::$rules);

        $carro = Carro::create($request->all());

        return redirect()->route('carros.index')
            ->with('success', 'Carro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = Carro::find($id);

        return view('carro.show', compact('carro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = Carro::find($id);

        return view('carro.edit', compact('carro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carro $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carro $carro)
    {
        request()->validate(Carro::$rules);

        $carro->update($request->all());

        return redirect()->route('carros.index')
            ->with('success', 'Carro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carro = Carro::find($id)->delete();

        return redirect()->route('carros.index')
            ->with('success', 'Carro deleted successfully');
    }
}
