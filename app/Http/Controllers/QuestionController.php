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
        $Questions = Question::all();
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
            'repuestaDos'       => 'required|string|min:5|max:255',
            'respuestaTres'     => 'required|string|min:5|max:255',
            'respuestaCuatro'   => 'required|string|min:5|max:255',
            'respuestaCorrecta'   => 'required',
        ]);
        try {
            $newQuestion = Question::create($request->all());
            return redirect()->route('Questions.index', $newQuestion)->banner('Guardamos con exito el registro');
        } catch (\Throwable $th) {
            return redirect()->route('Questions.index')->dangerBanner('Problemas para guaardar registro: '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $QuestionEdit = Question::findOrFail($id);
        return view('Questions.edit',compact('QuestionEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        return $request;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
