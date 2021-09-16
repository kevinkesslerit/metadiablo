@extends('layouts.app', ['title' => 'Rune Word Tool', 'description' => 'The MetaDiablo Rune Word Tool, you can use this tool to search for runewords that you can possibly make while playing Diablo II.'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rune Word Tool (beta)</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rwToolSearch') }}">
                            @csrf
                            <div class="row">
                            <div class="col col-form-label text-center">
                                <h5>
                                    Choose Your Runes
                                </h5>
                                <p>This tool is meant for use with <a target="_blank" href="https://us.shop.battle.net/en-us/product/diablo-ii-lord-of-destruction?ref=metadiablo.com">Diablo II: Lord of Destruction</a><small>*</small>
                                    <br><small>*requires <a href="https://us.shop.battle.net/en-us/product/diablo-ii?ref=metadiablo.com">base game</a></small>
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4 col-sm-3 text-center pr-1">
                                    <ul class="list-group list-group-flush form-check">
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeHel" name="Hel">
                                            <label class="form-check-label" for="runeHel">Hel</label>
                                            <img src="{{ asset('img/runes/hel.png') }}" alt="Hel Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeEld" name="Eld">
                                            <label class="form-check-label" for="runeEld">Eld</label>
                                            <img src="{{ asset('img/runes/eld.png') }}" alt="Eld Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeEl" name="El">
                                            <label class="form-check-label" for="runeEl">El</label>
                                            <img src="{{ asset('img/runes/el.png') }}" alt="El Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeNef" name="Nef">
                                            <label class="form-check-label" for="runeNef">Nef</label>
                                            <img src="{{ asset('img/runes/nef.png') }}" alt="Nef Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeTir" name="Tir">
                                            <label class="form-check-label" for="runeTir">Tir</label>
                                            <img src="{{ asset('img/runes/tir.png') }}" alt="Tir Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeIth" name="Ith">
                                            <label class="form-check-label" for="runeIth">Ith</label>
                                            <img src="{{ asset('img/runes/ith.png') }}" alt="Ith Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeEth" name="Eth">
                                            <label class="form-check-label" for="runeEth">Eth</label>
                                            <img src="{{ asset('img/runes/eth.png') }}" alt="Eth Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeTal" name="Tal">
                                            <label class="form-check-label" for="runeTal">Tal</label>
                                            <img src="{{ asset('img/runes/tal.png') }}" alt="Tal Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeRal" name="Ral">
                                            <label class="form-check-label" for="runeRal">Ral</label>
                                            <img src="{{ asset('img/runes/ral.png') }}" alt="Ral Rune" />
                                        </li>
                                    </ul>
                                </div>


                                <div class="col-4 col-sm-3 text-center pr-1">
                                    <ul class="list-group list-group-flush form-check">
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeOrt" name="Ort">
                                            <label class="form-check-label" for="runeOrt">Ort</label>
                                            <img src="{{ asset('img/runes/ort.png') }}" alt="Ort Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeThul" name="Thul">
                                            <label class="form-check-label" for="runeThul">Thul</label>
                                            <img src="{{ asset('img/runes/thul.png') }}" alt="Thul Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeAmn" name="Amn">
                                            <label class="form-check-label" for="runeAmn">Amn</label>
                                            <img src="{{ asset('img/runes/amn.png') }}" alt="Amn Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeSol" name="Sol">
                                            <label class="form-check-label" for="runeSol">Sol</label>
                                            <img src="{{ asset('img/runes/sol.png') }}" alt="Sol Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeShael" name="Shael">
                                            <label class="form-check-label" for="runeShael">Shael</label>
                                            <img src="{{ asset('img/runes/shael.png') }}" alt="Shael Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeDol" name="Dol">
                                            <label class="form-check-label" for="runeDol">Dol</label>
                                            <img src="{{ asset('img/runes/dol.png') }}" alt="Dol Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeIo" name="Io">
                                            <label class="form-check-label" for="runeIo">Io</label>
                                            <img src="{{ asset('img/runes/io.png') }}" alt="Io Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeLum" name="Lum">
                                            <label class="form-check-label" for="runeLum">Lum</label>
                                            <img src="{{ asset('img/runes/lum.png') }}" alt="Lum Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeKo" name="Ko">
                                            <label class="form-check-label" for="runeKo">Ko</label>
                                            <img src="{{ asset('img/runes/ko.png') }}" alt="Ko Rune" />
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-4 col-sm-3 text-center pr-1">
                                    <ul class="list-group list-group-flush form-check">
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeFal" name="Fal">
                                            <label class="form-check-label" for="runeFal">Fal</label>
                                            <img src="{{ asset('img/runes/fal.png') }}" alt="Fal Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeLem" name="Lem">
                                            <label class="form-check-label" for="runeLem">Lem</label>
                                            <img src="{{ asset('img/runes/lem.png') }}" alt="Lem Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runePul" name="Pul">
                                            <label class="form-check-label" for="runePul">Pul</label>
                                            <img src="{{ asset('img/runes/pul.png') }}" alt="Pul Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeUm" name="Um">
                                            <label class="form-check-label" for="runeUm">Um</label>
                                            <img src="{{ asset('img/runes/um.png') }}" alt="Um Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeMal" name="Mal">
                                            <label class="form-check-label" for="runeMal">Mal</label>
                                            <img src="{{ asset('img/runes/mal.png') }}" alt="Mal Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeIst" name="Ist">
                                            <label class="form-check-label" for="runeIst">Ist</label>
                                            <img src="{{ asset('img/runes/ist.png') }}" alt="Ist Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeGul" name="Gul">
                                            <label class="form-check-label" for="runeGul">Gul</label>
                                            <img src="{{ asset('img/runes/gul.png') }}" alt="Gul Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeVex" name="Vex">
                                            <label class="form-check-label" for="runeVex">Vex</label>
                                            <img src="{{ asset('img/runes/vex.png') }}" alt="Vex Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeOhm" name="Ohm">
                                            <label class="form-check-label" for="runeOhm">Ohm</label>
                                            <img src="{{ asset('img/runes/ohm.png') }}" alt="Ohm Rune" />
                                        </li>
                                    </ul>
                                </div>


                                <div class="col col-sm-3 text-center pl-1">
                                    <ul class="list-group list-group-flush form-check">
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeLo" name="Lo">
                                            <label class="form-check-label" for="runeLo">Lo</label>
                                            <img src="{{ asset('img/runes/lo.png') }}" alt="Lo Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeSur" name="Sur">
                                            <label class="form-check-label" for="runeSur">Sur</label>
                                            <img src="{{ asset('img/runes/sur.png') }}" alt="Sur Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeBer" name="Ber">
                                            <label class="form-check-label" for="runeBer">Ber</label>
                                            <img src="{{ asset('img/runes/ber.png') }}" alt="Ber Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeJah" name="Jah">
                                            <label class="form-check-label" for="runeJah">Jah</label>
                                            <img src="{{ asset('img/runes/jah.png') }}" alt="Jah Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeCham" name="Cham">
                                            <label class="form-check-label" for="runeCham">Cham</label>
                                            <img src="{{ asset('img/runes/cham.png') }}" alt="Cham Rune" />
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" id="runeZod" name="Zod">
                                            <label class="form-check-label" for="runeZod">Zod</label>
                                            <img src="{{ asset('img/runes/zod.png') }}" alt="Zod Rune" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <small>&dagger;Sorted by Level Requirement. &Dagger;Shows rune words that you have at least one (1) rune for.</small>
                            <button class="btn btn-accent btn-block" type="submit">Find Rune Words!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
