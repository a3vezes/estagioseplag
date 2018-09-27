@extends('layouts.app')
@section('content')

<table class="table table-bordered">

        <tr>
            <th>E-mail</th>
            <th>Titulo</th>
            <th>Mensagem</th>            
        </tr>
        <tr>
         @foreach($email as $emails)
        <td>{{ $emails->email }}</td>
          <td>{{ $emails->titulo }}</td> 
          <td>{{ $emails->mensagem }}</td>          
        </tr>  
@endforeach  
</table>

<a href="{{ URL::route('home') }}" class="btn btn-default">Voltar </a>
@endsection
