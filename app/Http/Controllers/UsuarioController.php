<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\View\View
   */
  public function index(Request $request)
  {
    $keyword = $request->get('search');
    $perPage = 25;

    if (!empty($keyword)) {
      $usuario = Usuario::where('nombre', 'LIKE', "%$keyword%")
        ->orWhere('nombre_completo', 'LIKE', "%$keyword%")
        ->orWhere('password', 'LIKE', "%$keyword%")
        ->orWhere('avatar', 'LIKE', "%$keyword%")
        ->orWhere('usu_verificado', 'LIKE', "%$keyword%")
        ->orWhere('tipo', 'LIKE', "%$keyword%")
        ->orWhere('direccion', 'LIKE', "%$keyword%")
        ->orWhere('localidad', 'LIKE', "%$keyword%")
        ->orWhere('mail', 'LIKE', "%$keyword%")
        ->orWhere('telefono', 'LIKE', "%$keyword%")
        ->orWhere('observacion', 'LIKE', "%$keyword%")
        ->latest()->paginate($perPage);
    } else {
      $usuario = Usuario::latest()->paginate($perPage);
    }

    return view('App.usuario.index', compact('usuario'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('App.usuario.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'nombre' => 'required|max:60',
      'nombre_completo' => 'required|max:60',
      'password' => 'required',
      'tipo' => 'required',
      'direccion' => 'required',
      'mail' => 'required',
      'localidad' => 'required',
      'telefono' => 'required',
      'observacion' => 'required'
    ]);
    $requestData = $request->all();
    if ($request->hasFile('avatar')) {
      $requestData['avatar'] = $request->file('avatar')
        ->store('uploads', 'public');
    }

    Usuario::create($requestData);

    return redirect('usuario')->with('flash_message', 'Usuario added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function show($id)
  {
    $usuario = Usuario::findOrFail($id);

    return view('App.usuario.show', compact('usuario'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function edit($id)
  {
    $usuario = Usuario::findOrFail($id);

    return view('App.usuario.edit', compact('usuario'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'nombre' => 'required|max:60',
      'nombre_completo' => 'required|max:60',
      'password' => 'required',
      'tipo' => 'required',
      'direccion' => 'required',
      'mail' => 'required',
      'localidad' => 'required',
      'telefono' => 'required',
      'observacion' => 'required'
    ]);
    $requestData = $request->all();
    if ($request->hasFile('avatar')) {
      $requestData['avatar'] = $request->file('avatar')
        ->store('uploads', 'public');
    }

    $usuario = Usuario::findOrFail($id);
    $usuario->update($requestData);

    return redirect('usuario')->with('flash_message', 'Usuario updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function destroy($id)
  {
    Usuario::destroy($id);

    return redirect('usuario')->with('flash_message', 'Usuario deleted!');
  }
}
