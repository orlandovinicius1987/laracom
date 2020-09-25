@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($producers)
            <div class="box">
                <div class="box-body">
                    <h2>Categorias</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-3">Categoria</td>
                            <td class="col-md-3">Logo</td>
                            <td class="col-md-3">Status</td>
                            <td class="col-md-3">Ações</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($producers as $producer)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.producers.show', $producer->id) }}">{{ $producer->name }}</a></td>
                                <td>
                                    @if(isset($producer->cover))
                                        <img src="{{ asset("storage/$producer->cover") }}" alt="" class="img-responsive">
                                    @endif
                                </td>
                                <td>@include('layouts.status', ['status' => $producer->status])</td>
                                <td>
                                    <form action="{{ route('admin.producers.destroy', $producer->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.producers.edit', $producer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                            <button onclick="return confirm('Tem Certeza?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Apagar</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $producers->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection