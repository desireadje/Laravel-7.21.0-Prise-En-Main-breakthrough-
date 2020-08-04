@extends('layouts.app')

@section('content')
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget ">

                        {{-- notifications --}}
                        @if (Session::has('set_flashdata'))
                            {{ Session::get('set_flashdata') }}
                        @endif

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Formulaire de creation de catégories</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="formcontrols">
                                        <form method="post" action="{{ route('admin.categories.store') }}" id="edit-profile" class="form-horizontal">
                                            @csrf
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label" for="name_cat">Catégorie</label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="name_cat" name="name_cat" placeholder="Nom de la catégorie">
                                                            @error('name_cat')
                                                                <small class="text-danger">{{ $errors->first('name_cat') }}</small>
                                                                {{-- <small class="text-danger">Ce champ est requis</small> --}}
                                                            @enderror
                                                    </div> <!-- /controls -->
                                                </div> <!-- /control-group -->

                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="{{ route('admin.categories.index') }}" class="btn" href="">Cancel</a>
                                                </div> <!-- /form-actions -->
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->
                </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
@endsection
