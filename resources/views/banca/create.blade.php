 @extends('layouts.main')

 @section('title', 'Criar Banca')

 @section('content')
 <div class="custom-container">
     <div>
         <div>
             <i class="fas fa-chalkboard fa-2x"></i>
             <h3 class="smaller-font">Criar Banca</h3>
         </div>
     </div>
 </div>
 <div class="container mt-4">
     <form method="post" action="{{ route('banca.store') }}">
         @csrf
         <div class="form-group">
             <label for="data" class="form-label">Data da banca:</label>
             <input type="date" name="data" id="data" class="form-control" required>
             <label for="local" class="form-label">Local:</label>
             <input type="text" name="local" id="local" class="form-control" placeholder="Local da banca" required>

             <div class="form-group">
                 <label for="professores" class="form-label">Professores internos:</label>

                 @foreach ($professores_internos as $professor_interno)
                 <div class="form-check">
                     <input type="checkbox" class="form-check-input" name="professores_internos[]" id="{{$professor_interno->id}}" value="{{$professor_interno->id}}">
                     <label for="" class="form-check-label">{{$professor_interno->nome}} </label>
                 </div>
                 @endforeach
                 <a href="{{ route('professor.create') }}">Cadastrar professor interno</a>
             </div>
             <div class="form-group">
                 <label for="professores" class="form-label">Professores externos:</label>

                 @foreach ($professores_externos as $professor_externo)
                 <div class="form-check">
                     <input type="checkbox" class="form-check-input" name="professores_externos[]" id="{{$professor_externo->id}}" value="{{$professor_externo->id}}">
                     <label for="" class="form-check-label">{{$professor_externo->nome}} - {{$professor_externo->filiacao}}</label>
                 </div>
                 @endforeach
                 <a href="{{ route('professor-externo.create') }}">Cadastrar professor externo</a>
             </div>
         </div>
         <button type="submit" class="btn custom-button custom-button-castastrar-tcc btn-default">Cadastrar</button>
         <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a href="{{ route('banca.index') }}" class="btn-back">Cancelar</a></button>

     </form>
 </div>
 @stop