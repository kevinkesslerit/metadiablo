@extends('layouts.app', ['title' => 'Area Level Tool', 'description' => 'The MetaDiablo Area Level Tool, you can use this tool to search for various area levels throughout the game.'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Area Levels Tool</div>
                      <div class="card-body">
                      <form method="POST" action="{{ route('areaLevelsSearch') }}">
                      @csrf
                            <div class="row">
                                <div class="col col-form-label text-center">
                                    <h5>
                                      Use the search options below to display area levels.
                                    </h5>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">Patch Version</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patchName" id="patchName114d" value="1.14D" checked>
                                            <label class="form-check-label" for="patchName114d">
                                                1.1x
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">Version</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="version" id="classic" value="classic" checked>
                                        <label class="form-check-label" for="classic">
                                            Classic
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="version" id="expansion" value="expansion">
                                        <label class="form-check-label" for="expansion">
                                            Expansion
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">Act</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="act1" value="Act 1" checked>
                                        <label class="form-check-label" for="act1">
                                            Act I
                                        </label>
                                        </div>

                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="act2" value="Act 2">
                                        <label class="form-check-label" for="act2">
                                            Act II
                                        </label>
                                        </div>

                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="act3" value="Act 3">
                                        <label class="form-check-label" for="act3">
                                            Act III
                                        </label>
                                        </div>

                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="act4" value="Act 4">
                                        <label class="form-check-label" for="act4">
                                            Act IV
                                        </label>
                                        </div>

                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="act5" value="Act 5">
                                        <label class="form-check-label" for="act5">
                                            Act V
                                        </label>
                                        </div>

                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="act" id="actAll" value="Act ">
                                        <label class="form-check-label" for="actAll">
                                            All Acts
                                        </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">Difficulty <span class="small">(min level - max level)</span></legend>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="difficulty" id="normal" value="Normal" checked>
                                        <label class="form-check-label" for="normal">
                                            Normal <span class="small">(1-43)</span>
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="difficulty" id="nightmare" value="Nightmare">
                                        <label class="form-check-label" for="nightmare">
                                            Nightmare <span class="small">(26-68)</span>
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="difficulty" id="hell" value="Hell">
                                        <label class="form-check-label" for="hell">
                                            Hell <span class="small">(51-93)</span>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">Min - Max Level Search*<p class="small">*Leave blank for 1-110 level range</p></legend>
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                            <input type="number" class="form-control" id="minlvl" name="minlvl" placeholder="Min. Level" min="1" max="110">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                            <input type="number" class="form-control" id="maxlvl" name="maxlvl" placeholder="Max. Level" min="1" max="110">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <button class="btn btn-accent btn-block" type="submit">Find Area Levels!</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
