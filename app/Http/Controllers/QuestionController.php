<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Questions = Question::orderBy('id', 'desc')->paginate(10);
        return view('Questions.index',compact('Questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pregunta'          => 'required|string|min:5|max:255',
            'respuestaUno'      => 'required|string|min:5|max:255',
            'respuestaDos'       => 'required|string|min:5|max:255',
            'respuestaTres'     => 'required|string|min:5|max:255',
            'respuestaCuatro'   => 'required|string|min:5|max:255',
            'respuestaCorrecta'   => 'required',
        ]);
            $Question = Question::create($request->all());
            return redirect()->route('Questions.show', $Question)->banner('Guardamos con exito el registro');
        // try {
        // } catch (\Throwable $th) {
            // return redirect()->route('Questions.show')->dangerBanner('Problemas para guaardar registro: '.$th->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Question $question,$id)
    {
        $question = Question::findOrFail($id);
        // return $question;
        return view('Questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,$id)
    {
        $question = Question::findOrFail($id);
        return view('Questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question,$id)
    {
        $question = Question::findOrFail($id);
        try {
            $question->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('Questions.index')->dangerBanner('No se modificó ' . $th->getMessage());
        }
        return redirect()->route('Questions.index',$question)->banner('Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,$id)
    {
        $question = Question::findOrFail($id);
        try {
            $question->delete();
        } catch (\Throwable $th) {
            return redirect()->route('Questions.index')->dangerBanner('Registro no eliminado, revisar por que: ' . $th->getMessage());
        }
        return redirect()->route('Questions.index')->banner('Registro eliminado exitosamente.');
    }
}
