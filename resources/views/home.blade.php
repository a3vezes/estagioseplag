@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mande um e-mail</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <fieldset>
                    <div class="alert alert-danger">
                    <strong>Erro!</strong>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    </div>
                  </fieldset>
                    @endif
                    
                    Preencha o formulário abaixo para mandar um e-mail com uma mensagem.
                </div>

                <div>
                <form action="{{ Route('enviarEmail') }}" method="post">
                        {{ csrf_field() }} 
                                    <fieldset>
                        <div class="form-group">
                          <label for="email"><b>Enviar para:</b></label>
                          <input type="email" class="form-control" name="email">
                        </div>
                    
                        <div class="form-group">
                          <label for="titulo"><b>Título:</b></label>
                          <input type="text" class="form-control" name="titulo">
                        </div>
                        <div class="form-group">
                          <label for="mensagem"><b>Mensagem :</b></label>
                          <input type="text" class="form-control" name="mensagem">
                          
                        </div>                        
                        <button type="submit" class="btn btn-default">Enviar!	</button>	                        	
                    </form>
                </div>
               
            </div>
        </div>
        <div>
                <a href="{{ URL::route('listar') }}" class="btn btn-default"> Listar E-mails Enviados </a>
        </div>
    </div>
</div>
@endsection
