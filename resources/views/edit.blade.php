@extends('layouts.app')
<div class="well">
    {!! Form::model($p, ['route'=>['product.update', $p->id], 'method'=>'POST', 'class'=>'form-horizontal']) !!}
        <div class='form-group'>
            {!! Form::label('product_type_id','Product Type', ['class'=>'col-md-2'])!!}
            {!! Form::select('product_type_id', $product_type_id, '', ['class'=>'col-md-2','placeholder'=>'Select Type'])!!}
        </div>

        <div class='form-group'>
            {!! Form::label('category_id','Select Category', ['class'=>'col-md-2'])!!}
            {!! Form::select('category_id', $category_id, '', ['class'=>'col-md-2','placeholder'=>'Select Category'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Product name', ['class'=>'col-md-2']) !!}
            {!! Form::text('name', null, ['class'=>'col-md-4']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', ['class'=>'col-md-2']) !!}
            {!! Form::textarea('description', null, ['class'=>'col-md-4']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
