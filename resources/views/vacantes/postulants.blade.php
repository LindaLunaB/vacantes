@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-primary">{{ $vacante->name }}</h1>

        @if (count($vacante->postulants))
            <ul class="nav nav-tabs" id="tab_remisiones" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active d-flex align-items-center" id="pendientes" data-toggle="tab" href="#pendientes0" role="tab" aria-controls="Pendientes" aria-selected="true">
                        Revisión de documentación
                    </a>
                </li>

                <li class="nav-item repetido" id="li-peticionario" role="presentation">
                    <a class="nav-link d-flex align-items-center" id="examen1" data-toggle="tab" href="#examen10" role="tab" aria-controls="examen1" aria-selected="true">
                        Examen de conocimientos
                    </a>
                </li>

                <li class="nav-item repetido" id="li-peticionario" role="presentation">
                    <a class="nav-link d-flex align-items-center" id="rechazados" data-toggle="tab" href="#rechazados0" role="tab" aria-controls="Rechazados" aria-selected="true">
                        Rechazados
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="pendientes0" role="tabpanel" aria-labelledby="pendientes">
                    <div class="container my-4">
                        <h5 class="text-primary my-4">Documentación solicitada para la vacante:</h5>
                        <div class="row">
                            @if ($vacante->acta == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Acta de nacimiento</p>
                                </div>
                            @endif
                            @if ($vacante->ine == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Identificación oficial</p>
                                </div>
                            @endif
                            @if ($vacante->cv == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">CV con foto y documentos</p>
                                </div>
                            @endif
                            @if ($vacante->ced_prof == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Titulo y cédula profesional</p>
                                </div>
                            @endif
                            @if ($vacante->ced_esp == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Diploma y cédula de espcialidad</p>
                                </div>
                            @endif
                            @if ($vacante->doc_migr == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Documento migratorio</p>
                                </div>
                            @endif
                            @if ($vacante->cert_med == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Certificado médico (HUP)</p>
                                </div>
                            @endif
                            @if ($vacante->cert_prep == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Certificado preparatoria</p>
                                </div>
                            @endif
                            @if ($vacante->cert_prep_tec == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Certificado carrera técnica</p>
                                </div>
                            @endif
                            @if ($vacante->curp == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">CURP</p>
                                </div>
                            @endif
                            @if ($vacante->licencia_manejo == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Licencia vigente para conducir</p>
                                </div>
                            @endif
                            @if ($vacante->comprobante_domicilio == 1)
                                <div class="col-auto">
                                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                                    <p class="text-primary mt-2">Comprobante domicilio</p>
                                </div>
                            @endif
                        </div>
                        <table class="table table-hover my-3">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary" scope="col">Nombre</th>
                                    <th class="text-center text-secondary" scope="col">Apellidos</th>
                                    <th class="text-center text-secondary" scope="col">Email</th>
                                    <th class="text-center text-secondary" scope="col">Telefono</th>
                                    <th class="text-center text-secondary" scope="col">Documentos</th>
                                    <th class="text-center text-secondary" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacante->postulants as $postulant)
                                    @if($postulant->status== 1 && $postulant->level == 0)
                                        <tr>
                                            <td class="text-center">
                                                {{ $postulant->user->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->apellidos }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->telefono }}
                                            </td>
                                            <td class="text-center">
                                                @if ($vacante->acta == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'acta') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/$file" target="_blank" rel="noopener noreferrer">Acta de nacimiento</a></p>
                                                @endif
                                                @if ($vacante->ine == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'ine') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Identificación oficial</a></p>
                                                @endif
                                                @if ($vacante->cv == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'cv') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">CV con foto y documentos</a></p>
                                                @endif
                                                @if ($vacante->ced_prof == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'ced_prof') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Titulo y cédula profesional</a></p>
                                                @endif
                                                @if ($vacante->ced_esp == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'ced_esp') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Diploma y cédula de espcialidad</a></p>
                                                @endif
                                                @if ($vacante->doc_migr == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'doc_migr') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Documento migratorio</a></p>
                                                @endif
                                                @if ($vacante->cert_med == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'cert_med') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Certificado médico (HUP)</a></p>
                                                @endif
                                                @if ($vacante->cert_prep == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'cert_prep') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Certificado preparatoria</a></p>
                                                @endif
                                                @if ($vacante->cert_prep_tec == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'cert_prep_tec') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Certificado carrera técnica</a></p>
                                                @endif
                                                @if ($vacante->curp == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'curp') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">CURP</a></p>
                                                @endif
                                                @if ($vacante->licencia_manejo == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'licencia_manejo') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Licencia vigente para conducir</a></p>
                                                @endif
                                                @if ($vacante->comprobante_domicilio == 1)
                                                    @php
                                                        foreach ($postulant->user->documentos as $document) {
                                                            if($document->type == 'comprobante_domicilio') $file = $document->name;
                                                        }
                                                    @endphp
                                                    <p class="mb-0"><a class="text-secondary" href="/storage/documents/{{ $postulant->user->id }}/{{$file}}" target="_blank" rel="noopener noreferrer">Comprobante domicilio</a></p>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn_toggle_postulant" data-id="{{ $postulant->id }}" data-status="true" data-level="0">Aceptar</button>
                                                <button class="btn btn-secondary text-white btn_toggle_postulant" data-id="{{ $postulant->id }}" data-status="false" data-level="0">Rechazar</button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="rechazados0" role="tabpanel" aria-labelledby="rechazados">
                    <div class="container my-4">
                        <p class="text-primary">Listado de postulantes ya no activos dentro de la vacante</p>
                        <table class="table table-hover my-3">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary" scope="col">Nombre</th>
                                    <th class="text-center text-secondary" scope="col">Apellidos</th>
                                    <th class="text-center text-secondary" scope="col">Email</th>
                                    <th class="text-center text-secondary" scope="col">Telefono</th>
                                    <th class="text-center text-secondary" scope="col">Paso en el que se rechazo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacante->postulants as $postulant)
                                    @if($postulant->status== 0)
                                        <tr>
                                            <td class="text-center">
                                                {{ $postulant->user->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->apellidos }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $postulant->user->telefono }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                    switch ($postulant->level) {
                                                        case 0:
                                                            $level = 'Recepción de documentos';
                                                        break;
                                                        case 1:
                                                            $level = 'Examen de conocimientos';
                                                        break;
                                                        case 2:
                                                            $level = 'Pruebas psicométricas';
                                                        break;
                                                    }
                                                @endphp
                                                {{ $level }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                Lo sentimos, esta vacante aún no tiene postulantes.
            </div>
        @endif
    </div>
@endsection


@section('scripts')
    <script>
        const btns = document.getElementsByClassName('btn_toggle_postulant');

        for(let i=0; i<btns.length; i++){
            btns[i].addEventListener('click', ()=>{
                const id = btns[i].getAttribute('data-id'),
                    level = btns[i].getAttribute('data-level'),
                    band = (btns[i].getAttribute('data-status') === 'true') ? true : false;

                const params = { id: id, level: level, status: band};

                axios.post('/postulacion', params)
                .then(res=>{
                    console.log(res);
                })
            })
        }

    </script>
@endsection
