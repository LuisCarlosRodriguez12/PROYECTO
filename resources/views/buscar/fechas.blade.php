@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buscar Aliados</div>
                <div class="col-md-12">
                    <form action="{{route('buscar.index')}}" method="GET" class="form-inline pull-right" style="padding: 5px;" >
                        @csrf
                        <div class="form-group">
                            <label style="margin-left: 10px;">Fecha Inicial</label>
                            <input class="form-control" type="date" name="created_at" required style="margin-left: 10px;">
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 10px;">Fecha Final</label>
                            <input class="form-control" type="date" name="created_at" required style="margin-left: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px;" >Buscar</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <table class="table table-hover table-striped">
                        <tbody>
                            {{-- @foreach ($lis as $lis) 
                             <tr>
                                <td>{{ $lis ['id'] }}</td> 
                                <td>{{ $lis ['nombre'] }}</td>
                                <td>{{ $lis ['descripcion'] }}</td>
                                <td>{{ $lis ['created_at'] }}</td>
                                 <td>{{$fechas->logo}}</td> 
                            </tr>   
                             @endforeach --}}
                            
                            
                        </tbody>
                    </table>
                    {{-- {{ $difs-render() }} --}}
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection