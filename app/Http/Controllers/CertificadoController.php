<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Proyecto;
use App\Models\Producto;
use Illuminate\Http\Request;


/**
 * Class CertificadoController
 * @package App\Http\Controllers
 */
class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificados = Certificado::all();
        $proyectos = Proyecto::all();
        $productos = Producto::all();

        return view('home', compact('certificados'))
            ->with('i', (request()->input('page', 1) - 1) * $certificados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificado = new Certificado();
        return view('certificado.create', compact('certificado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Certificado::$rules);

        $certificado = Certificado::create($request->all());

        return redirect()->route('certificados.index')
            ->with('success', 'Certificado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificado = Certificado::find($id);

        return view('certificado.show', compact('certificado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificado = Certificado::find($id);

        return view('certificado.edit', compact('certificado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Certificado $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        request()->validate(Certificado::$rules);

        $certificado->update($request->all());

        return redirect()->route('certificados.index')
            ->with('success', 'Certificado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $certificado = Certificado::find($id)->delete();

        return redirect()->route('certificados.index')
            ->with('success', 'Certificado deleted successfully');
    }
}
