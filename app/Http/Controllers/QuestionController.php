<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Questions = Question::where('user_id', Auth::id())
            ->where('question_status', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('Questions.index', compact('Questions'));
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
    public function store(QuestionStoreRequest $request)
    {
        try {
            $userId = Auth::id();
            $question = Question::create(array_merge($request->all(), ['user_id' => $userId]));
            return redirect()->route('Questions.show', $question->id)->banner('Éxito, Información guardada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('Questions.create')->dangerBanner('Error!, QuestionController:49 ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Question $question, $id)
    {
        $question = Question::findOrFail($id);
        // return $question;
        return view('Questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, $id)
    {
        $question = Question::findOrFail($id);
        return view('Questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        try {
            $question->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('Questions.index')->dangerBanner('No se modificó ' . $th->getMessage());
        }
        return redirect()->route('Questions.index', $question)->banner('Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
