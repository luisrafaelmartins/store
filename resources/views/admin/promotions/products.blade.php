@extends('app')

@section('content')
    <div class="container">
        <form action="{{$path}}" method="POST" class="form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$details['title']}}</div>
                        <div class="panel-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            @if(isset($record->{$details['pk']}) )
                                <input type="hidden" name="_method" value="PUT"/>
                            @endif
                            @foreach($details['fields'] as $kfield => $field)
                                @include("form.{$field['type']}",['name' => $field['name'],'designation' => $field['designation'],'visible' => $field['visible'],'value' => isset($record->{$field['name']}) ? $record->{$field['name']} : '', 'list' => isset($field['list']) ? ${$field['list']} : [] , 'other' => isset($field['other']) ? $field['other'] : false ])
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default" style="max-height: 500px;overflow-y: scroll;overflow-x: hidden;">
                        <div class="panel-heading">Produtos</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionado</th>
                                        <th>Produto</th>
                                        <th>Categoria</th>
                                        <th>Marca</th>
                                        <th>Tipo</th>
                                        <th>Preço</th>
                                        <th>IVA</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" style="width: 50px;margin-left: 25%" class="checkbox11 input-sm pull-left" name="products[]" value="{{$product->id}}" {{$selectedProducts->contains($product->id) ? 'checked' : '' }}/>
                                                </td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->category}}</td>
                                                <td>{{$product->brand}}</td>
                                                <td>{{$product->type}}</td>
                                                <td>{{$product->price}} €</td>
                                                <td>{{($product->price_tax)}}  % </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-3 col-sm-8">
                @include("form.submit",['name' => 'save','designation' => 'Guardar','visible' => true,'value' => 'Guardar', 'list' =>  [] , 'other' =>  false ])
            </div>
        </form>
    </div>
@endsection
