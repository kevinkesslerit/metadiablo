@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="h4">MetaDiablo Credits</h1></div>

                    <div class="card-body">
                            <div class="row">
                            <div class="col col-form-label text-center">
                                <h2 class="h5">Many thanks to those on this list for their helpful contributions.</h2>
                                <p>Sorted in no particular order, linked to website profile where possible.</p>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col">
                            <table class="table table-sm text-light table-borderless">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"><img src="{{ asset('img/Diablo_II_sprites/chaos-barbhireable.png') }}"/></th>
                                    <td><a href="http://classic.battle.net/diablo2exp/" target="_blank">The Arreat Summit</a></td>
                                    <td>Providing lots of reference.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/items/rcham.png') }}"/></th>
                                    <td><a href="{{ route('profileView',['id' => '2', 'name' => 'Venue']) }}">Venue</a></td>
                                    <td>Support with development.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/Diablo_II_sprites/ruststorm3.png') }}"/></th>
                                    <td>Kaylin</td>
                                    <td>Answering technical game questions.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/items/tsc.png') }}"/></th>
                                    <td>Blizzix</td>
                                    <td>Contributing to development. (Hadriel)</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><i class="fas fa-horse"></i></th>
                                    <td>Emjayen</td>
                                    <td>Answering technical game questions.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/items/ear.png') }}"/></th>
                                    <td>bb</td>
                                    <td>Inspiring me to make this list with a table.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/items/invvpl.png') }}"/></th>
                                    <td><a href="{{ route('profileView',['id' => '4', 'name' => 'flump']) }}">flump</a></td>
                                    <td>Support with community development.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/items/gsbe.png') }}"/></th>
                                    <td><a href="https://d2mods.info/" target="_blank">The Phrozen Keep</a></td>
                                    <td>Answering technical game questions and providing reference.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/diablo_ii_icons/Treasure-Closed-icon.png') }}"/></th>
                                    <td><a href="{{ route('profileView',['id' => '7', 'name' => 'MeekNasty']) }}">MeekNasty</a></td>
                                    <td>Support with development.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/diablo_ii_icons/Tyreal-icon.png') }}"/></th>
                                    <td>Blind</td>
                                    <td>Support with development.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/blizzard/blizz-logo.png') }}" width="28" height="28"/></th>
                                    <td>Classic Games Team</td>
                                    <td>For their continued maintinance and updates on Diablo II.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/diablo_ii_icons/Diablo-icon.png') }}"/></th>
                                    <td>MetaDiablo</td>
                                    <td>Without everyones support this community and website would not even be possible.</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><img src="{{ asset('img/random/expansion.png') }}"/></th>
                                    <td>Blizzard North</td>
                                    <td>The founding members and developers of the Diablo franchise.</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
