@extends('layouts.homeland')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        <button id="btnGetEmployeesUsingFetch">Get Employees</button>
        <select id="mySelect2" class="js-data-example-ajax"></select>
            <table id="tblEmployees" class="table table-striped">
                <thead>
                    <tr>
                        <th>#EMPLEADO</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>GENERO</th>
                        <th>DEPARTAMENTO</th>
                        <th>SALARIO</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
