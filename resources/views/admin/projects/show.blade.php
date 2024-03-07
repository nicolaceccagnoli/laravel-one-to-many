@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
<section id="admin-show">
    <div class="row g-0">
        <div class="col d-flex justify-content-center">
            <div class="my-card">
                <div class="my-card-body">
                    <h1 class="text-center mb-5">
                        {{ $project->title }}
                    </h1>

                    @if ($project->type != null)
                        
                        <p class="mb-3">
                            {{ $project->content }}
                        </p>

                        <div>

                            <a href="{{ route('admin.types.show', ['type' => $project->type->slug]) }}" class="mb-3"> 
                                {{ $project->type->title }}
                            </a>

                            <p>
                                Creato il: 
                                <span class="text-success">
                                    {{ $project->created_at->format('d/m/Y') }}
                                </span>
                                <br>
                                Alle: 
                                <span>
                                    {{ $project->created_at->format('H:i')  }}
                                </span>
                            </p>
                        </div>

                        @if ($project['updated_at'] != $project['created_at'])
                            <div>
                                Modificato il: 
                                <span>
                                    {{ $project->updated_at->format('d/m/Y') }}
                                </span>
                                <br>
                                Alle: 
                                <span>
                                    {{ $project->updated_at->format('H:i')  }}
                                </span>
                            </div>
                        @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection