@extends('layouts.app')

<div class="create">
    <div class="col-md-8">
        @if(count(session('errors1')) > 0)
            <div class="alert alert-danger">
                @foreach(session('errors1')->all() as $er)
                    {{$er}}<br/>
                @endforeach
            </div>
        @endif

        @if(session('message'))
            <div class="alert alert-success" >
                {{session('message')}}
            </div>
        @endif


        <div class="well">
            {!! Form::model($product, array('action'=>'ProductController@store','files'=>true,'class'=>'form-horizontal')) !!}
                <div class='form-group'>
                    {!! Form::label('product_type_id','Product Type',['class'=>'col-md-2'])!!}
                    {!! Form::select('product_type_id', $product_type_id, '', ['class'=>'col-md-4','placeholder'=>'Select Type'])!!}
                </div>

                <div class='form-group'>
                    {!! Form::label('category_id','Category', ['class'=>'col-md-2'])!!}
                    {!! Form::select('category_id', $category_id, '', ['class'=>'col-md-4','placeholder'=>'Select Category'])!!}
                </div>

                <div class='form-group'>
                    {!! Form::label('name','Name', ['class'=>'col-md-2'])!!}
                    {!! Form::text('name', '', ['class'=>'col-md-4'])!!}
                </div>

                <div class='form-group'>
                    {!! Form::label('description','Description', ['class'=>'col-md-2'])!!}
                    {!! Form::textarea('description', '', ['class'=>'col-md-5','cols'=>'','rows'=>''])!!}
                </div>

                <div class='form-group'>
                    {!! Form::label('image','Add Image', ['class'=>'col-md-2'])!!}
                    {!! Form::file('image', '', ['class'=>'col-md-10'])!!}
                </div>
                <button class="btn btn-success" type="submit">Add Product</button>
            {!! Form::close() !!}
        </div>
        <div class="return">
            <a href="{{url('index')}}" class="btn btn-md btn-info" type="submit">Return</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="well">
            @if ( count( $errors ) > 0 )
                <div class="alert alert-danger" role="alert">
                    <?php
                    $messages = $errors->all(':message');
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <h5>Warning!</h5>
                    <ul>
                        @foreach($messages as $message)
                            {{$message}}
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="add_type">
                <div class="title_type">
                    <h4> If you want to add new product type - please fill out the form</h4>
                </div>
                <form name="createnewproduct_type" method="POST" action="{{route('create_product_type')}}">
                    {{ csrf_field() }}
                    <fieldset>
                        @if ($message = Session::get('success1'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Product type</label>
                            <input name="name" type="text" class="form-control" placeholder="Product type" value="{{old('name')}}">
                            <button type="submit" class="btn btn-success">Create product type!</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="add_cat">
                <div class="title_category">
                    <h4> If you want to add new category type - please fill out the form</h4>
                </div>
                <form name="createnewcategory" method="POST" action="{{route('create_category')}}">
                    {{ csrf_field() }}
                    <fieldset>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input name="name" type="text" class="form-control" placeholder="Category" value="{{old('name')}}">
                            <button type="submit" class="btn btn-success">Create category!</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>





