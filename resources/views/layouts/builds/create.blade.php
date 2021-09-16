@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col my-5">
                <div class="card first-layer">
                    <h3 class="card-header">Character Builder</h3>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 blog-main">
                                <h4 class="h2 text-center"><img src="{{ asset('img/Diablo_II_sprites/Amazon_Sprite.gif') }}" class="img-responsive mx-auto d-block pt-3" alt="Amazon Icon" /> Amazon</h4>

                                <div class="col mb-3">
                                    <label for="validationDefault01">Build name</label>
                                    <input type="text" class="form-control" id="validationDefault01" required>

                                </div>


                                <div class="row class-strip mx-auto">

                                    <div class="col">

                                        <p class="small">Click parts of the image below that you wish to edit.</p>
                                        <div class="row">

                                            <div class="col">

                                                <img src="{{ asset('img/builds/inventory1.png') }}" class="inventory-one" alt="Inventory1" usemap="#gearMap"/>

                                                <map name="gearMap">
                                                    <area alt="left hand" title="left hand" href="JavaScript:void(0);" coords="14,44,82,164" shape="rect" data-toggle="modal" data-target="#leftModal">
                                                    <area alt="right hand" title="right hand" href="JavaScript:void(0);" coords="247,44,313,163" shape="rect"  data-toggle="modal" data-target="#rightModal">
                                                    <area alt="gloves" title="gloves" href="#" coords="14,173,79,238" shape="rect">
                                                    <area alt="boots" title="boots" href="#" coords="247,173,311,237" shape="rect">
                                                    <area alt="helmet" title="helmet" href="#" coords="130,1,193,63" shape="rect">
                                                    <area alt="armor" title="armor" href="#" coords="131,71,195,164" shape="rect">
                                                    <area alt="amulet" title="amulet" href="#" coords="204,30,236,61" shape="rect">
                                                    <area alt="left ring" title="left ring" href="#" coords="89,172,124,208" shape="rect">
                                                    <area alt="right ring" title="right ring" href="#" coords="203,173,238,207" shape="rect">
                                                    <area alt="belt" title="belt" href="#" coords="130,172,196,207" shape="rect">
                                                    <area alt="left side hand swap" title="left side hand swap" href="#" coords="14,23,83,45" shape="rect">
                                                    <area alt="right side hand swap" title="right side hand swap" href="#" coords="247,22,314,44" shape="rect">
                                                </map>

                                                <div class="lHand_main">

                                                </div>

                                                <div class="rHand_main">

                                                </div>

                                                <div class="armor">

                                                </div>

                                                <div class="helmet">

                                                </div>

                                                <div class="gloves">

                                                </div>

                                                <div class="boots">

                                                </div>

                                                <div class="belt">

                                                </div>

                                                <div class="lRing">

                                                </div>

                                                <div class="rRing">

                                                </div>

                                                <div class="amulet">

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>




                            </div><!-- /.blog-main -->

                            <aside class="col-md-6">
                                <h3 class="h2">Notes</h3>
                                <div class="mb-3">
                                    <textarea class="form-control" id="validationTextarea" required></textarea>
                                </div>

                            </aside><!-- /.blog-sidebar -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LH Modal -->
    <div class="modal fade" id="leftModal" tabindex="-1" role="dialog" aria-labelledby="exampleLeftLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLeftLabel">Equip Left Hand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Unique Weapons</a>
                    <div class="dropdown-menu default-menu main-menu sm-main-menu animation" data-animation = "fadeIn">
                        <!-- Nav tabs -->
                        <div class="sm-main-nav weapons-dropdown">
                            <a class="dropdown-item" href="#">None</a><hr>
                            <a class="dropdown-item " href="#">Stoneraven</a><hr>
                            <a class="dropdown-item" href="#">Lycander's Flank</a><hr>
                            <a class="dropdown-item" href="#">Lycander's Aim</a><hr>
                            <a class="dropdown-item" href="#">Titan's Revenge</a><hr>
                            <a class="dropdown-item" href="#">Thunderstroke</a><hr>
                            <a class="dropdown-item" href="#">Blood Raven's Charge</a><hr>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save equipped</button>
                </div>
            </div>
        </div>
    </div>

    <!-- RH Modal -->
    <div class="modal fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleRightLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleRightLabel">Equip Right Hand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Unique Weapons</a>
                    <div class="dropdown-menu default-menu main-menu sm-main-menu animation" data-animation = "fadeIn">
                        <!-- Nav tabs -->
                        <div class="sm-main-nav weapons-dropdown">
                            <a class="dropdown-item" href="#">None</a><hr>
                            <a class="dropdown-item" href="#" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">Stoneraven</a><hr>
                            <a class="dropdown-item" href="#">Lycander's Flank</a><hr>
                            <a class="dropdown-item" href="#">Lycander's Aim</a><hr>
                            <a class="dropdown-item" href="#">Titan's Revenge</a><hr>
                            <a class="dropdown-item" href="#">Thunderstroke</a><hr>
                            <a class="dropdown-item" href="#">Blood Raven's Charge</a><hr>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save equipped</button>
                </div>
            </div>
        </div>
    </div>
@endsection
