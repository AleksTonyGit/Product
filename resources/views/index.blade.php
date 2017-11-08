@extends('layouts.app')
<h3>Product</h3>
<div class="well1">
    {!! Form::open(['action'=>'ProductController@search','class'=>'form']) !!}
        <div class="input-group">
            {!! Form::text('searchform', '', ['class'=>'form-control','placeholder'=>'Enter Name of Product'])!!}
            <span class="input-group-btn">
                <button class="btn btn-info btn-md glyphicon glyphicon-search" type="submit"></button>
            </span>
        </div>
    {!! Form::close() !!}

    <div class="pro">
        <div class="add_product">
            <a href="{{url('create')}}" class="btn btn-lg btn-info" type="submit">Add new Product</a>
        </div>
        <div class="list-box">
            <ul>
                @foreach($pro as $p)
                <li class="list_item">
                    <div class="pro">
                        <div class="name">
                            {{$p->name}}
                        </div>
                        <div class="foto">
                            @if($p->image !="")
                                <img src="{{asset($p->image)}}" class="image">
                            @endif
                        </div>
                        <div class="type">
                            {{$p->type}}
                        </div>
                        <div class="category">
                            {{$p->category}}
                        </div>
                        <div class="desc">
                            <p>{{$p->description}}</p>
                        </div>
                        <div class="action">
                            <a href="{{route('delete_product',['id'=>$p->id])}}"
                               onclick="return confirm('Are you sure you want to delete?')">
                                <button type="button" class="btn btn-md btn-danger  glyphicon glyphicon-trash"></button>
                            </a>
                            <a href="{{ route('product.edit', $p->id) }}" class="btn btn-md btn-info  glyphicon glyphicon-pencil"></a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

</div>












