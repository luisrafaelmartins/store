@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$details['title']}}</div>

                    <div class="panel-body">

                        <form action="{{$path}}" method="POST" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            @if(isset($record->{$details['pk']}) )
                                <input type="hidden" name="_method" value="PUT"/>
                            @endif
                            @foreach($details['fields'] as $kfield => $field)
                                @include("form.{$field['type']}",['name' => $field['name'],'designation' => $field['designation'],'visible' => $field['visible'],'value' => isset($record->{$field['name']}) ? $record->{$field['name']} : '', 'list' => isset($field['list']) ? ${$field['list']} : [] , 'other' => isset($field['other']) ? ${$field['other']} : false ])
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Produtos</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço uni.</th>
                                    <th>Preço</th>
                                    <th>IVA</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($record->details as $details)
                                    <tr>
                                        <td>{{$details->products->name}}</td>
                                        <td>{{$details->price_uni}} €</td>
                                        <td>{{$details->price}} €</td>
                                        <td>{{$details->price_tax * 100}}  % </td>
                                        <td>{{$details->quantity}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pagamento</div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
