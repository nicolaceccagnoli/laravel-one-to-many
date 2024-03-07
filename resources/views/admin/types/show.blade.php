@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <section id="type-show">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="my-card">
                    <div class="my-card-body">
                        <h1 class="text-center mb-5">
                            {{ $type->title }}
                        </h1>

                        <div class="text-center">

                            <ul>

                                {{-- Per ogni progetto che ho realizzato con la relativa tecnologia 
                                stampo un link che mi riporta al singolo progetto --}}
                                @foreach ($type->projects as $project)
                                    <li class="text-start">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="mb-3"> 
                                            {{ $project->title }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                        <div class="edit-buttons-container d-flex flex-column align-items-end">
                            
                            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="edit-button mb-2">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form
                            onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                            action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}"
                            method="POST"
                            class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="erase-button">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                            
                            </form>

                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection