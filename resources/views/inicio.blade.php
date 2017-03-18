@extends('admin.plantilla.principal')
@section('titulo','Inicio - Bienvenido')
@section('contenido')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
@include('flash::message')
  <div class="container">
    <h1>Sistema de gestión de Incidentes!</h1>
    <p><strong>Bienvenido</strong> a nuestro sistema de soporte y mantenimiento para nuestros usuarios.</p>
    <p>Con esté sistema podrá notificar de manera inmediata cualquier problema que tenga con su ordenador y será asistido con los mejores profesionales en el área.</p>
    <p>Gracias por confiar en nosotros.</p>
  </div>
</div>

  @endsection