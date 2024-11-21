@extends('admin.layouts2.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-primary">Inicio</h1>
    </div> 

    <!-- Fechas Disponibles -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #de8e2c; color: #fff;">
                    <h3 class="mb-0">Salas</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sa as $sala)
                                    <tr>
                                        <td>{{ $sala->nombre }}</td>
                                        
                                        <td class="text-center">
                                            <form action="{{ route('sala.show', $sala->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm">
                                                    <i class="fas fa-eye"></i> Ver
                                                </button>
                                            </form>
                                            <form action="{{ route('sala.edit', $sala->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-warning btn-rounded btn-sm text-white">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>
                                            </form>
                                            <form action="{{ route('sala.destroy', $sala->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <form action="{{ route('sala.create') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-rounded btn-lg">
                                <i class="fas fa-plus"></i> Crear Categorias
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Fechas Disponibles -->

</section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection

@section('styles')
<style>
    .btn-rounded {
        border-radius: 50px;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.25rem;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .card {
        border: none;
    }

    /* Cambiar el color de fondo del encabezado */
    .card-header {
        background-color: #de8e2c; /* Cambiado a tu color deseado */
        color: #fff;
    }

    .card-body {
        padding: 20px;
    }
</style>
@endsection
