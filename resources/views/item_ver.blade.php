@extends('admin.layouts2.master')

@section('content')
<div class="container mt-5">
    <div class="table-container p-4 bg-white shadow rounded">
        <h2 class="text-primary mb-4">Detalles de Fechas Disponibles</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Fechas Disponibles</th>
                        <th>Horario de Atención</th>
                      
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $fecha->fechas_disp }}</td>
                        <td>{{ $fecha->horarios_de_atencion }}</td>
                      
                        <td>
                            <a href="#" class="btn btn-success btn-custom print-button" onclick="window.print();">Imprimir</a>
                            <a href="{{ route('fecha') }}" class="btn btn-primary btn-custom">Volver</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }
    .table-container {
        background: #ffffff;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
    .table thead th {
        background-color: #007bff;
        color: #ffffff;
        border-color: #0069d9;
        font-size: 1.1em;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #f2f9ff;
    }
    .table tbody tr:nth-child(even) {
        background-color: #ffffff;
    }
    .table tbody tr:hover {
        background-color: #e6f7ff;
    }
    .text-primary {
        color: #007bff;
    }
    .btn-custom {
        border-radius: 20px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-custom:hover {
        transform: scale(1.05);
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #ffffff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
        color: #ffffff;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .print-button {
        margin-right: 10px;
    }
</style>
@endsection
